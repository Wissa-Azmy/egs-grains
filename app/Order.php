<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function item(){
        return $this->belongsTo(Item::class);
    }
    
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
