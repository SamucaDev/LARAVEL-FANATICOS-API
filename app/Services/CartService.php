<?php

namespace App\Services;

use App\Helper\TokenHelper;
use App\Models\TableGroupProduct;
use App\Models\TableProduct;
use App\Models\TableCart;
use App\Models\TableCartItems;
use App\Models\TableUserToken;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use PDO;

class CartService
{
    protected $cartRepository, $cartItemRepository;

    public function __construct()
    {
        $this->cartRepository = new BaseRepository(TableCart::class);
        $this->cartItemRepository = new BaseRepository(TableCartItems::class);
        $this->productRepository = new BaseRepository(TableProduct::class);
    }

    public function addItem($request)
    {

        $checkCart = $this->cartRepository->find(function ($where) use ($request) {
            return $where->where('status', 0)->where('userid', $request->userid);
        });

        if ($checkCart == null) {
            // Criar um novo carrrinho

            $register = $this->cartRepository->insert([
                'userid'         => $request->userid,
                'dateExpiration' => date('Y/m/d h:m:s', strtotime('+3 hour')),
                'status'         => 0,
                'priceTotal'     => $request->price * $request->countQtd

            ]);

            $infoProduct = $this->cartRepository->find(function ($where) use ($request) {
                return $where->where('userid', $request->userid)->orderBy('id');
            });

            $this->cartItemRepository->insert([
                'amount'    => $request->countQtd,
                'productid' => $request->id,
                'cartid'    => $checkCart->id,
                'priceTotal'     => $request->price * $request->countQtd
            ]);


            return true;
        } else {

            $this->cartItemRepository->updateOrInsert([
                'productid' => $request->id,
                'cartid'    => $checkCart->id
            ], [
                'amount'    => $request->countQtd,
                'priceTotal'     => $request->price * $request->countQtd

            ]);

            // $product =  $this->cartItemRepository->get(function ($where) use ($request) {
            //     return $where->where('productid', '!=', $request->id);
            // });

            $_countPrice = 0;

            $countPrice = $this->cartItemRepository->get(function ($where) use ($checkCart) {
                return $where->where('cartid', $checkCart->id);
            });


            $countPrice->map(function ($item) use (&$_countPrice) {
                $_countPrice = $_countPrice + $item->priceTotal;
            });




            $this->cartRepository->update([
                'id'    => $checkCart->id
            ], [

                'dateExpiration' => date('Y/m/d h:m:s', strtotime('+3 hour')),
                'priceTotal'     => $_countPrice
            ]);
        }

        return true;
    }

    public function getItemsCart($request)
    {
        $get = $this->cartRepository->find(function ($where) use ($request) {
            return $where->where('userid', $request->userid)->where('status', 0);
        });

        // dd($get);

        $items = $this->cartItemRepository->get(function ($where) use ($get) {
            return $where->where('cartid', $get->id);
        });


        $product = $this->productRepository->get(function ($where) use ($items) {
            return $where->whereIn('id', $items->map(function ($item) {
                return $item->productid;
            }));
        });

        $productForm = $items->map(function ($value) use ($product) {
            $_infoProd = $product->where('id', $value->productid)->values()[0];
            // dd($value);

            $array = [
                'productid'  => $value->productid,
                'amount'     => $value->amount,
                'priceTotal' => $value->priceTotal,
                'name'       => $_infoProd->name,
                'price'      => $_infoProd->price,
                'desc'       => $_infoProd->desc,
                'pathImg'    => $_infoProd->pathImg

            ];

            return $array;
        });



        $finalArrayItemsCart = [
            'priceTotal'     => $get->priceTotal,
            'dateExpiration' => $get->dateExpiration,
            'userid'         => $get->userid,
            'cartid'         => $get->id,
            'products'        => $productForm
        ];

        return $finalArrayItemsCart;
    }

    public function clearItems($request)
    {
        $this->cartItemRepository->delete(function ($where) use ($request) {
            return $where->where('cartid', $request->cartid);
        });

        // tratativa de erro request

        $this->cartRepository->delete(function ($where) use ($request) {
            return $where->where('id', $request->cartid);
        });

        //Tratativa de erro 

        return true;
    }

    public function getAbandonedCart()
    {
        return $this->cartRepository->get(function ($builder) {
            return $builder->where('dateExpiration', '<=', date('Y-m-d h:m:s'))->where('status', 0);
        });
        
    }
}