<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{

    protected $fillable = ['title', 'price', 'status', 'user_id'];

       /*public function user()
       {
           return $this->belongTo('App\User');
       }*/


    public function FoodsOfDay()
    {
        return $this->hasMany(FoodsOfDay::class, 'food_id');
    }
}
