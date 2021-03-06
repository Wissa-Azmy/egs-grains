<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $fillable = ['name'];

	public function suppliers(){
		return $this->belongsToMany(Supplier::class)
			->withPivot('quantity', 'price')
			->withTimestamps();
	}
    
	public function orders(){
		return $this->hasMany(Order::class);
	}

    public function invoices(){
    	return $this->belongsToMany(Invoice::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
