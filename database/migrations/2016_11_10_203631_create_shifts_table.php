<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateShiftsTable
 */
class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('torn', ['tarda','mati']);
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('shift_timeslot', function (Blueprint $table) {
            $table->integer('shift_id')->unsigned();
            $table->integer('timeslot_id')->unsigned();
            $table->timestamps();
            $table->unique(['shift_id', 'timeslot_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shifts');
        Schema::dropIfExists('shift_timeslot');
    }
}
