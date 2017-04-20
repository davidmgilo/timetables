<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposedLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposed_lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id')->unsigned();
            $table->string('state')->nullable();
            $table->integer('desideratum_id')->unsigned();
            //todo userstamps??? https://github.com/WildSideUK/Laravel-Userstamps?? https://github.com/acacha/Laravel-Userstamps
            //Ho farem més tard
            $table->timestamps();
        });

        //Ha de tindre id, location_id, timestamps, userstamps, desideratum_id,
        //relacions amb User i amb Studysubmodule
        //TODO millor taula lessons amb estat - desiderata sera un estat de la taula lesson (sense name ni relació amb departaments).

        Schema::create('proposed_lesson_user', function (Blueprint $table) {
            $table->integer('proposed_lesson_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->unique(['proposed_lesson_id', 'user_id']);
        });

        Schema::create('proposed_lesson_studysubmodule', function (Blueprint $table) {
            $table->integer('proposed_lesson_id')->unsigned();
            $table->integer('studysubmodule_id')->unsigned();
            $table->timestamps();
//            $table->unique(['proposed_lesson_id', 'studysubmodule_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposed_lesson_studysubmodule');
        Schema::dropIfExists('proposed_lesson_user');
        Schema::dropIfExists('proposed_lessons');
    }
}
