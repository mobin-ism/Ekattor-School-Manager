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

/**
 * Open Translation File
 * @return Response
*/
function openJSONFile($code){
    $jsonString = [];
    if(File::exists(base_path('resources/lang/'.$code.'.json'))){
        $jsonString = file_get_contents(base_path('resources/lang/'.$code.'.json'));
        $jsonString = json_decode($jsonString, true);
    }
    return $jsonString;
}

/**
 * Save JSON File
 * @return Response
*/
function saveJSONFile($language_code, $updating_key, $updating_value){
    $jsonString = [];
    if(File::exists(base_path('resources/lang/'.$language_code.'.json'))){
        $jsonString = file_get_contents(base_path('resources/lang/'.$language_code.'.json'));
        $jsonString = json_decode($jsonString, true);
        $jsonString[$updating_key] = $updating_value;
    }else {
        $jsonString[$updating_key] = $updating_value;
    }
    $jsonData = json_encode($jsonString, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    file_put_contents(base_path('resources/lang/'.$language_code.'.json'), stripslashes($jsonData));
}
