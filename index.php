<?php

require_once __DIR__.'/autoload.php';

use app\enrutador\Router;
$raiz = 'servindustriaTR';
$path = str_replace($raiz,'',ltrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/'));


$router = new Router();
$router->agregar('/','UsuarioInicio');
$router->agregar('/acceder','UsuarioIniciar_sesion');
$router->agregar('/registro','UsuarioRegistro');
$router->agregar('/cliente/inicio','ClienteInicio');



$router->dispatch($path);
