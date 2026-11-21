<?php
namespace app\controlador;

use app\modelo\ModeloSQL;
class Inserciones{
    private object $cliente;
    public function __construct()
    {
        $this->cliente = new ModeloSQL();
    }
    public function insertarUsuario(string $correo,string $clave){
        $this->cliente->valor = [':correo' => $correo, ':clave' => $clave];
        $this->cliente->consulta('I-Usuario','');
        $this->cliente->consulta('I-RolPerfilCliente','');
        header("Location: acceder");
        exit();
    }
}