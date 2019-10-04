<?php

namespace App\Http\Controllers;

use App\Week;
use Illuminate\Http\Request;
use App\Http\Requests\WeekFormRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controller\DaysOfWeeksController;

class WeeksController extends Controller
{
   public function add()
   {
        return view('weeks.add');
   }
    public function store(WeekFormRequest $request)
    {
        /**
        *اگر برنامه هفتگی ایجاد شده باشد باید از ایجاد برنامه هفتگی جدید جلوگیری کنیم 
	*با کد زیر
	*/
	date_default_timezone_set('Asia/Tehran');
        $firstDayDate = date("Y-m-d", strtotime("next Saturday"));
	if($firstDayDate === DB::table('weeks')->pluck('first_day_date')->last()){
	    return redirect('/addweek')->with('status', ' برنامه هفتگی در حال حاضر ایجاد شده است!');
	}
	if($request->get('status') != null){
            $weekStatus = 1;
        }else{
            $weekStatus = 0;
        }
	$week= new Week(array(
	    'first_day_date' => $firstDayDate,
            'title' => $request->get('title'),
            'status' => $weekStatus,		   
            ));
        $week->save();
        return redirect('/addweek')->with('status', 'برنامه هفتگی جدید ایجاد شد!');
    }

    public function index()
    {
        $weeks = DB::table('weeks')->get();
        return view('weeks.index', ['weeks' => $weeks]);
    }
	
    public function show($id)
    {
        $week = DB::table('weeks')->where('id',$id)->first();
        return view('weeks.show', compact('week'));
    }
	
    public function edit($id)
    {
	$week = DB::table('weeks')->where('id',$id)->first();
        return view('weeks.edit', compact('week'));
    }
	
    public function update($id, WeekFormRequest $request)
    {
        $week = DB::table('weeks')->where('id',$id)->first();
        if($request->get('status') != null) {
            $weekStatus = 1;
        } else {
            $weekStatus = 0;
        }
	DB::table('weeks')->where('id', $id)->update(['title' => $request->get('title'),
		                                      'status' =>$weekStatus]);
    		
        return redirect(action('WeeksController@edit', $week->id))->with('status', 'عملیات با موفقیت انجام شد!');
    }
	
    public function destroy($id)
    {
        DB::table('weeks')->where('id', $id)->delete();
        return redirect('/weeks')->with('status', 'برنامه هفتگی مورد نظر با موفقیت حذف شد!');
    }
}
