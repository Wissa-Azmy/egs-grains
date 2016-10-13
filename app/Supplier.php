<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	public function items(){
		return $this->belongsToMany(Item::class)
			->withPivot('quantity', 'price')
			->withTimestamps();
	}
	
	public function orders(){
		return $this->hasMany(Order::class);
	}
	
	public function User(){
		return $this->belongsTo(User::class);
	}
}
