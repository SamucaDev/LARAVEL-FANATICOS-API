<?php

namespace App\Console\Commands;

use Exception;
use App\Models\TableCart;
use App\Models\TableUser;
use App\Services\CartService;
use Illuminate\Console\Command;
use App\Mail\EmailMarketingCart;
use App\Models\TableCartNotification;
use App\Repositories\BaseRepository;
use            Illuminate\Support\Facades\Mail;

class AbandonedCartCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AbandonedCartCommand:Execute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->cartRepository = new BaseRepository(TableCart::class);
        $this->userRepository = new BaseRepository(TableUser::class);

        $this->cartNotificationRepository = new BaseRepository(TableCartNotification::class);
        $this->CartService = new CartService();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $CollectionCart =  $this->CartService->getAbandonedCart();


            $CollectionCart->map(function ($value) {

                $infoUser = $this->userRepository->find(function ($where) use ($value) {
                    return $where->where('id', $value->userid);
                });

                $checkNotification = $this->cartNotificationRepository->find(function ($where) use ($value) {
                    return $where->where('cartid', $value->id);
                });

                if ($checkNotification == null) {
                    Mail::to($infoUser->email)->send(new EmailMarketingCart($infoUser->name));
                    $this->cartNotificationRepository->create([
                        'cartid' => $value->id,
                        'userid' => $value->userid,
                    ]);
                }
            });
        } catch (Exception $e) {
        }
    }
}
