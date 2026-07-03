<?php
require_once __DIR__.'/autoload.php';

use app\enrutador\Router;
$raiz = 'servindustriaTR';
$path = str_replace($raiz,'',ltrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/'));


$router = new Router();
$router->agregar('/','ControladorVista','UsuarioInicio');
$router->agregar('/registro','ControladorVista','UsuarioRegistro');
$router->agregar('/acceder','ControladorVista','UsuarioIniciar_sesion');
$router->agregar('/registro_perfil','ControladorVista','UsuarioRegistroPerfil');
$router->agregar('/Cliente','ControladorVista','ClienteInicio');
$router->agregar('/empleado','ControladorVista','EmpleadoInicio');
$router->agregar('/coordinador','ControladorVista','CoordeinadorInicio');
$router->agregar('/jefe','ControladorVista','JefeInicio');
$router->agregar('/administrador','ControladorVista','AdministradorInicio');




$router->dispatch($path);