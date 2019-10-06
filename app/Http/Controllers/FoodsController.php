<?php

namespace App\Http\Controllers;

use App\Food;
use App\FoodsOfDay;
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

       $food = new Food(array(
            'title' => $request->get('title'),
            'price' => $request->get('price'),
              ));
       $food->save();
       return redirect('/addfood')->with('status', 'نام غذای مورد نظر به لیست اضافه شد!');
    }

    public function index()
    {
        $foods = DB::table('foods')->get();
        return view('foods.index', ['foods' => $foods]);
    }

    public function show($id)
    {
        $food = DB::table('foods')->where('id',$id)->first();
        return view('foods.show', compact('food'));
    }

    public function edit($id)
    {
	$food = DB::table('foods')->where('id',$id)->first();
        return view('foods.edit', compact('food'));
    }

    public function update($id, FoodFormRequest $request)
    {
        $food = DB::table('foods')->where('id',$id)->first();
        if($request->get('status') != null) {
            $foodStatus = 1;
        } else {
            $foodStatus = 0;
        }
	DB::table('foods')->where('id', $id)->update(['title' => $request->get('title'),
		                                      'price' => $request->get('price'),
		                                      'status' =>$foodStatus]);

        return redirect(action('FoodsController@edit', $food->id))->with('status', 'عملیات ویرایش با موفقیت انجام شد');
    }

    public function destroy($id)
    {
       // dd($test);
       // DB::table('foods')->where('id', $id)->delete();
       // DB::table('foods_of_day')
       $food = Food::find($id);
       //dd($food);
       $food->destroy($id);
       
       return redirect('/foods')->with('status', 'نام غذای مورد نظر از لیست حذف شد!');
    }
}
