<?php
use app\controlador\ControladorValidaciones;
	class ControladorCliente{
    private object $validaciones;
    public int $montoTotal;
    public int $montoFaltante;
    public int $trabajosTotales;
    public int $trabajosFaltantes;

    public function __construct(){
    $this->validaciones = new ControladorValidaciones;
    }

    public function inicio(){
    if ($_SESSION['id_perfil'] != false) {
    $this->montoTotal = $this->validaciones->validarMontoPagado($_SESSION['id_perfil']);
    $this->montoFaltante = $this->validaciones->validarMontoResultado();
    $this->trabajosTotales = $this->validaciones->validarMostrarTrabajos();
    $this->trabajosFaltantes = $this->validaciones->validarMostrarTrabajosFaltante();
    }else{
        header("location: /servindustriaTR/");
	    }

    }

    public function solicitarServicio(){
        if ($_POST) {
            $direccion = $_POST['direccion'];
            $tipo_servicio = $_POST['tipo_servicio'];
            $tipo_area = $_POST['tipo_area'];
            $fecha_visita = $_POST['fecha_visita'];
            $descripcion = $_POST['descripcion'];
        }
    }

    public function MostrarOpcionesDireccion(){
    $direcciones = $this->validaciones->validarMostrarDireccion($_SESSION['id_perfil']);
        foreach($direcciones as $direccion){
            echo "<option value".$direccion.">".$direccion['ubicacion']."</option>";
        }
    }

    public function nombre(){
        echo $nombre =$this->validaciones->validarMostrarNombre($_SESSION['id_perfil']);
        
    }
}
$cliente = new ControladorCliente();
$cliente->inicio();
$cliente->solicitarServicio();