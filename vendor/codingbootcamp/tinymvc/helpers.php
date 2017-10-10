<?php

/**
*alias for \codingbootcamp\tinymvc\request::get
*/

function request($name, $default=null)
{
    return \codingbootcamp\tinymvc\request::get($name, $default);
}

/**
* alias for \polakjan\tinymvc\config::get 
*/
function conflict($key, $default=null)
{
    return \polakjan\tinymvc\config::get($key, $default);
}