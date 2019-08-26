<?php

if (!function_exists('setting')) {
    function setting($index) {
        $settings = parse_ini_file('settings.ini');
        return $settings[$index];
    }
}