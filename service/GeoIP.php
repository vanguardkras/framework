<?php

namespace Service;

/**
 * Determines geo information by IP.
 *
 * @author Max Shaian
 */
class GeoIP 
{
    private const URL = 'http://nl.sxgeo.city/json/';
    
    /**
     * Returns an array of location information.
     * 
     * @return mixed
     */
    public static function get()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        
        $request = file_get_contents(self::URL.$ip);
        $request = json_decode($request, true);
        
        $result = [];
        if (isset($request['city']['id'])) {
            $result['ip'] = $ip;
            $result['country'] = $request['country']['name_en'];
            $result['region'] = $request['region']['name_en'];
            $result['city'] = $request['city']['name_en'];
            return $result;
        } else {
            return false;
        }
    }
}
