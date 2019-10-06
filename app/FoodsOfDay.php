<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class FoodsOfDay extends Model
{
    protected $fillable = ['day_id', 'food_id'];
	
    
    public function food()
    {
        return $this->belongsTo(Food::class,'food_id');
    }
    public function week()
    {
        return $this->belongsTo(Week::class,'day_id');
    }       
}
