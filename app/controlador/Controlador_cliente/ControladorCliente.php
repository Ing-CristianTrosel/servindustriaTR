<?php
use app\controlador\ControladorValidaciones;
use app\modelo\ModeloCliente;

	class ControladorCliente{
    private object $validaciones;
    private object $modeloCliente;
    public int $montoTotal;
    public int $montoFaltante;
    public int $trabajosTotales;
    public int $trabajosFaltantes;
    public string $primerNombre;
    public string $segundoNombre;
    public string $primerApellido;
    public string $segundoApellido;
    


    public function __construct(){
    $this->validaciones = new ControladorValidaciones;
    $this->modeloCliente = new ModeloCliente;
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
            if (isset($_POST['boton-servicio']) == 'servicio') {
            $direccion = $_POST['direccion'];
            $servicio = $_POST['tipo_servicio'];
            $area = $_POST['tipo_area'];
            $fecha_visita = $_POST['fecha_visita'];
            $descripcion = $_POST['descripcion'];
            $estado = 'pendiente';
            $this->validaciones->validarIngresarSolicitud($_SESSION['id_perfil'],$direccion,$servicio,$area,$fecha_visita,$estado,$descripcion);
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

    public function nombreCompleto(){
        if ($_POST) {
            if (isset($_POST['boton_nombres']) == 'nombres') {
            $nombre1 = $_POST['nombre1'];
            $nombre2 = $_POST['nombre2'];
            $apellido1 = $_POST['apellido1'];
            $apellido2 = $_POST['apellido2'];
            $this->validaciones->validarCambiarNombre($nombre1,$nombre2,$apellido1,$apellido2,$_SESSION['id_perfil']);
            }
        }
        $nombre = $this->validaciones->validarMostrarNombreCompleto($_SESSION['id_perfil']);
        $this->primerNombre = $nombre['nombre_1'];
        $this->segundoNombre = $nombre['nombre_2'];
        $this->primerApellido = $nombre['apellido_1'];
        $this->segundoApellido = $nombre['apellido_2'];
        
    }

    public function cambioContraseña(){
        if ($_POST) {
            
            if (isset($_POST['boton_clave']) == 'contraseña') {
            $contraseña = $_POST['contraseña'];
            $confirmar_contraseña = $_POST['confirmar_contraseña'];
                if ($contraseña == $confirmar_contraseña) {
                    $this->validaciones->validarActualizarContraseña($contraseña);
                }
            }
        }
    }

    public function mostrarSolicitudes(){
        $solicitudes = $this->validaciones->validarMostrarSolicitudes($_SESSION['id_perfil']);
        foreach($solicitudes as $solicitud){
            echo "
                <tr>
                    <td>".$solicitud['direccion']."</td>
                    <td>".$solicitud['servicio']."</td>
                    <td>".$solicitud['area']."</td>
                    <td>".$solicitud['fecha_visita']."</td>
                    <td>".$solicitud['estado']."</td>
            ";
            if($solicitud['estado'] != 'aprobado'){
            echo "
                <form action="."solicitudes"." method="."POST"." >
                    <td><button class="."btn btn-pagar-trabajo"." value=".$solicitud['id']." name="."borrar"."  onchange='this.form.submit()' >Borrar</button></td>
                </form>
                ";
            }else{
                echo "<td></td>";
            }
            echo "</tr>";
        }
    }

    public function mostrarPagos(){
        $pagos = $this->validaciones->validarMostrarPagos($_SESSION['id_perfil']);
        foreach($pagos as $pago){
            echo "
                <tr>
                    <td>".$pago['asignacion']."</td>
                    <td>".$pago['monto']."</td>
                    <td>".$pago['fecha_pago']."</td>
                    <td>".$pago['referencia']."</td>
                    <td>".$pago['metodo_pago']."</td>
                </tr>
            ";
        }
    }

    public function mostrarEstados(){
        $estados = $this->modeloCliente->mostrarEstados();
        foreach($estados as $estado){
            echo "<option value=".$estado['nombre_estado'].">";
        }
    }

    public function mostrarMunicipios(){
        $municipios = $this->modeloCliente->mostrarMunicipios();
        foreach($municipios as $municipio){
            echo "<option value=".$municipio['nombre_municipio'].">";
        }
    }

    public function ingresarDireccion(){
        if (isset($_POST['boton-direccion']) == 'direccion') {
            $municipio = $_POST['municipios'];
            $parroquia = $_POST['parroquia'];
            $comunidad = $_POST['comunidad'];
            $calle = $_POST['calle'];
            $vivienda = $_POST['vivienda'];
            $this->validaciones->validarRegistroDireccion($municipio,$parroquia,$comunidad,$calle,$vivienda);
        }
    }

    public function mostrarDireccion(){
        $direcciones = $this->modeloCliente->mostrarDireccionesPerfil($_SESSION['id_perfil']);
        foreach($direcciones as $direccion){
            echo "
            <tr>
                <td> ".$direccion['ubicacion']." </td>
            </tr>
            ";
        }
    }

    public function borrarSolicitudes(){
        if (isset($_POST['borrar'])) {
            $valor = $_POST['borrar'];
            $this->validaciones->validarBorrarSolicitud($valor);
        }
    }

    public function mostrarSolicitudesCoordinador(){
        $solicitudes = $this->validaciones->validarMostrarTodasSolicitudes();
        foreach($solicitudes as $solicitud){
            echo "
                <tr>
                    <td class='fw-bold text-dark'>".$solicitud['nombre']."</td>
                    <td>
                        <span class='badge px-3 py-2 text-dark font-monospace coordinador-badge-acento'>".$solicitud['servicio']."</span>
                    </td>
                    <td class='text-secondary'>".$solicitud['descripcion']."</td>
                    <td>".$solicitud['fecha_visita']."</td>
                    <td class='text-center'>
                        <div class='d-inline-flex gap-2'>
                            <form action='inicio' method='POST' >
                                <button class='btn btn-action-approve btn-sm px-3 rounded-2 fw-bold' name='boton-aprovar' value='".$solicitud['id']."'  onchange='this.form.submit()'><i class='bi bi-check2 me-1' ></i> Aprobar</button>
                            </form>
                            <form action='inicio' method='POST' >
                                <button class='btn btn-action-reject btn-sm px-2 rounded-2' name='boton-rechazar' value=".$solicitud['id']."  onchange='this.form.submit()'><i class='bi bi-x-lg' ></i> Rechazar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            ";
        }
    }

    public function aprovarSolicitudes(){
        if (isset($_POST['boton-aprovar'])) {
            $valor = $_POST['boton-aprovar'];
            $this->validaciones->validarAprovarSolicitud($valor);
        }
    }

    public function rechazarSolicitudes(){
        if (isset($_POST['boton-rechazar'])) {
            $valor = $_POST['boton-rechazar'];
            $this->validaciones->validarRechazarSolicitud($valor);
        }
    }

    public function mostrarTrabajosCliente(){
        $trabajos = $this->validaciones->validarMostrarTrabajosCliente($_SESSION['id_perfil']);
        foreach($trabajos as $trabajo){
            echo "
                <tr>
                    <td>".$trabajo['descripcion_asignacion']."</td>
                    <td>".$trabajo['monto']."</td>
                    <td>".$trabajo['fecha_inicio']."</td>
                    <td>".$trabajo['fecha_finalizado']."</td>
                    <td>".$trabajo['estado']."</td>
                </tr>
            ";
        }
    }
}
$cliente = new ControladorCliente();
$cliente->inicio();
$cliente->solicitarServicio();
$cliente->nombreCompleto();
$cliente->cambioContraseña();
$cliente->ingresarDireccion();
$cliente->borrarSolicitudes();
$cliente->aprovarSolicitudes();