<?php

require '../core/Router.php';
require '../app/controller/Media.php';
require '../app/model/DAO/MedioDAO.php';

$url = $_SERVER['QUERY_STRING'];


echo 'Bienvenid@ al API de MEDIA BD!!! <br>';

echo 'URL = ' . $url . '<br>';

$router = new Router();
//echo get_class($router)

//ENDPOINTS DE MEDIA
$router->add(
    '/public/media/get',
    array(       //GET para todos los media
        'controller' => 'Media',
        'action' => 'getAllMedia'
    )
);
$router->add(
    '/public/media/get/{id}',
    array(   //GET para un medio
        'controller' => 'Media',
        'action' => 'getMediaById'
    )
);
$router->add(
    '/public/media/create',
    array(      //POST para un medio
        'controller' => 'Media',
        'action' => 'createMedia'
    )
);
$router->add(
    '/public/media/update/{id}',
    array(          //PUT para un medio
        'controller' => 'Media',
        'action' => 'updateMedia'
    )
);
$router->add(
    '/public/media/delete/{id}',
    array(  //DELETE para un medio
        'controller' => 'Media',
        'action' => 'deleteMedia'
    )
);

$urlParams = explode('/', $url); //explode separa en parámetros la url del navegador a través de la '/'

$urlArray = array( //query que voy a recibir a través del navegador desglosada
    'HTTP' => $_SERVER['REQUEST_METHOD'], //para obtener el método HTTP
    'path' => $url,                      //url que viene por el navegador para comprobar en mi router
    'controller' => '',
    'action' => '',
    'params' => ''
);
//FRONT CONTROLLER
//hacemos una validación de que lo que nos entra por el navegador es lo que queremos
//No nos interesa que el controlador venga vacío

if (!empty($urlParams[2])) { //Lo que recibo en posición 2 del navegador no ha de estar vacío (controlador)
    $urlArray['controller'] = ucwords($urlParams[2]); //Si el controlador no está vacío, guardamos el controlador con mayúsculas (ucword)
    if (!empty($urlParams[3])) {                      //Si la no acción está vacía 
        $urlArray['action'] = $urlParams[3];          //la guardamos en el campo action
        if (!empty($urlParams[4])) {                  //Si hay parámetros
            $urlArray['params'] = $urlParams[4];      //lo guardamos en params
        }
    } else {
        $urlArray['action'] = 'index';
    }
} else {                                 //Si el controlador viene vacio: el controlador será Home y el método (action) index
    $urlArray['controller'] = 'Home';    //Controladores con mayúsculas (Clases)
    $urlArray['action'] = 'index';       //Métodos en minúsculas
}

$method = $_SERVER['REQUEST_METHOD'];
$params = [];                                           //Define los parámetros según el método HTTP

if ($router->matchRoutes($urlArray)) {
    if ($method === 'GET') {

        $params[] = intval($urlArray['params']) ?? null;
    } elseif ($method === 'POST') {

        $json = file_get_contents('php://input'); //lee el json del body http
        $params[] = json_decode($json, true);
    } elseif ($method === 'PUT') {

        $id = intval($urlArray['params']) ?? null;
        $json = file_get_contents('php://input'); //lee el json del body http
        echo "$id: " . $id;
        $params[] = $id;
        $params[] = json_decode($json, true);
    } elseif ($method === 'DELETE') {

        $params[] = intval($urlArray['params']) ?? null;
    }

    $controller = $router->getParams()['controller'];    //controlador a llamar
    $action = $router->getParams()['action'];             //método a llamar
    $controller = new $controller();

    print_r($params);
    if (method_exists($controller, $action)) {
        $resp = call_user_func_array([$controller, $action], $params);
    } else {
        echo "El metodo no existe";
    }
}
///////////////////////////////////////////////////////////////
echo '<pre>';
print_r($url) . '<br>'; //url introducida
echo '<pre>';
//print_r($router->getRoutes()) .'<br>'; //muestra las rutas definidas
echo '<pre>';
//print_r($urlArray) . '<br>';          //muestra como queda la estructura con la url introducida
print_r($method) . '<br>';               //muestra el método HTTP
echo '</pre>';
///////////////////////////////////////////////////////////////
