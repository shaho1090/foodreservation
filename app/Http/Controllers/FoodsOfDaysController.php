<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;
use App\Http\Requests\FoodFormRequest;
use App\Http\Requests\FoodsOfDayFormRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\WeekFormRequest;
use App\Http\Requests\DaysOfWeekFormRequest;
use App\CustomClass\IraniDays;
use App\DaysOfWeek;
use App\FoodsOfDay;
use Illuminate\Support\Collection;

class FoodsOfDaysController extends Controller
{
   public function add(FoodsOfDayFormRequest $request)
    { 
        $day_id = $request->get('day_id');
        $foodsofday = new FoodsOfDay(array(
            'day_id' =>  $day_id ,
            'food_id' => $request->get('selectedfood'),
	));
	$foodsofday->save();
        return redirect(action('FoodsOfDaysController@show',$day_id))->with('status', 'نام غذای مورد نظر به لیست این روز اضافه شد');
    }
    
    public function show($id)
    {       
            $daystitle = DB::table('Days_Of_Weeks')->where('id',$id)->get('title');
	    $foods = DB::table('foods')->get();
            $food_ids = DB::table('foods_of_days')->where('day_id',$id)->get('food_id');
            $selectedfoods = null;
            foreach( $food_ids as $food_id){
                    $value = DB::table('foods')->where('id',$food_id->food_id)->pluck('title');
                    $selectedfoods[$food_id->food_id] = $value[0];
                }
            return view('foodsofdays/show', ['foods' => $foods,
                                            'daystitle' => $daystitle,
                                            'selectedfoods' => $selectedfoods,
                                            'id' => $id,
                         ]);
    }
    public function destroy(FoodsOfDayFormRequest $request)
    {
        
        $day_id = $request->day_id; 
        $food_id = $request->for_destroy_id;
        DB::table('foods_of_days')->where('day_id',$day_id)->where('food_id', $food_id)->delete();
        return redirect(action('FoodsOfDaysController@show',$day_id))->with('status', 'نام غذای مورد نظر از لیست این روز حذف شده است');
    }
}
