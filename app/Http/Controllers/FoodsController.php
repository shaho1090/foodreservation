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
	
	public function edit($slug)
    {
		$food = DB::table('foods')->where('slug',$slug)->first();
        //$food = Food::whereSlug($slug)->firstOrFail();
        return view('foods.edit', compact('food'));
    }
	
	public function update($slug, FoodFormRequest $request)
    {
        $food = DB::table('foods')->where('slug',$slug)->first();
        if($request->get('status') != null) {
            $foodStatus = 1;
        } else {
            $foodStatus = 0;
        }
		DB::table('foods')->where('slug', $slug)->update(['title' => $request->get('title'),
		                                                  'price' => $request->get('price'),
														  'status' =>$foodStatus]);
    		
        return redirect(action('FoodsController@edit', $food->slug))->with('status', 'عملیات با موفقیت انجام شد!');
    }
	
	public function destroy($slug)
    {
        DB::table('foods')->where('slug', $slug)->delete();
        return redirect('/foods')->with('status', 'نام غذای مورد نظر از لیست غذاها حذف شد');
    }
}
