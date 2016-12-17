<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAttendancesTable
 */
class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('day_id')->unsigned();
            $table->integer('timeslot_id')->unsigned();
            $table->date('date');
            $table->integer('studysubmodule_id')->unsigned();
            $table->integer('type_id')->unsigned(); //TODO ? 1 a N aixi?
            $table->text('notes');
            //todo userstamps??? https://github.com/WildSideUK/Laravel-Userstamps?? https://github.com/acacha/Laravel-Userstamps
            $table->timestamps();
        });

        Schema::create('attendance_type', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('name', ['Faltes', 'Faltes justificades',' Retards', 'Retards Justificats', 'Expulsions']);
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
        Schema::dropIfExists('attendances');
        Schema::dropIfExists('attendance_type');
    }
}
