<?php

namespace App\Http\Controllers;

use App\Week;
use App\DaysOfWeek;
use Illuminate\Http\Request;
use App\Http\Requests\WeekFormRequest;
use App\Http\Requests\DaysOfWeekFormRequest;
use Illuminate\Support\Facades\DB;
use App\CustomClass\IraniDays;

class DaysOfWeeksController extends Controller
{
    public function create($id)
    { 
	if(DB::table('days_of_weeks')->where('week_id',$id)->first()){
	    return $this->index($id);
        }	
        $dayCounter = 1; 
        $date = date(DB::table('weeks')->where('id',$id)->pluck('first_day_date')->first());
        $day = IraniDays::toIraniDay(date('l', strtotime($date))); 
	while($dayCounter<8){  
	    $DaysOfWeek = new DaysOfWeek(array(
		                              'week_id' => $id,
	                                      'date' => $date, 
                                              'title' => $day,
                                             )
                                        );
	    $DaysOfWeek->save();
             /*-----next step in while loop-------*/
	    $date = date('Y-m-d', strtotime('+1 day', strtotime($date)));//---get next day date-------
	    $day = IraniDays::toIraniDay(date('l', strtotime($date)));//------convert english day to persian day-----
	    $dayCounter+=1;
        }
		
	$date = null;
	$day = null;
	$dayCounter = null;
		
        return view('daysofweeks.index', ['daysofweeks' => $DaysOfWeek]);
    }
	
    public function show($id)
    {
	$week = DB::table('days_of_weeks')->where('id',$id)->first();
        return view('daysofweeks.show', ['daysofweeks' => $daysofweeks]);
    }
    public function index($id)
    {
        $daysofweeks = DB::table('days_of_weeks')->where('week_id',$id)->orderBy('id', 'asc')->get();
        return view('daysofweeks.index', ['daysofweeks' => $daysofweeks]);
    }
}
