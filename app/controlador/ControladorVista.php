<?php
    namespace app\controlador;

    class ControladorVista{

    public function UsuarioInicio(){
        require_once 'app/vistas/usuario/inicio.html';
    }

    public function UsuarioIniciar_sesion(){
        require_once 'app/vistas/usuario/iniciar-sesion.html';
    }

    public function UsuarioRegistrarse(){
        require_once 'app/vistas/usuario/registrarse.html';
    }

}