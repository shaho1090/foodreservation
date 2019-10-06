<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DaysOfWeek;

class Week extends Model
{
    protected $fillable = ['title', 'status', 'first_day_date'];
	
    public function daysofweek()
    {
	return $this->hasMany('App/DaysOfWeek','week_id');
    }
}
