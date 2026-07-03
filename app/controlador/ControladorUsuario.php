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
        if($this->validaciones->validarRegistroUsuario($correo,$contraseña) != true){
            header("Location: registro");
            exit();
        }else{
            header("Location: registro_perfil");
            exit();
        }
    }

    public function accederUsuario(string $correo,string $contraseña){
        if($this->validaciones->validarAccesoUsuario($correo,$contraseña) != true){
                echo 'error';
            }else{
                switch($_SESSION['id_rol']){
                    case '1': 
                        header("Location: cliente");
                        exit();
                    break;
                    case '2': 
                        header("Location: empleado");
                        exit();
                    break;
                    case '3': 
                        header("Location: coordinador");
                        exit();
                    break;
                    case '4': 
                        header("Location: jefe");
                        exit();
                    break;
                    case '5': 
                        header("Location: administrador");
                        exit();
                    break;
                }
            }
    }

    public function RegistrarPerfilCliente(string $nombre1,string $nombre2,string $apellido1,string $apellido2){
        if ($this->validaciones->validarRegistroPerfil($nombre1,$nombre2,$apellido1,$apellido2) != true){
                header("Location: registro_perfil");
                exit();
            }else{
                header("Location: acceder");
                exit();
            }
    }
}