<?php

namespace Scool\Timetables\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Created by PhpStorm.
 * User: alumne
 * Date: 22/11/16
 * Time: 17:34
 */
class TimetablesServiceProvider extends ServiceProvider
{

    public function register()
    {
        if(!defined('SCOOL_TIMETABLES_PATH')){
            define('SCOOL_TIMETABLES_PATH',realpath(__DIR__.'/../../'));
        }

    }

    public function boot()
    {
//        $this->loadMigrations();
//        $this->publishFactories();
//        $this->publishConfig();
        $this->publishTests();
    }

    private function publishTests()
    {
        $this->publishes(
            [SCOOL_TIMETABLES_PATH.'/tests/TimetablesTest.php' =>'tests/TimetablesTest.php'],
            'scool_timetables'
        );
    }

    /**
     * Load migrations.
     */
    private function loadMigrations()
    {
        $this->loadMigrationsFrom(SCOOL_TIMETABLES_PATH . '/database/migrations');
    }
    /**
     * Publish factories.
     */
    private function publishFactories()
    {
        $this->publishes(
            ScoolTimetables::factories(),"scool_timetables"
            //TODO -> paths in a class
        );
    }


    /**
     * Publish config.
     */
    private function publishConfig() {
        $this->publishes(
            ScoolTimetables::configs(),"scool_timetables"
        );
        $this->mergeConfigFrom(
            SCOOL_TIMETABLES_PATH . '/config/timetables.php', 'scool_timetables'
        );
    }
}