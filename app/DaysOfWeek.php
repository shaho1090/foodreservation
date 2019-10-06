<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaysOfWeek extends Model
{
  protected $fillable = ['week_id', 'date', 'title'];
	
    public function foodsOfDay()
	{
		return $this->hasMany('App\FoodsOfDay','day_id');
	}
}
