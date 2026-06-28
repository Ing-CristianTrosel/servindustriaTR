<?php
namespace app\controlador;

class ControladorBase {
    
    public function validacionTexto(string $texto) {
        if (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\.,!@#\$%&\*\(\):\"'\/\-\\\\]+$/", $texto)) {
            return true;
        } else {
            return false;
        }
    }

    public function validacionNumero(int $numero) {
        if (preg_match("/^[0-9]+$/", $numero)) {
            return true;
        } else {
            return false;
        }
    }

    public function validacionCorreo( string $correo) {
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function validacionTelefono(int $telefono) {
        if (preg_match("/^[0-9]{11}$/", $telefono)) {
            return true;
        } else {
            return false;
        }
    }

    public function validacionDireccion(string $direccion) {
        if (preg_match("/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s]+$/", $direccion)) {
            return true;
        } else {
            return false;
        }
    }
    public function validacionSQL(string $sql){
        $sentencias = ["select","update","delete","drop","SELECT","UPDATE","DELETE","DROP","CREATE"];
        if (in_array($sql,$sentencias)) {
            return false;
        }else{
            return true;
        }
    }
}