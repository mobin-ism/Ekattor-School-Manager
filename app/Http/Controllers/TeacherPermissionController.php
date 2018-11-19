<?php

namespace App\Http\Controllers;

use App\TeacherPermission;
use App\Section;
use Illuminate\Http\Request;

class TeacherPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = \App\Teacher::where('school_id', 1)->get();
        return view('backend.admin.teacher_permission.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeacherPermission  $teacherPermission
     * @return \Illuminate\Http\Response
     */
    public function show($section_id)
    {

        $class_id = Section::find($section_id)->class_id;
        $teachers = \App\Teacher::where('school_id', 1)->get();
        return view('backend.admin.teacher_permission.list', compact('class_id', 'section_id', 'teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeacherPermission  $teacherPermission
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherPermission $teacherPermission)
    {
        return view('backend.admin.teacher_permission.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeacherPermission  $teacherPermission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherPermission $teacherPermission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeacherPermission  $teacherPermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherPermission $teacherPermission)
    {
        //
    }
}
