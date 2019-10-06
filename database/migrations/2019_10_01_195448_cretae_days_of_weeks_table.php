<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CretaeDaysOfWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days_of_weeks', function (Blueprint $table) {
	    $table->bigInteger('week_id')->unsigned();
	    $table->date('date')->default(null);
            $table->bigIncrements('id');
	    $table->string('title');
	    $table->timestamps();
	    $table->foreign('week_id')
                  ->references('id')->on('weeks')
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
        Schema::dropIfExists('days_of_weeks');
    }
}
