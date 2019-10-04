<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
	protected $fillable = ['title', 'status', 'first_day_date'];
	
  /* public function daysOfWeek()
	{
		return $this->hasMany('App/DayOfWeek');
	}*/
}
