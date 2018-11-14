<?php

namespace App\Http\Controllers;

use App\Section;
use App\Classes;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_id)
    {

        foreach(array_combine($request->name, $request->section_id) as $name => $section_id){
            if($name) {
                $section = $section_id ? Section::find($section_id) : new Section;
                $section->name = $name;
                $section->class_id = $class_id;
                $section->save();
            }
        }

        return array(
            'status' => true,
            'view' => view('backend.admin.class.list')->render(),
            'notification' => 'Damn!!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($section_id)
    {
        Section::destroy($section_id);
        return view('backend.admin.class.list');
    }
}
