<?php
use App\Setting;

function get_settings($type) {

    $settings = Setting::first();
    return $settings[$type];
}

function school_id() {
    if(Auth::user()->role == "superadmin") {
        return get_settings('selected_branch');
    }else {
        return Auth::user()->school_id;
    }
}
