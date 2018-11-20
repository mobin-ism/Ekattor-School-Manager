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
        return view('backend.admin.teacher_permission.index');
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
    public function update(TeacherPermission $teacherPermission)
    {
        
    }

    public function assign_permission() {
      $class_id = $_POST['class_id'];
      $section_id = $_POST['section_id'];
      $isChecked = $_POST['isChecked'];
      $taskName_teacherID = $_POST['task_teacherId'];
      $array = explode('-', $taskName_teacherID);
      $task = $array[0];
      $teacher_id = $array[1];

      $condition = ['class_id' => $class_id, 'section_id' => $section_id, 'teacher_id' => $teacher_id];
      $query = TeacherPermission::where($condition)->get();
      if(count($query) > 0) {
        $teacher_permission = TeacherPermission::find($query[0]->id);
        $teacher_permission->$task = $isChecked;

      }else {
        $teacher_permission = new TeacherPermission;
        $teacher_permission->class_id = $class_id;
        $teacher_permission->section_id = $section_id;
        $teacher_permission->teacher_id = $teacher_id;
        $teacher_permission->$task = $isChecked;
      }

      $teacher_permission->save();
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
