<?php

namespace app\controlador;

class ControladorSesiones{

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function guardarSession(array $session){
        echo $_SESSION['usuario'] = $session['id'];
    }
}