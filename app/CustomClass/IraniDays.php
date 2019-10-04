<?php 

namespace App\CustomClass;
 
Class IraniDays
{
    static public $days = [
	    'شنبه' => 'saturday',
	    'یکشنبه' => 'sunday',
        'دوشنبه' => 'monday',
        'سه شنبه' => 'tuesday',
        'چهارشنبه' => 'wednesday',
        'پنج شنبه' => 'thursday',
        'جمعه' => 'friday'
    ];
	
	static public function toIraniDay($enDay)
	{
	    return array_search(strtolower($enDay), self::$days);
	}
}