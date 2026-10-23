<?php
namespace app\modelo;

use app\modelo\ModeloBase;

class ModeloSQL{
    public object $ModeloBase;
    public array $sql;
    public array $metodo;
    public array $valor;

    
    public function __construct()
    {
        $this->ModeloBase = new ModeloBase();
        $this->sql = [
        'S-Correo' => 'SELECT `id` FROM `usuarios` WHERE `correo` = :correo',
        'V-Usuario' => 'SELECT `correo`, `clave` FROM `usuarios` WHERE `correo` = :correo ',
        'I-Usuario' => 'INSERT INTO `usuarios` (`correo`,`clave`) VALUES(:correo,:clave)',
        ];
        $this->metodo = [
        'S-Correo' => [':correo' => ''],
        'V-Usuario' =>[':correo' =>''],
        'I-Usuario' =>[':correo' => '', ':clave' => ''],
        ];
    }

    public function sql(array $metodo, string $sql, string $return)
    {
        $consulta = $this->ModeloBase->conexion->prepare($sql);
        $consulta->execute($metodo);
        switch ($return) {
        case 'T-Filas':
            return $filas = $consulta->fetchAll(\PDO::FETCH_ASSOC);
            break;
        case 'U-Filas':
            return $filas = $consulta->fetch(\PDO::FETCH_ASSOC);
            break;

        case 'S-Filas':
            return $filas = $consulta->rowCount();
            break;
        }
    }

    public function asignar(string $fuente)
    {
        if (!isset($this->metodo[$fuente]) || !isset($this->valor)) {
        return [];
        }
        $metodo = $this->metodo[$fuente];
        $valores  = $this->valor;

        foreach ($metodo as $llave => $valor) {
        if (isset($valores[$llave])) {
            $this->metodo[$fuente][$llave] = $valores[$llave];
        }
        }
    }

    public function consulta(string $sql, string $return)
    {
        $this->asignar($sql);
        return $this->sql($this->metodo[$sql], $this->sql[$sql], $return);
    }
}
