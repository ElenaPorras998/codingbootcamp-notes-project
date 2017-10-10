<?php
include '../bootstrap/bootstrap.php'; //this includes the bootstrapping

var_dump(PUBLIC_DIR);

//use \codingbootcamp\tinymvc\request //if I use this then I can just put request in the line below

$route = request('route', 404); //this is the fully qualified name
//(the one that includes the namespace)

echo $route;