<?php

namespace App\Services;

use App\Helper\TokenHelper;
use App\Models\TableGroupProduct;
use App\Models\TableProduct;
use App\Models\TableUser;
use App\Models\TableUserToken;

use App\Repositories\BaseRepository;

class ProductService
{
    protected $productRepository, $groupProductRepository;

    public function __construct()
    {
        $this->productRepository = new BaseRepository(TableProduct::class);
        $this->groupProductRepository = new BaseRepository(TableGroupProduct::class);
    }

    public function getFirst()
    {
        $get = $this->productRepository->find(function ($where) {
            return $where->where('id', 4);
        });

        return $get;
    }

    public function getFunction($request){

        $get = $this->productRepository->get(function ($where) use ($request) {
            return $where->where('groupproductid', $request->groupproductid);
        });

        return $get;
    }

    public function find($request){

        $get = $this->productRepository->find(function ($where) use ($request) {
            return $where->where('id', $request->id);
        });

        return $get;
    }
}
