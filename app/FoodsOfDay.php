<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodsOfDay extends Model
{
    protected $fillable = ['day_id', 'food_id'];
	
	/*public function food()
    {
        return $this->belongsToMany('App\Food','food_id');
    }*/
}
