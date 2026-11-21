<?php
    namespace app\controlador;

    class ControladorUsuario{

    private object $validaciones;

    public function __construct()
    {
        $this->validaciones = new ControladorValidaciones();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function RegistrarUsuarioCliente(string $correo,string $contraseña){
        $this->validaciones->validarRegistro($correo,$contraseña);
    }

    public function accederUsuario(string $correo,string $contraseña){
        $this->validaciones->validarUsuario($correo,$contraseña);
        switch(1){
            case '1': 
                header("Location: cliente/inicio");
                exit();
            break;
            case '2': 
                header("Location: empleado/inicio");
                exit();
            break;
            case '3': 
                header("Location: coordinador/inicio");
                exit();
            break;
            case '4': 
                header("Location: jefe/inicio");
                exit();
            break;
            case '5': 
                header("Location: administrador/inicio");
                exit();
            break;
        }
    }

    

    public function salir(){
        session_destroy();
        header("Location: /servindustriaTR/");
        exit;
    }
}