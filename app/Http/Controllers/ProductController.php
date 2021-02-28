<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $ProductService;

    public function __construct()
    {
        $this->ProductService = new ProductService();
    }

    public function getFisrt(Request $request)
    {

        try {

            $register = $this->ProductService->getFirst();

            return response()->json([
                'success' => true,
                'formProd'  => $register,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function get(Request $request)
    {

        $get = $this->ProductService->getFunction($request);

        return response()->json([
            'success' => true,
            'formProd'  => $get,

        ]);
    }

    public function getfind(Request $request){

        $get = $this->ProductService->find($request);

        return response()->json([
            'success' => true,
            'formProd'  => $get,
        ]);
    }
}
