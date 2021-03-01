<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableUserToken extends Model 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $table = 'user_token';
}
