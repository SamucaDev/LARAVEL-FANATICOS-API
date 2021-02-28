<?php

namespace App\Services;

use App\Helper\TokenHelper;
use App\Models\TableUser;
use App\Models\TableUserToken;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{

    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new BaseRepository(TableUser::class);
    }

    public function create($infoUser)
    {

        $passwordUser = Hash::make($infoUser->password);

        // dd($passwordUser);
        $register =  $this->userRepository->create([
            'name'     => $infoUser->name,
            'password' => 'teste',
            'email'    => $infoUser->email,
        ]);


        return [
            'userid' =>  $register->id,
        ];
    }

    public function login($infoUser)
    {

        $getInfo = $this->userRepository->find(function ($where) use ($infoUser) {
            return $where->where('email', $infoUser->email);
        });

        if ($getInfo == null) {
            return [
                'success' => false
            ];
        }

        if (!Hash::check($infoUser->password, $getInfo->password)) {
            return [
                'success' => false
            ];
        }



        return [
            'success' => true,
            'userid'  => $getInfo->id,
        ];
    }
}
