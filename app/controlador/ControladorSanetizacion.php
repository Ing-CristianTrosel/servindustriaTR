<?php
    namespace app\controlador;

    class ControladorSanetizacion{
        public function sanetizacionCorreoUsuario(string $correo){
            $texto = strtolower($correo);
            return $texto;
        }

        public function sanetizacionNombresPerfil(array $cliente){
            for ($i=0; $i < 5; $i++) { 
                $cliente[$i] = ucfirst(strtolower(str_replace(' ','',trim($cliente[$i]))));
            }
        return $cliente;
        }

        public function sanetizacionDireccion(array $direccion){
            for ($i=0; $i < 5; $i++) {
                $direccion[$i] = ucwords(strtolower(trim($direccion[$i])));
            }
            return $direccion;
        }

    }