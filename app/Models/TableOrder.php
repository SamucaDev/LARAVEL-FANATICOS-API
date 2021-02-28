<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User as UserBase;

class TableOrder extends UserBase
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $table = 'order';
}
