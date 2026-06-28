<?php
require_once __DIR__.'/autoload.php';

use app\enrutador\Router;
$raiz = 'servindustria';
$path = str_replace($raiz,'',ltrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/'));


$router = new Router();
$router->agregar('/','ControladorVista','UsuarioInicio');
$router->agregar('/registrarse','ControladorVista','UsuarioRegistrarse');
$router->agregar('/acceder','ControladorVista','UsuarioIniciar_sesion');

$router->dispatch($path);