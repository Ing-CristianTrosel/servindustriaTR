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
        if (isset($_POST['acceder'])) {
            $correo = $_POST['correo'];
            $contraseña = $_POST['clave'];
            $this->usuario->accederUsuario($correo,$contraseña);
        }
    }

    public function UsuarioRegistro(){
        require_once 'app/vistas/usuario/registrarse.html';
        if (isset($_POST['registrar'])) {
            $correo = $_POST['correo'];
            $contraseña = password_hash($_POST['clave'], PASSWORD_DEFAULT);
            $this->usuario->RegistrarUsuarioCliente($correo,$contraseña);
        }
    }

    public function ClienteInicio(){
        require_once 'app/vistas/cliente/inicio.html';
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