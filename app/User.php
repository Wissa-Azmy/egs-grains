<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function items(){
        return $this->hasMany(Item::class);
    }
    
    public function customers(){
        return $this->hasMany(Customer::class);
    }
    
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function suppliers(){
        return $this->hasMany(Supplier::class);
    }
}
