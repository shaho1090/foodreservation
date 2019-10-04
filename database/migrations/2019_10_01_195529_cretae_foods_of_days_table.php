<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CretaeFoodsOfDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods_of_days', function (Blueprint $table) {
			$table->biginteger('day_id');
			$table->biginteger('food_id');
		    $table->bigIncrements('id');
            $table->timestamps();
			$table->foreign('day_id')
                              ->references('id')->on('days_of_weeks')
                              ->onDelete('cascade');
			$table->foreign('food_id')
                              ->references('id')->on('foods_of_days')
                              ->onDelete('cascade');	  
        });
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods_of_days');
    }
}
