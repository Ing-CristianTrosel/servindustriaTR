<?php
    namespace app\controlador;

    use app\modelo\ModeloCliente;
    use app\controlador\ControladorSanetizacion;

    class ControladorValidaciones{
        private object $modeloCliente;
        private object $sanetizacion;

        public function __construct()
        {
            $this->modeloCliente = new ModeloCliente;
            $this->sanetizacion = new ControladorSanetizacion;
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        }
        
        //Micro-funciones
        public function validarCorreoRepetido(string $correo){
            $correo = $this->modeloCliente->seleccionarCorreo($correo);
            if ($correo != 0) {
                echo 'correo ya registrado ';
                return false;
            }else {
                return true;
            }
        }

        public function validarIdUsuarioRepetido(string $correo){
            $id_usuario = $this->modeloCliente->perfilRepetido($correo);
            if ($id_usuario != 0) {
                echo 'perfil de usuario ya registrado ';
                return false;
            }else {
                return true;
            }
        }

        public function validarLongitudClave(string $contraseña){
            $longitud = mb_strlen($contraseña);
            if ($longitud >= 7) {
                return true;
            }else{
                return false;
            }
        }

        
        //Macro-funciones
        public function validarRegistroUsuario(string $correo,string $contraseña){
            if ($this->validarCorreoRepetido($correo) != true) {
                echo "correo ya existente";
            }else{
                $correo = $this->sanetizacion->sanetizacionCorreoUsuario($correo);
                if ($this->validarLongitudClave($contraseña)) {
                    $clave = password_hash($contraseña,PASSWORD_DEFAULT);
                    $this->modeloCliente->insertarUsuario($correo,$clave);
                    return true;
                }
            }

        }

        public function validarRegistroPerfil(string $nombre1,string $nombre2,string $apellido1,string $apellido2){
            $perfil = $this->sanetizacion->sanetizacionNombresPerfil($nombre1,$nombre2,$apellido1,$apellido2);
            if ($this->validarIdUsuarioRepetido($_SESSION['correo']) != true && $this->validarCorreoRepetido($_SESSION['correo'] != true)) {
            }else{
            $this->modeloCliente->insertarPerfilUsuario($perfil['nombre'],$perfil['nombre2'],$perfil['apellido'],$perfil['apellido2']);
            return true;
            }
        }

        public function validarAccesoUsuario(string $correo,string $contraseña){
            $clave = $this->modeloCliente->obtenerContraseña($correo);
            if (password_verify($contraseña,$clave['Contraseña'])) {
                $this->modeloCliente->obtenerIdRol($correo);
                return true;
            }else{
                return false;
            }
        }

        public function validarRegistroDireccion(){
            
        }

    }