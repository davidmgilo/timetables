<?php

namespace Scool\Timetables\Database\Seeds;

use Illuminate\Database\Seeder;
use Scool\Timetables\Models\Classroom;
use Scool\Timetables\Models\Day;
use Scool\Timetables\Models\Lesson;
use Scool\Timetables\Models\Location;
use Scool\Timetables\Models\Timeslot;


/**
 * Class LessonsSeeder
 * @package Scool\Timetables\Database\Seeds
 */
class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = \App\User::find(2);
       $location = Location::find(3);
       $day = Day::find(2);
       $timeslot = Timeslot::find(7);
       $classroom = Classroom::find(1);
       $lesson = $this->createLesson();
       $location->lessons()->save($lesson);
       $day->lessons()->save($lesson);
       $timeslot->lessons()->save($lesson);
       $classroom->lessons()->save($lesson);
       $lesson->users()->save($user);
       $lesson->step1step2();
    }


    /**
     * Creates a lesson
     *
     * @return mixed
     */
    private function createLesson()
    {
       return Lesson::firstOrCreate([]);
//       $lesson->days()->save(Day::find($day));
//       $lesson->timeslots()->save(Timeslot::find($timeslot));
//       $lesson->classrooms()->save(Classroom::find($classroom));
//       return $lesson;
    }
}
