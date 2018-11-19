<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.department.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = new Department();
        $department->name = $request->name;
        $department->school_id = 1;
        if($department->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.admin.department.list')->render(),
                'notification' =>"Department Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.admin.department.list')->render(),
                'notification' =>"An Error Occured When Adding Department"
            );
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('backend.admin.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $department->name = $request->name;
        $department->school_id = 1;
        if($department->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.admin.department.list')->render(),
                'notification' =>"Department Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.admin.department.list')->render(),
                'notification' =>"An Error Occured When Updating Department"
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Department::destroy($id)){
            $data = array(
                'status' => true,
                'view' => view('backend.admin.department.list')->render(),
                'notification' =>"Department Deleted Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.admin.department.list')->render(),
                'notification' =>"An Error Occured When Deleting Department"
            );
        }
        return $data;
    }
}
