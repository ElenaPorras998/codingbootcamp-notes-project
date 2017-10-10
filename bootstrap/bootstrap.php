<?php

define('SYSTEM_DIR', __DIR__ . '/..'); //The dir thing in the second argument refers to the directory in which this file is located, this means www/coding bootcamp/notes/bootstrap
//so basically the constant refers to the notes folder

define('PUBLIC_DIR', SYSTEM_DIR.'/public'); //evidently this one points to the public dir

define('VENDOR_DIR', SYSTEM_DIR.'/vendor'); //evidently this one points to the vendor dir

//require_once the 3 files that we added / created
require_once VENDOR_DIR.'/codingbootcamp/tinymvc/request.php';
require_once VENDOR_DIR.'/codingbootcamp/tinymvc/helpers.php';
require_once VENDOR_DIR.'/codingbootcamp/exercises/db.php';
require_once VENDOR_DIR.'/polakjan/tinymvc/config.php';
