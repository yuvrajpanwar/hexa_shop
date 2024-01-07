<?php

if (!function_exists('get_user_temp_id')) {
    function get_user_temp_id() {   
        if(!session()->has('USER_TEMP_ID'))
        {
            $user_temp_id = rand(1111111111,9999999999);
            session()->put('USER_TEMP_ID', $user_temp_id);
        }
        else{
            $user_temp_id = session()->get('USER_TEMP_ID');
        } 
        return $user_temp_id;
    }
}
?>