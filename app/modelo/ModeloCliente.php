<?php
    namespace app\modelo;

use DateTime;

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

        public function mostrarMunicipios(){
            $sql = "SELECT `nombre_municipio` FROM `municipios`";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute();
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

        public function buscarIdMunicipio(string $municipio){
            $sql = "SELECT `id` FROM `municipios` WHERE `nombre_municipio` = :municipio";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':municipio' => $municipio
            ]);
            return $municipio = $consulta->fetch(\PDO::FETCH_ASSOC);
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
            $sql = "INSERT INTO `direccion`(`id_municipio`,`parroquia`,`comunidad`,`calle`,`vivienda`,`id_perfil`) values (:id_municipio,:parroquia,:comunidad,:calle,:vivienda,:id_perfil)";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_municipio' => $id_municipio,
                ':parroquia' => $parroquia,
                ':comunidad' => $comunidad,
                ':calle' => $calle,
                'vivienda' => $vivienda,
                'id_perfil' => $_SESSION['id_perfil']
            ]);
        }

        public function seleccionarDireccion(string $parroquia,string $comunidad,string $calle,string $vivienda){
            $sql = "SELECT * FROM `direccion` WHERE `parroquia`= :parroquia AND `comunidad` = :comunidad AND `calle` = :calle AND `vivienda` = :vivienda AND `id_perfil` = :id_perfil";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':parroquia' => $parroquia,
                ':comunidad' => $comunidad,
                ':calle' => $calle,
                ':vivienda' => $vivienda,
                ':id_perfil' => $_SESSION['id_perfil']
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

        public  function mostrarDireccionPerfil(int $id_perfil){
            $sql = "SELECT CONCAT_WS(' / ', e.nombre_estado, m.nombre_municipio, d.parroquia, d.comunidad, d.calle, d.vivienda) AS ubicacion FROM perfil p INNER JOIN direccion d ON p.id = d.id_perfil INNER JOIN municipios m ON d.id_municipio = m.id INNER JOIN estados e ON m.id_estado = e.id WHERE p.deleted_at IS NULL AND d.deleted_at IS NULL AND p.id = :id_perfil;";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_perfil' => $id_perfil
            ]);
            return $direccion = $consulta->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function ingresarSolicitud(int $id_cliente,string $direccion, string $servicio, string $area, string $fecha_visita, string $estado, string $descripcion){
            $sql = "INSERT INTO `solicitudes` (`id_cliente`,`direccion`,`servicio`,`area`,`fecha_visita`,`estado`,`descripcion`) VALUES(:id_cliente,:direccion,:servicio,:area,:fecha_visita,:estado,:descripcion);";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_cliente' => $id_cliente,
                ':direccion' => $direccion,
                ':servicio' => $servicio,
                ':area' => $area,
                ':fecha_visita' => $fecha_visita,
                ':estado' => $estado,
                ':descripcion' => $descripcion
            ]);
        }

        public function mostrarSolicitudes(int $id_cliente){
            $sql = "SELECT `direccion`,`servicio`,`area`,`fecha_visita`,`estado` FROM `solicitudes` WHERE `id_cliente` = :id_cliente";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_cliente' => $id_cliente
            ]);
            return $nombre = $consulta->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function mostrarPagos(int $id_cliente){
            $sql = "SELECT asig.motivo AS asignacion, ab.monto, ab.fecha_pago, ab.referencia, ab.metodo_pago FROM abonos ab INNER JOIN asignaciones asig ON ab.id_asignacion = asig.id INNER JOIN perfil perf ON asig.id_cliente = perf.id WHERE perf.id = :id_cliente;";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_cliente' => $id_cliente
            ]);
            return $nombre = $consulta->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function actualizarPerfil(string $nombre1,string $nombre2,string $apellido1,string $apellido2, int $id_cliente){
            $sql = "UPDATE `perfil` SET `nombre_1` = :nombre1, `nombre_2`= :nombre2, `apellido_1`= :apellido1 ,`apellido_2`= :apellido2 WHERE `id` = :id_cliente";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':nombre1' => $nombre1,
                ':nombre2' => $nombre2,
                ':apellido1' => $apellido1,
                ':apellido2' => $apellido2,
                ':id_cliente' => $id_cliente
            ]);
        }

        public function actualizarContraseña(string $clave,string $correo){
            $sql = "UPDATE `usuario` SET `Contraseña` = :clave WHERE `correo` = :correo";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':clave' => $clave,
                ':correo' =>$correo
            ]);
        }

        public  function mostrarDireccionesPerfil(int $id_perfil){
            $sql = "SELECT CONCAT_WS('/',e.nombre_estado,m.nombre_municipio,d.parroquia,d.comunidad,d.calle,d.vivienda) AS ubicacion FROM direccion d INNER JOIN municipios m ON d.id_municipio=m.id INNER JOIN estados e ON m.id_estado=e.id WHERE d.id_perfil= :id_perfil AND d.deleted_at IS NULL;";
            $consulta = $this->base->conexion->prepare($sql);
            $consulta->execute([
                ':id_perfil' => $id_perfil
            ]);
            return $direccion = $consulta->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

?>