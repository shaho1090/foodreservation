<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;
use App\Http\Requests\FoodFormRequest;
use Illuminate\Support\Facades\DB;

class FoodsController extends Controller
{
   public function add()
    {
        return view('foods.add');
    }
	public function store(FoodFormRequest $request)
    {
       $slug = uniqid();
       $food = new Food(array(
           'title' => $request->get('title'),
           'price' => $request->get('price'),
		   'slug' => $slug
            ));
       $food->save();
       return redirect('/addfood')->with('status', 'نام غذای مورد نظر به لیست غذاها اضافه شد!');
    }
	/*public function store(FoodListFormRequest $request)
    {
        return $request->all();
    }*/
	public function index()
    {
        $foods = DB::table('foods')->get();
        //return view('tickets.index', compact('$tickets'));
        
        return view('foods.index', ['foods' => $foods]);
    }
	public function show($slug)
    {
        $food = DB::table('foods')->where('slug',$slug)->first();
      //  $ticket = Ticket::whereSlug($slug)->first();
        return view('foods.show', compact('food'));
    }
}
