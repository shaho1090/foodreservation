<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;
use App\Http\Requests\FoodFormRequest;

class FoodsController extends Controller
{
   public function add()
    {
        return view('foods.add');
    }
	public function store(FoodFormRequest $request)
    {
       //$slug = uniqid();
       $food = new Food(array(
           'title' => $request->get('title'),
           'price' => $request->get('price')
            ));
       $food->save();
       return redirect('/addfood')->with('status', 'نام غذای مورد نظر به لیست غذاها اضافه شد!');
    }
	/*public function store(FoodListFormRequest $request)
    {
        return $request->all();
    }*/
}
