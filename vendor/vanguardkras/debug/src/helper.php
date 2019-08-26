<?php

if (!function_exists('debug')) {
    function debug($var) {
        $debug = new Vanguardkras\Debug\Debug($var);
        $debug->handle();
    }
}