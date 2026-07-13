<?php
    namespace app\controlador;

    class ControladorVista{
        private object $usuario;

    public function __construct()
    {
        $this->usuario = new ControladorUsuario();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function UsuarioInicio(){
        require_once 'app/vistas/usuario/inicio.html';
    }

    public function UsuarioIniciar_sesion(){
        require_once 'app/vistas/usuario/iniciar-sesion.html';
        if ($_POST) {
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];
            $this->usuario->accederUsuario($correo,$contraseña);
        }
    }

    public function UsuarioRegistro(){
        require_once 'app/vistas/usuario/registrarse.html';
        if ($_POST) {
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];
            $this->usuario->RegistrarUsuarioCliente($correo,$contraseña);
        }
    }
    public function UsuarioRegistroPerfil(){
        require_once 'app/vistas/usuario/registroPerfil.html';
        if ($_POST) {
            $nombre1 = $_POST['nombre1'];
            $nombre2 = $_POST['nombre2'];
            $apellido1 = $_POST['apellido1'];
            $apellido2 = $_POST['apellido2'];
            $this->usuario->RegistrarPerfilCliente($nombre1,$nombre2,$apellido1,$apellido2);
        }
    }

    public function ClienteInicio(){
        require_once 'app/vistas/cliente/inicio.php';
    }
    public function ClienteSolicitudes(){
        require_once 'app/vistas/cliente/solicitudes.php';
    }
    public function ClientePagos(){
        require_once 'app/vistas/cliente/pagos.php';
    }
    public function ClienteTrabajos(){
        require_once 'app/vistas/cliente/trabajos.php';
    }
    public function ClientePerfil(){
        require_once 'app/vistas/cliente/perfil.php';
    }
    public function ClienteCarrito(){
        require_once 'app/vistas/cliente/carrito.php';
    }
    public function ClienteSalir(){
        $this->usuario->salir();
    }
    public function EmpleadoInicio(){
        require_once 'app/vistas/empleado/inicio.php';
    }
    public function CoordinadorInicio(){
        require_once 'app/vistas/coordinador/inicio.php';
    }

}