<?php


namespace Scool\Timetables\Models;


/**
 * Class AttendanceType
 * @package Scool\Timetables\Models
 */
class AttendanceType
{
    const F_TYPE = "Faltes";

    const FJ_TYPE = "Faltes justificades";

    const R_TYPE = "Retards";

    const RJ_TYPE = "Retards Justificats";

    const E_TYPE = "Expulsions";

    protected $fillable = ['name'];
}