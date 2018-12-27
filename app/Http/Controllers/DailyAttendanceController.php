<?php

namespace App\Http\Controllers;

use App\DailyAttendance;
use Illuminate\Http\Request;
use Auth;
use App\Section;
use App\Enroll;

class DailyAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.Auth::user()->role.'.daily_attendance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.daily_attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = strtotime($request->date);
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $school_id = get_settings('selected_branch');
        $entries = DailyAttendance::where('timestamp', $date)->where('class_id', $class_id)->where('section_id', $section_id)->where('school_id', $school_id)->get();

        foreach($entries as $entry) {
            $name   = 'status_'.$entry->id;
            $status = $request->$name;
            if($status != null) {
                $dailyAttendance = DailyAttendance::find($entry->id);
                $dailyAttendance->status = $status;
                $dailyAttendance->save();
            }
        }

        $data = array(
            'status' => true,
            'view' => view('backend.'.Auth::user()->role.'.daily_attendance.list')->render(),
            'notification' =>"Attendance updated successfully"
        );

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DailyAttendance  $dailyAttendance
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request) {

        $section_id = $request->section_id;
        $section  = Section::find($section_id);
        $class_id = $section->class->id;
        $running_session = get_settings('running_session');
        $school_id = get_settings('selected_branch');
        $students = Enroll::where(['section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();
        $month = $request->month;
        $year = $request->year;
        return view('backend.'.Auth::user()->role.'.daily_attendance.list', compact('students', 'class_id', 'section_id', 'month', 'year'));
    }


    public function students(Request $request) {

        $section_id = $request->section_id;
        $section  = Section::find($section_id);
        $class_id = $section->class->id;
        $running_session = get_settings('running_session');
        $school_id = get_settings('selected_branch');
        $date = strtotime($request->date);

        $students = Enroll::where(['section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();

        foreach($students as $student) {
            $entry = DailyAttendance::where('timestamp', $date)->where('class_id', $class_id)->where('section_id', $section_id)->where('student_id', $student->student_id)->where('school_id', $school_id)->get();
            if(count($entry) == 0) {
                $dailyAttendance = new DailyAttendance;
                $dailyAttendance->timestamp = $date;
                $dailyAttendance->class_id = $class_id;
                $dailyAttendance->section_id = $section_id;
                $dailyAttendance->student_id = $student->student_id;
                $dailyAttendance->school_id = $school_id;
                $dailyAttendance->save();
            }
        }

        $entries = DailyAttendance::where('timestamp', $date)->where('class_id', $class_id)->where('section_id', $section_id)->where('school_id', $school_id)->get();
        return view('backend.'.Auth::user()->role.'.daily_attendance.students', compact('entries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DailyAttendance  $dailyAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyAttendance $dailyAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DailyAttendance  $dailyAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyAttendance $dailyAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DailyAttendance  $dailyAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyAttendance $dailyAttendance)
    {
        //
    }
}