<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Section;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.class.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $class = new Classes;
        $class->name = $request->name;
        $class->school_id = 1;


        if($class->save()){
            $this->createSection($class->id);
            $data = array(
                'status' => true,
                'view' => view('backend.admin.class.list')->render(),
                'notification' =>"Class Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.admin.class.list')->render(),
                'notification' =>"An Error Occured When Adding Class"
            );
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show($class_id)
    {
        $classes = Classes::find($class_id);
        return view('backend.admin.class.section', compact('classes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classes = Classes::find($id);
        return view('backend.admin.class.edit', compact('classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $classes = Classes::find($id);
        $classes->name = $request->name;
        $classes->school_id = 1;

        if($classes->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.admin.class.list')->render(),
                'notification' =>"Class Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.admin.class.list')->render(),
                'notification' =>"An Error Occured When Updating Class"
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Classes::destroy($id)){
            $data = array(
                'status' => true,
                'view' => view('backend.admin.class.list')->render(),
                'notification' =>"Class Deleted Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.admin.class.list')->render(),
                'notification' =>"An Error Occured When Deleting Class"
            );
        }
        return $data;
    }

    public function createSection($class_id = "") {
            $section = new Section;
            $section->name = "A";
            $section->school_id = 1;
            $section->class_id = $class_id;
            $section->save();
    }
}
