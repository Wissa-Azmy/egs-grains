<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    protected $fillable = ['name'];

    public function subports(){
        return $this->hasMany(Subport::class);
    }
    //
}
