<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Lumen\Auth\Authorizable;

use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Database\Eloquent\Model as BaseModel;

class User extends BaseModel implements AuthenticatableContract, AuthorizableContract,JWTSubject
{

    use Authenticatable, Authorizable;

    protected $table = 'user';
    protected $fillable = ['email', 'password'];

    

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }


}