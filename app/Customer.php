<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function invoices(){
    	return $this->hasMany(Invoice::class);
    }
    
    public function orders(){
        return $this->hasMany(Order::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
