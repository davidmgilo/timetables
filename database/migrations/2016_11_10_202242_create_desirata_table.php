<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesirataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desirata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('state');
            //todo userstamps??? https://github.com/WildSideUK/Laravel-Userstamps?? https://github.com/acacha/Laravel-Userstamps
            //Ho farem més tard
            $table->timestamps();
        });

        Schema::create('desideratum_department', function (Blueprint $table) {
            $table->integer('desideratum_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->timestamps();
            $table->unique(['desideratum_id', 'department_id']);// Potser no!!
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desideratum_department');
        Schema::dropIfExists('desirata');
    }
}
