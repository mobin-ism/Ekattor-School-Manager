<?php
use App\Setting;
function get_settings($type) {
    $settings = Setting::first();
    return $settings[$type];
}
