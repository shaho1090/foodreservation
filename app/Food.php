<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['title', 'price', 'slug', 'status', 'user_id'];
    
       /*public function user()
       {
           return $this->belongTo('App\User');
       }*/
	  
	   
}
