<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Auth;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function system()
    {
        return view('backend.'.Auth::user()->role.'.settings.system');
    }
    public function payment()
    {
        //
    }
    public function sms()
    {
        //
    }
    public function language()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
