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
        if (!defined('SCOOL_TIMETABLES_PATH')) {
            define('SCOOL_TIMETABLES_PATH', realpath(__DIR__.'/../../'));
        }

        $this->app->bind(\Scool\Timetables\Repositories\AttendanceRepository::class, \Scool\Timetables\Repositories\AttendanceRepositoryEloquent::class);
    }

    public function boot()
    {
        $this->defineRoutes();
        $this->loadMigrations();
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
            ScoolTimetables::factories(), "scool_timetables"
            //TODO -> paths in a class
        );
    }


    /**
     * Publish config.
     */
    private function publishConfig()
    {
        $this->publishes(
            ScoolTimetables::configs(), "scool_timetables"
        );
        $this->mergeConfigFrom(
            SCOOL_TIMETABLES_PATH . '/config/timetables.php', 'scool_timetables'
        );
    }

    /**
     * Define the Timetables routes.
     */
    protected function defineRoutes()
    {
        if (!$this->app->routesAreCached()) {
            $router = app('router');
            $router->group(['namespace' => 'Scool\Timetables\Http\Controllers'], function () {
                require __DIR__.'/../Http/routes.php';
            });
        }
    }
}
