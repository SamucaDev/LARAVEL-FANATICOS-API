<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Exception;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->UserService = new UserService();
    }

    public function create(Request $request)
    {

        try {



            $register = $this->UserService->create($request);

            if ($register == false) {
                return response()->json([
                    'success' => false,
                    'message' => 'Este email já esta cadastrado!'
                ]);
            }

            return response()->json([
                'success' => true,
                'userid'  => $register['userid'],
                'name'    => $register['name'],
                'token'   => Auth::attempt($request->only(['email', 'password']))
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Houve um erro não esperado, tente novamente!'
            ]);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        try {

            if (!$token = Auth::attempt($credentials)) {
                return response()->json(['success' => false, 'message' => 'Invalid credentials']);
            }

            return response()->json([
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => Auth::factory()->getTTL() * 60,
                'success' => true,
                'name' => Auth::user()->name,
                'userid' => Auth::user()->id
            ]);
        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Houve um erro não esperado, tente novamente!'
            ]);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'success' => true
        ]);
    }
}
