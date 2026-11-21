<?php

namespace app\controlador;

class controladorMensajeError{
    protected array $mensajes;

    function __construct()
    {
        $this->mensajes =[
            'acceder' => 'Usuario o contraseña incorrectos',
            'registro' => 'Usuario ya utilizado',
        ];
    }

    public function mensaje(string $mensaje){
        echo $this->mensajes[$mensaje];
        exit();
    }

}