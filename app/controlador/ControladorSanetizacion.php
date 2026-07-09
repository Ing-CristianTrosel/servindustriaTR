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

        public function sanetizacionDireccion(string $parroquia,string $comunidad,string $calle,string $vivienda){
            $parroquia = ucwords(strtolower(trim($parroquia)));
            $comunidad = ucwords(strtolower(trim($comunidad)));
            $calle = ucwords(strtolower(trim($calle)));
            $vivienda = ucwords(strtolower(trim($vivienda)));

            $direccion = [
                'parroquia' =>$parroquia,
                'comunidad'=> $comunidad,
                'calle'=> $calle,
                'vivienda'=> $vivienda
            ];

            return $direccion;
        }

    }