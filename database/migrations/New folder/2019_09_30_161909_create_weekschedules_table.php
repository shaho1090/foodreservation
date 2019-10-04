<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeekschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->Date('day');
			$table->bigInteger('food_id');
			$table->biginteger('user_id');
            $table->timestamps();
			
			$table->foreign('food_id')
			    ->references('id')->on('foods')
				->onUpdate('cascade')
				->onDelete('cascade');
				
			$table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('week_schedules');
    }
}
