<?php

namespace codingbootcamp\tinymvc;

class request
{
    /*
    *Get information from request or a default value
    */
    public static function get($name, $default=null)
    {
        if(isset($_REQUEST[$name]))
        {
            return $_REQUEST[$name]; // echo or whatever way we use it
        }
        else
        {
            return $default; // null or whatever the value should be if the key is not found
        }
    }
}