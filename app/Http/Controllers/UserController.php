<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $UserService;

    public function __construct()
    {
        $this->UserService = new UserService();
    }

    public function create(Request $request)
    {

        try {
            
            $register = $this->UserService->create($request);

            return response()->json([
                'success' => true,
                'userid'  => $register['userid'],
                
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function login(Request $request)
    {

        $validator = validator($request->all(), [
            'email'        => 'required',
            'password'     => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'  => false,
                'message' => 'Campos inválidos',
                'errors'  => $validator->errors()->all()
            ]);
        }


        $login = $this->UserService->login($request);

        if ($login['success'] == false) {
            return response()->json([
                'success' => false

            ]);
        }

        return response()->json([
            'success' => $login['success'],
            'userid'  => $login['userid'],

        ]);
    }
}
