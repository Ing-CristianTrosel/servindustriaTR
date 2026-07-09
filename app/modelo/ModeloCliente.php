<?php
    namespace app\modelo;

    class ModeloCliente{
        private object $base;

        public function __construct()
        {
            $this->base = new ModeloBase();
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        }

        public function seleccionarCorreo(string $correo){
            $sql = "SELECT * FROM `usuario` WHERE `correo` = :correo";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':correo' => $correo,
            ]);
            return $filas = $consulta->rowCount();
        }

        public function mostrarMunicipios(int $id_estado){
            $sql = "SELECT `nombre_municipio` FROM `municipios` WHERE `id_estado` = :id_estado";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_estado' => $id_estado
            ]);
            return $municipio = $consulta->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function mostrarEstados(){
            $sql = "SELECT * FROM `estados`";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute();
            return $estado = $consulta->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function obtenerContraseña(string $correo){
            $sql = "SELECT * FROM `usuario` WHERE `correo` = :correo";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':correo' => $correo,
            ]);
             return $consulta->fetch(\PDO::FETCH_ASSOC);
            
        }

        public function obtenerIdRol(string $correo){
            $id_perfil = $this->buscarIdUsuario($correo);
            $sql = "SELECT `id_rol` FROM `perfil` WHERE `id_usuario` = :id_usuario";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_usuario' => $id_perfil['id']
            ]);
            $id_rol = $consulta->fetch(\PDO::FETCH_ASSOC);
            if ($id_rol != false) {
                $_SESSION['id_rol']= $id_rol['id_rol'];
            }
        }

        public function insertarUsuario(string $correo,string $contraseña){
            $sql = "INSERT INTO `usuario` (`correo`,`contraseña`) values (:correo,:clave)";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':correo' => $correo,
                ':clave' => $contraseña
            ]);
            $this->buscarIdUsuario($correo);
            $_SESSION['correo'] = $correo;
        }

        public function buscarIdUsuario(string $correo){
            $sql = "SELECT id FROM `usuario` WHERE `correo` = :correo";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':correo' => $correo
            ]);
            return $valor = $consulta->fetch(\PDO::FETCH_ASSOC);

        }

        public function buscarIdPerfil(string $correo){
            $id_usuario = $this->buscarIdUsuario($correo);
            $sql = "SELECT id FROM `perfil` WHERE `id_usuario` = :id_usuario";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_usuario' => $id_usuario['id']
            ]);
            $id_perfil = $consulta->fetch(\PDO::FETCH_ASSOC);
            $_SESSION['id_perfil'] = $id_perfil['id'];
            $_SESSION['correo'] = $correo;
            return $id_perfil['id'];
        }

        public function perfilRepetido(string $correo){
            $id_usuario = $this->buscarIdUsuario($correo);
            $sql = "SELECT `id_usuario` FROM `perfil` WHERE `id_usuario` = :id_usuario";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_usuario' => $id_usuario['id'],
            ]);
            return $filas = $consulta->rowCount();
        }


        public function insertarPerfilUsuario(string $nombre_1,string $nombre_2,string $apellido_1,string $apellido_2){
            $id_usuario = $this->buscarIdUsuario($_SESSION['correo']);
            $sql = "INSERT INTO `perfil` (nombre_1,nombre_2,apellido_1,apellido_2,id_rol,id_usuario) values (:nombre_1,:nombre_2,:apellido_1,:apellido_2,1,:id_usuario)";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':nombre_1' =>$nombre_1,
                ':nombre_2' =>$nombre_2,
                ':apellido_1' =>$apellido_1,
                ':apellido_2' =>$apellido_2,
                ':id_usuario' => $id_usuario['id']
            ]);
        }

        public function insertarDireccionUsuario(int $id_municipio,string $parroquia,string $comunidad,string $calle, string $vivienda){
            $id_usuario = $this->buscarIdUsuario($_SESSION['correo']);
            $sql = "INSERT INTO `direccion`(`id_municipio`,`parroquia`,`comunidad`,`calle`,`vivienda`,`id_perfil`) values (:id_municipio,:parroquia,:comunidad,:calle,:vivienda,:id_perfil)";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->excute([
                ':id_municipio' => $id_municipio,
                ':parroquia' => $parroquia,
                ':comunidad' => $comunidad,
                ':calle' => $calle,
                'vivienda' => $vivienda,
                'id_perfil' => $id_usuario
            ]);
        }

        public function seleccionarDireccion(string $parroquia,string $comunidad,string $calle,string $vivienda,int $id_perfil){
            $sql = "SELECT * FROM `direccion` WHERE `parroquia`= :parroquia AND `comunidad` = :comunidad AND `calle` = :calle AND `vivienda` = :vivienda AND `id_perfil` = :id_perfil";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':parroquia' => $parroquia,
                ':comunidad' => $comunidad,
                ':calle' => $calle,
                ':vivienda' => $vivienda,
                ':id_perfil' => $id_perfil
            ]);
            return $filas = $consulta->rowCount();
        }

        public function mostrarMontoPagado(int $id_perfil){
            $sql = "SELECT SUM(ab.monto) AS total_pagado FROM abonos ab JOIN asignaciones a ON ab.id_asignacion = a.id JOIN perfil p ON a.id_cliente = p.id WHERE p.id = :id_perfil AND ab.deleted_at IS NULL AND a.deleted_at IS NULL AND p.deleted_at IS NULL;";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_perfil' => $id_perfil
            ]);
            return $monto = $consulta->fetch(\PDO::FETCH_ASSOC);
        }

        public function mostrarMontoFaltante(int $id_perfil){
            $sql ="SELECT SUM(a.monto_total_servicio) AS total_contratado FROM asignaciones a JOIN perfil p ON a.id_cliente = p.id WHERE p.id = :id_perfil AND a.deleted_at IS NULL AND p.deleted_at IS NULL;";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_perfil' => $id_perfil
            ]);
            return $montoFaltante = $consulta->fetch(\PDO::FETCH_ASSOC);
        }

        public function mostrarTrabajos(int $id_perfil){
            $sql = "SELECT * FROM asignaciones WHERE id_cliente = :id_cliente AND deleted_at IS NULL;";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_cliente' => $id_perfil
            ]);
            return $filas = $consulta->rowCount();
        }

        public function mostrarTrabajosFaltante(int $id_perfil){
            $sql = "SELECT * FROM asignaciones WHERE id_cliente = :id_cliente AND fecha_finalizado IS NOT NULL AND deleted_at IS NULL;";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_cliente' => $id_perfil
            ]);
            return $filas = $consulta->rowCount();
        }

        public function mostrarNombreUsuario(int $id){
            $sql = "SELECT * FROM `perfil` WHERE `id` = :id";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id' => $id
            ]);
            return $nombre = $consulta->fetch(\PDO::FETCH_ASSOC);
        }
    }

?>