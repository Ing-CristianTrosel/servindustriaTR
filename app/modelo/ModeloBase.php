<?php
namespace app\modelo;

use PDO;
use PDOException;

class ModeloBase {
    private $host = 'localhost';
    private $usuario = 'root';
    private $password = '';
    private $db = 'servindustria';
    public object $conexion;

    public function __construct(){
        try {
            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->db", $this->usuario, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }
}