<?php

namespace Scool\Timetables;

/**
 * Class ScoolTimetables
 * @package Scool\Timetables
 */
class ScoolTimetables
{
    /**
     * @return array
     */
    public static function factories()
    {
        return [
            SCOOL_TIMETABLES_PATH . '/database/factories/ShiftFactory.php' =>
                database_path('/factories/ShiftFactory.php')
        ];
    }

    /**
     * @return array
     */
    public static function configs()
    {
        return [
            SCOOL_TIMETABLES_PATH . '/config/timetables.php' =>
                config_path('timetables.php'),
        ];
    }
}