<?php

namespace App\Repositories;


 class BaseRepository
{

    protected $model;

    public function __construct($model)
    {
        $this->model  = $model;
    }

    public function create($array)
    {
        return $this->model::create($array);
    }

    public function insert($array)
    {
        return $this->model::insert($array);
    }

    public function updateOrCreate($array, $array1)
    {
        return $this->model::updateOrCreate($array, $array1);
    }
    public function updateOrInsert($array, $array1)
    {
        return $this->model::updateOrInsert($array, $array1);
    }

    public function find($where = null)
    {
        $store = $this->model::query();

        if (!is_null($where)) {
            $where($store);
        }

        return $store->first();
    }

    public function get($where)
    {
        $store = $this->model::query();

        if (!is_null($where)) {
            $where($store);
        }

        return $store->get();
    }

    public function delete($where)
    {
        return $this->model::where($where)->delete();
    }

    public function update($where, $value)
    {
        return $this->model::where($where)->update($value);
    }
}
