<?php

namespace App\Http\Controllers;

use App\EventCalendar;
use Auth;
use Illuminate\Http\Request;

class EventCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Event Calendar";
        return view('backend.'.Auth::user()->role.'.event_calendar.index');
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
     * @param  \App\EventCalendar  $eventCalendar
     * @return \Illuminate\Http\Response
     */
    public function show(EventCalendar $eventCalendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventCalendar  $eventCalendar
     * @return \Illuminate\Http\Response
     */
    public function edit(EventCalendar $eventCalendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventCalendar  $eventCalendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventCalendar $eventCalendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventCalendar  $eventCalendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventCalendar $eventCalendar)
    {
        //
    }
}