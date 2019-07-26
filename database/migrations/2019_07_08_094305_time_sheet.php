<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TimeSheet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_sheet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->integer('time_of_task');
            $table->string('task_id');
            $table->date('date');
            $table->string('trouble');
            $table->string('next_day_plan');
            $table->string('task_info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_sheet');
    }
}
