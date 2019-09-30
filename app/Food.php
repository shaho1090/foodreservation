<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['title', 'price', 'slug', 'status', 'user_id'];
    
       public function user()
       {
           return $this->belongTo('App\User');
       }
	   public function __get($property)
	   {
           if(property_exists($this, $property)){
               return $this->$property;
            }
	   }
}
