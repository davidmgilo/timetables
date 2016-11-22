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
        $this->publishTests();
    }

    private function publishTests()
    {
        $this->publishes(
            [SCOOL_TIMETABLES_PATH.'/tests/TimetablesTest.php' =>'tests/TimetablesTest.php'],
            'scool_timetables'
        );
    }

}