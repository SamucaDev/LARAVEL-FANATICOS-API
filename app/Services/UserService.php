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
        $check =  $this->userRepository->find(function ($where) use ($infoUser) {
            return $where->where('email', $infoUser->email);
        });

        if ($check != null) {
            return false;
        }


        $passwordUser = Hash::make($infoUser->password);

        // dd($passwordUser);
        $register =  $this->userRepository->create([
            'name'     => $infoUser->name,
            'password' => $passwordUser,
            'email'    => $infoUser->email,
        ]);


        return [
            'userid' =>  $register->id,
            'name'   =>  $register->name
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
