<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Services\CartService;
use Exception;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $CartService;

    public function __construct()
    {
        $this->CartService = new CartService();
    }

    public function addItem(Request $request){
     $add =  $this->CartService->addItem($request);
    
     if($add == true){

        return response()->json([
            'success' => true
        ]);
     }
    }

    public function getItem(Request $request){
        
        try{

            $getItems = $this->CartService->getItemsCart($request);

            return response()->json([
                'success'    => true,
                'formItems' => $getItems
            ]);

        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Ação mal realizada'
            ]);
        }
        
    }
    public function clear(Request $request){
        
        try{

            $getItems = $this->CartService->clearItems($request);

            return response()->json([
                'success'    => true,
                'formItems' => $getItems
            ]);

        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Ação mal realizada'
            ]);
        }
        
    }
}