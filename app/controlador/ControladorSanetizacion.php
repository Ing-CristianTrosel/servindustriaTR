<?php
    namespace app\controlador;

    class ControladorSanetizacion{
        public function sanetizacionCorreoUsuario(string $correo){
            $texto = strtolower($correo);
            return $texto;
        }

        public function sanetizacionNombresPerfil(string $nombre1,string $nombre2,string $apellido1,string $apellido2){
            $Nombre = ucfirst(strtolower(str_replace(' ','',trim($nombre1))));
            $Nombre_2 = ucfirst(strtolower(str_replace(' ','',trim($nombre2))));
            $Apellido = ucfirst(strtolower(str_replace(' ','',trim($apellido1))));
            $Apellido_2 = ucfirst(strtolower(str_replace(' ','',trim($apellido2))));
            

        $perfil = [
            'nombre' => $Nombre,
            'nombre2' => $Nombre_2,
            'apellido' => $Apellido,
            'apellido2' => $Apellido_2
        ];
        return $perfil;
        }
    }