<?php

namespace Scool\Timetables\Providers;

use Acacha\Names\Providers\NamesServiceProvider;
use Acacha\Stateful\Providers\StatefulServiceProvider;
use Illuminate\Support\ServiceProvider;
use Scool\Timetables\ScoolTimetables;

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

        $this->registerNameServiceProvider();
        $this->registerStatefulEloquentServiceProvider();

        $this->app->bind(\Scool\Timetables\Repositories\AttendanceRepository::class, \Scool\Timetables\Repositories\AttendanceRepositoryEloquent::class);
        //:end-bindings:
    }

    protected function registerNameServiceProvider()
    {
        $this->app->register(NamesServiceProvider::class);
    }

    public function boot()
    {
        $this->defineRoutes();
        $this->loadMigrations();
        $this->publishFactories();
        $this->publishConfig();
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

    private function registerStatefulEloquentServiceProvider()
    {
        $this->app->register(StatefulServiceProvider::class);

    }
}
