<?php
include '../bootstrap/bootstrap.php'; //this includes the bootstrapping

//use \codingbootcamp\tinymvc\request //if I use this then I can just put request in the line below

$route = request('route', 404); //this is the fully qualified name
//(the one that includes the namespace)

/**
*Have a look at the request and return the name of 
*controller and name of the action that should handle this request
*/
function getControllerActionFromRequest()
{
    $routes = [];

    include ROUTES_DIR.'/web.php';

    //get the current route from the request or homepage if it is not there
    $current_route = request('route', 'homepage');

    //if there is an item in routes with current_route for index
    if(isset($routes[$current_route]))
    {
        return $routes[$current_route];
    }
    else 
    {
        //return the error 404
        return [
            'controller'=>'errorController',
            'action'=>'error404'
        ];
    }
}

function runControllerMethod($controller_name, $action_name)
{
    //include the index controller (just for testing)
    include APP_DIR.'/controllers/'.$controller_name.'.php';
    
    //create the controller object
    $controller_class = '\\app\\controllers\\'.$controller_name;
    $controller = new $controller_class();
    
    //call the rifht action of the controller object
    echo $controller->$action_name();
}

//get the array with the name of the controller and it's action from request
$controller_action=getControllerActionFromRequest();

//run the right controller and it's action
runControllerMethod($controller_action['controller'], $controller_action['action']);