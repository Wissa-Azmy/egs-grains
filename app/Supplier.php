<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	public function items(){
		return $this->hasMany(Item::class);
	}
	
	public function orders(){
		return $this->hasMany(Order::class);
	}
	
	public function User(){
		return $this->belongsTo(User::class);
	}
}
