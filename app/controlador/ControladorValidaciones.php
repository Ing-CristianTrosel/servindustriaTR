<?php
namespace app\controlador;

use app\modelo\ModeloSQL;

 class ControladorValidaciones{
    
    public object $cliente;
    public object $error;
    public object $inserciones;



    public function __construct()
    {
        $this->error = new controladorMensajeError();
        $this->cliente = new ModeloSQL();
        $this->inserciones = new Inserciones();
    }

    public function validarCorreo(string $correo){
        $this->cliente->valor = [':correo' => $correo];
        $cliente = $this->cliente->consulta('S-Correo','S-Filas');
        return $resultado = ($cliente != 1) ? "aprovado" :"denegado";
    }

    public function validarUsuario(string $correo , string $clave){
        $this->cliente->valor = [':correo' => $correo ];
        $cliente = $this->cliente->consulta('V-Usuario','U-Filas');
        echo $cliente['clave'];
        $_SESSION['usuario'] = (password_verify($clave,$cliente['clave'])) ? $this->cliente->consulta('S-Correo','U-Filas'): $this->error->mensaje('acceder');
    }

    public function validarRegistro(string $correo, string $clave){
        $this->cliente->valor = [':correo' => $correo];
        $cliente = $this->cliente->consulta('S-Correo','S-Filas');
        ($cliente != 1) ? $this->inserciones->insertarUsuario($correo,$clave) : $this->error->mensaje('registro');
    }
    
}
