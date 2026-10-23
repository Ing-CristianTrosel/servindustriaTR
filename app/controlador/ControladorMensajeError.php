<?php

namespace app\controlador;

class controladorMensajeError{
    protected array $mensajes;

    function __construct()
    {
        $this->mensajes =[
            'acceder' => 'acceso denegado',
            'registro' => 'Usuario ya utilizado',

        ];
    }

    public function mensaje(string $mensaje){
        echo $this->mensajes[$mensaje];
        exit();
    }

}