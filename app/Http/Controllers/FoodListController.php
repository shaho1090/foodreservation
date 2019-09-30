<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodListController extends Controller
{
   public function add()
    {
        return view('foodlist.add');
    }
}
