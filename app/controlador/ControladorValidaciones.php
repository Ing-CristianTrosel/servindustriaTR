<?php
    namespace app\controlador;

    use app\modelo\ModeloCliente;
    use app\controlador\ControladorSanetizacion;
use DateTime;

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

        public function validarDireccionRepetida(string $parroquia,string $comunidad,string $calle,string $vivienda){
            $id_perfil = $this->modeloCliente->buscarIdUsuario($_SESSION['correo']);
            $direccion = $this->modeloCliente->seleccionarDireccion($parroquia,$comunidad,$calle,$vivienda,$id_perfil);
            if($direccion != 0){
                return false;
            }else{
                return true;
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
                    $_SESSION['correo'] = $correo;
                    $_SESSION['contraseña'] = $clave;
                    return true;
                }
            }

        }

        public function validarRegistroPerfil(string $nombre1,string $nombre2,string $apellido1,string $apellido2){
            $perfil = $this->sanetizacion->sanetizacionNombresPerfil($nombre1,$nombre2,$apellido1,$apellido2);
            if ($this->validarIdUsuarioRepetido($_SESSION['correo']) != true && $this->validarCorreoRepetido($_SESSION['correo'] != true)) {
                return false;
            }else{
            $this->modeloCliente->insertarUsuario($_SESSION['correo'],$_SESSION['contraseña']);
            $this->modeloCliente->insertarPerfilUsuario($perfil['nombre'],$perfil['nombre2'],$perfil['apellido'],$perfil['apellido2']);
            return true;
            }
        }

        public function validarAccesoUsuario(string $correo,string $contraseña){
            $clave = $this->modeloCliente->obtenerContraseña($correo);
            if ($clave != false) {
                if (password_verify($contraseña,$clave['Contraseña'])) {
                $this->modeloCliente->obtenerIdRol($correo);
                $this->modeloCliente->buscarIdPerfil($correo);
                return true;
                }else{
                    return false;
                }
            }
        }

        public function validarRegistroDireccion(string $municipio, string $parroquia,string $comunidad,string $calle,string $vivienda){
            $direccion = $this->sanetizacion->sanetizacionDireccion($parroquia,$comunidad,$calle,$vivienda);
            $municipio = $this->modeloCliente->buscarIdMunicipio($municipio);
            if ($this->validarDireccionRepetida($parroquia,$comunidad,$calle,$vivienda) != true) {
                echo "Direccion ya registrada";
                header("location: perfil");
                exit;
            }else{
                $this->modeloCliente->insertarDireccionUsuario($municipio['id'],$direccion['parroquia'],$direccion['comunidad'],$direccion['calle'],$direccion['vivienda']);
                header("location: perfil");
                exit;
            }
        }

        public function validarMontoPagado(int $id_perfil){
            $monto = $this->modeloCliente->mostrarMontoPagado($id_perfil);
            if ($monto != true) {
                return $monto['total_pagado']; 
            }else{
                return $monto = 0;
            }
        }

        public function validarMontoFaltante(int $id_perfil){
            $monto = $this->modeloCliente->mostrarMontoFaltante($id_perfil);
            if ($monto != true) {
                return $monto['total_contratado']; 
            }else{
                return $monto = 0;
            }
        }

        public function validarMontoResultado(){
            $montoToltal = $this->validarMontoPagado($_SESSION['id_perfil']);
            $montoFaltante = $this->validarMontoFaltante($_SESSION['id_perfil']);
            $resultado = $montoFaltante - $montoToltal;
            return $resultado;
        }

        public function validarMostrarTrabajos(){
            $mostrar = $this->modeloCliente->mostrarTrabajos($_SESSION['id_perfil']);
            if ($mostrar != true) {
                return $mostrar; 
            }else{
                return $mostrar = 0;
            }
        }

        public function validarMostrarTrabajosFaltante(){
            $mostrar = $this->modeloCliente->mostrarTrabajosFaltante($_SESSION['id_perfil']);
            if ($mostrar != true) {
                return $mostrar; 
            }else{
                return $mostrar = 0;
            }
        }

        public function validarMostrarNombre(int $id){
            $nombre = $this->modeloCliente->mostrarNombreUsuario($id);
            return $nombre = $nombre['nombre_1']." ".$nombre['apellido_1'];
        }

        public function validarMostrarNombreCompleto(int $id){
            $nombre = $this->modeloCliente->mostrarNombreUsuario($id);
            return $nombre;
        }

        public function validarCambiarNombre(string $nombre1,string $nombre2,string $apellido1,string $apellido2, int $id_cliente){
            $perfil = $this->sanetizacion->sanetizacionNombresPerfil($nombre1,$nombre2,$apellido1,$apellido2);
            $this->modeloCliente->actualizarPerfil($perfil['nombre'],$perfil['nombre2'],$perfil['apellido'],$perfil['apellido2'],$id_cliente);
        }

        public  function validarMostrarDireccion(int $id_perfil){
            $direccion = $this->modeloCliente->mostrarDireccionPerfil($id_perfil);
            if ($direccion != false) {
                return $direccion;
            }else{

            }
        }

        public function validarIngresarSolicitud(int $id_cliente,string $direccion, string $servicio, string $area,string $fecha_visita, string $estado, string $descripcion){
            $this->modeloCliente->ingresarSolicitud($id_cliente,$direccion,$servicio,$area,$fecha_visita,$estado,$descripcion);
            header("location: inicio");
            exit;
        }

        public function validarMostrarSolicitudes(int $id_perfil){
            return $solicitudes = $this->modeloCliente->mostrarSolicitudes($id_perfil);
        }

        public function validarMostrarPagos(int $id_perfil){
            return $solicitudes = $this->modeloCliente->mostrarPagos($id_perfil);
        }
        public function validarActualizarContraseña(string $contraseña){
            $clave = password_hash($contraseña,PASSWORD_DEFAULT);
            $this->modeloCliente->actualizarContraseña($clave,$_SESSION['correo']);
            header("location: perfil");
            exit;
        }

        public  function validarMostrarDirecciones(int $id_perfil){
            $direccion = $this->modeloCliente->mostrarDireccionesPerfil($id_perfil);
            return $direccion;

        }

        public function validarBorrarSolicitud(int $valor){
            $this->modeloCliente->borrarSolicitud($valor);
            header("location: solicitudes");
        }
    }