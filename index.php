<?php
ob_start();
require_once __DIR__.'/autoload.php';

use app\enrutador\Router;
$raiz = 'servindustriaTR';
$path = str_replace($raiz,'',ltrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/'));


$router = new Router();
$router->agregar('/','ControladorVista','UsuarioInicio');
$router->agregar('/registro','ControladorVista','UsuarioRegistro');
$router->agregar('/acceder','ControladorVista','UsuarioIniciar_sesion');
$router->agregar('/registro_perfil','ControladorVista','UsuarioRegistroPerfil');
$router->agregar('/registro_direccion','ControladorVista','RegistroDireccion');
$router->agregar('/cliente/inicio','ControladorVista','ClienteInicio');
$router->agregar('/cliente/solicitudes','ControladorVista','ClienteSolicitudes');
$router->agregar('/cliente/pagos','ControladorVista','ClientePagos');
$router->agregar('/cliente/trabajos','ControladorVista','ClienteTrabajos');
$router->agregar('/cliente/perfil','ControladorVista','ClientePerfil');
$router->agregar('/cliente/salir','ControladorVista','ClienteSalir');
$router->agregar('/empleado/inicio','ControladorVista','EmpleadoInicio');
$router->agregar('/coordinador/inicio','ControladorVista','CoordeinadorInicio');
$router->agregar('/jefe/inicio','ControladorVista','JefeInicio');
$router->agregar('/administrador/inicio','ControladorVista','AdministradorInicio');

$router->dispatch($path);
register_shutdown_function(function(){ if (ob_get_level()) ob_end_flush(); });