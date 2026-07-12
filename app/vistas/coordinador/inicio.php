<?php require_once 'app/controlador/Controlador_cliente/ControladorCliente.php';?>
<!doctype html>
<html lang="es">
	<head>
    	<link class="action-image" rel="icon" type="image/png" href="../publico/img/logo.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Servindustria TR - Cliente</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../publico/css/inicio_cliente.css">
		<link rel="stylesheet" href="../publico/css/inicio_coordinador.css">
	</head>
	<body>

		<button class="hamburger-toggle" id="sidebar-toggle" type="button" 
                data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-label="Abrir menú" aria-controls="navbarNav" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>

	<div class="sidebar-backdrop" id="sidebar-backdrop"></div>

		<aside class="sidebar" id="sidebar-menu" aria-label="Menú lateral">
			<div class="sidebar-header">
				<a class="sidebar-brand" href="#">
					<span class="brand-logo" aria-hidden="true">
						<img class="action-image" src="../publico/img/logo.png" alt="">
					</span>
					<span class="brand-text fw-bold">Servindustria TR</span>
				</a>
				<button class="sidebar-close" id="sidebar-close" type="button" aria-label="Cerrar menú">&times;</button>
			</div>
			<nav class="sidebar-nav">
				
				<a class="btn btn-salir sidebar-link-logout sidebar-link-cart" href="salir">
					<span class="action-carrito">
						<img class="action-image" src="../publico/img/puerta_blanca.png" alt="">
					</span>
				Salir</a>
			</nav>
		</aside>

		<main class="container main-content mt-4">
			<section class="stats-panel">
				<div class="avatar-wrap">
					<div class="avatar">
						<!-- SVG user icon -->
						<img class="action-image" src="../publico/img/usuario.png" alt="">
					</div>
					<div>
						<div class="welcome-text">Bienvenido</div>
						<div class="welcome-name"><?php $cliente->nombre();?></div>
					</div>
				</div>
				<div class="stats-list">
					<div class="stat-card">
						<div class="stat-number">$<?php echo $cliente->montoTotal;?></div>
						<div class="stat-label">Monto Pagados</div>
					</div>
					<div class="stat-card">
						<div class="stat-number">$<?php echo $cliente->montoFaltante;?></div>
						<div class="stat-label">Monto Faltante</div>
					</div>
					<div class="stat-card">
						<div class="stat-number"><?php echo $cliente->trabajosTotales;?></div>
						<div class="stat-label">Trabajos Completados</div>
					</div>
					<div class="stat-card">
						<div class="stat-number"><?php echo $cliente->trabajosFaltantes;?></div>
						<div class="stat-label">Trabajos Completados</div>
					</div>
				</div>
			</section>
		
	</main>
<!-- Módulo del Coordinador - Todo Unificado en un Solo Contenedor -->
<section class="action-grid container-fluid py-4 coordinador-seccion-bg">
    <div class="row">
        <div class="col-12">
            
            <!-- TARJETA CONTENEDOR PRINCIPAL ÚNICA -->
            <div class="card shadow-sm border-0 rounded-4 p-4">
                
                <!-- PARTE SUPERIOR INTERNA: Botones de Control (Pills Horizontales) -->
                <div class="border-bottom pb-3 mb-4 coordinador-tabs-border">
                    <ul class="nav nav-pills justify-content-center justify-content-md-start gap-2" id="coordinador-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active px-4 py-2.5 fw-bold rounded-3" 
                                    id="tab-solicitudes" data-bs-toggle="pill" data-bs-target="#pane-solicitudes" 
                                    type="button" role="tab" aria-controls="pane-solicitudes" aria-selected="true">
                                <i class="bi bi-envelope-paper-fill me-2"></i>Solicitudes
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-4 py-2.5 fw-bold rounded-3" 
                                    id="tab-horarios" data-bs-toggle="pill" data-bs-target="#pane-horarios" 
                                    type="button" role="tab" aria-controls="pane-horarios" aria-selected="false">
                                <i class="bi bi-calendar3 me-2"></i>Horario
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-4 py-2.5 fw-bold rounded-3" 
                                    id="tab-financiero" data-bs-toggle="pill" data-bs-target="#pane-financiero" 
                                    type="button" role="tab" aria-controls="pane-financiero" aria-selected="false">
                                <i class="bi bi-bar-chart-line-fill me-2"></i>Trabajos Participados
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-4 py-2.5 fw-bold rounded-3" 
                                    id="tab-trabajadores" data-bs-toggle="pill" data-bs-target="#pane-trabajadores" 
                                    type="button" role="tab" aria-controls="pane-trabajadores" aria-selected="false">
                                <i class="bi bi-people-fill me-2"></i>Grupo de Trabajo
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-4 py-2.5 fw-bold rounded-3" 
                                    id="tab-inventario" data-bs-toggle="pill" data-bs-target="#pane-inventario" 
                                    type="button" role="tab" aria-controls="pane-inventario" aria-selected="false">
                                <i class="bi bi-tools me-2"></i>Préstamo de Herramientas
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- CONTENEDOR INTERNO DE VISTAS DINÁMICAS -->
                <div class="tab-content" id="coordinador-tabs-content">
                    
                    <!-- VISTA 1: GESTIÓN DE SOLICITUDES -->
                    <div class="tab-pane fade show active" id="pane-solicitudes" role="tabpanel" aria-labelledby="tab-solicitudes">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-shape rounded-3 me-3 coordinador-icon-box">
                                <i class="bi bi-patch-check-fill"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold coordinador-titulo-caliente">Aprobación de Solicitudes</h5>
                                <p class="text-muted small mb-0">Revisa y procesa las peticiones de los clientes registradas en el sistema[cite: 1].</p>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover align-middle custom-table">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Servicio / Área</th>
                                        <th>Descripción</th>
                                        <th>Fecha Visita</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-dark">Pedro Pérez</td>
                                        <td>
                                            <span class="badge px-3 py-2 text-dark font-monospace coordinador-badge-acento">fontaneria</span>
                                            <small class="text-muted d-block mt-1">instalacion_puntos</small>
                                        </td>
                                        <td class="text-secondary">Revisión de filtración en tubería principal.</td>
                                        <td>2026-07-11 16:08:00</td>
                                        <td class="text-center">
                                            <div class="d-inline-flex gap-2">
                                                <button class="btn btn-action-approve btn-sm px-3 rounded-2 fw-bold"><i class="bi bi-check2 me-1"></i> Aprobar</button>
                                                <button class="btn btn-action-reject btn-sm px-2 rounded-2"><i class="bi bi-x-lg">Rechazar</i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- VISTA 2: ASIGNACIÓN DE HORARIOS (HORARIO) -->
                    <div class="tab-pane fade" id="pane-horarios" role="tabpanel" aria-labelledby="tab-horarios">
                        
                        <!-- PARTE SUPERIOR: TÍTULO Y BOTÓN DE ACCIÓN -->
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                            <div>
                                <h5 class="fw-bold mb-1 coordinador-titulo-caliente">
                                    <i class="bi bi-calendar3 me-2"></i>Planificación Semanal de Operaciones
                                </h5>
                                <p class="text-muted small mb-0">Lunes a Domingo — Gestión del tiempo de ejecución de proyectos.</p>
                            </div>
                            <!-- BOTÓN QUE ACTIVA EL MODAL -->
                            <button type="button" class="btn btn-caliente px-4 py-2.5 rounded-3 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalAgregarTrabajo">
                                <i class="bi bi-plus-circle-fill me-2"></i>Agregar Trabajo
                            </button>
                        </div>

                        <!-- TABLA DE HORARIO ESTILO AGENDA SEMANAL -->
                        <div class="table-responsive rounded-3 border">
                            <table class="table table-bordered align-middle text-center mb-0 tabla-horario-semanal">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="py-3 text-uppercase fw-bold columna-hora-encabezado text-warning">Hora</th>
                                        <th class="py-3 text-uppercase fw-bold columna-dia text-white">Lunes</th>
                                        <th class="py-3 text-uppercase fw-bold columna-dia text-white">Martes</th>
                                        <th class="py-3 text-uppercase fw-bold columna-dia text-white">Miércoles</th>
                                        <th class="py-3 text-uppercase fw-bold columna-dia text-white">Jueves</th>
                                        <th class="py-3 text-uppercase fw-bold columna-dia text-white">Viernes</th>
                                        <th class="py-3 text-uppercase fw-bold columna-dia text-white">Sábado</th>
                                        <th class="py-3 text-uppercase fw-bold columna-dia text-white">Domingo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Bloque 08:30 -->
                                    <tr>
                                        <td class="fw-bold bg-dark text-white celda-bloque-hora">08:30</td>
                                        <td rowspan="3" class="p-1 align-top bg-light">
                                            <div class="p-2 border border-dark rounded bg-white text-start shadow-sm tarjeta-bloque-trabajo">
                                                <div class="fw-bold text-dark text-uppercase mb-1 titulo-trabajo-bloque">Instalación Eléctrica</div>
                                                <span class="text-muted d-block">08:30 - 10:00</span>
                                            </div>
                                        </td>
                                        <td rowspan="4" class="p-1 align-top bg-light">
                                            <div class="p-2 border border-dark rounded bg-white text-start shadow-sm tarjeta-bloque-trabajo">
                                                <div class="fw-bold text-dark text-uppercase mb-1 titulo-trabajo-bloque">Montaje Alumbrado</div>
                                                <span class="text-muted d-block">08:30 - 10:30</span>
                                            </div>
                                        </td>
                                        <td class="bg-light"></td>
                                        <td class="bg-light"></td>
                                        <td class="bg-light"></td>
                                        <td class="bg-light"></td>
                                        <td class="bg-light"></td>
                                    </tr>
                                    <!-- Bloque 09:00 -->
                                    <tr>
                                        <td class="fw-bold bg-dark text-white celda-bloque-hora">09:00</td>
                                        <td class="bg-light"></td>
                                        <td rowspan="3" class="p-1 align-top bg-light">
                                            <div class="p-2 border border-dark rounded bg-white text-start shadow-sm tarjeta-bloque-trabajo">
                                                <div class="fw-bold text-dark text-uppercase mb-1 titulo-trabajo-bloque">Cableado Interno</div>
                                                <span class="text-muted d-block">09:00 - 10:30</span>
                                            </div>
                                        </td>
                                        <td class="bg-light"></td>
                                        <td class="bg-light"></td>
                                        <td class="bg-light"></td>
                                    </tr>
                                    <!-- Bloque 09:30 -->
                                    <tr>
                                        <td class="fw-bold bg-dark text-white celda-bloque-hora">09:30</td>
                                        <td class="bg-light"></td>
                                        <td class="bg-light"></td>
                                        <td class="bg-light"></td>
                                        <td class="bg-light"></td>
                                    </tr>
                                    <!-- Bloque 10:00 -->
                                    <tr>
                                        <td class="fw-bold bg-dark text-white celda-bloque-hora">10:00</td>
                                        <td class="p-1 align-top bg-light">
                                            <div class="p-2 border border-dark rounded bg-white text-start shadow-sm tarjeta-bloque-trabajo">
                                                <div class="fw-bold text-dark text-uppercase mb-1 titulo-trabajo-bloque">Pruebas Continuidad</div>
                                                <span class="text-muted d-block">10:00 - 10:30</span>
                                            </div>
                                        </td>
                                        <td class="bg-light"></td>
                                        <td class="bg-light"></td>
                                        <td class="bg-light"></td>
                                        <td class="bg-light"></td>
                                    </tr>
                                    
                                    <!-- Filas de Estructura Visual -->
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">10:30</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">11:00</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">11:30</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">12:00</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">12:30</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">13:00</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">13:30</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">14:00</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">14:30</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">15:00</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">15:30</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">16:00</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">16:30</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">17:00</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    
                                    <!-- Bloque Final Sábado 17:30 -->
                                    <tr>
                                        <td class="fw-bold bg-dark text-white celda-bloque-hora">17:30</td>
                                        <td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td>
                                        <td rowspan="3" class="p-1 align-top bg-light">
                                            <div class="p-2 border border-dark rounded bg-white text-start shadow-sm tarjeta-bloque-trabajo">
                                                <div class="fw-bold text-dark text-uppercase mb-1 titulo-trabajo-bloque">Inspección Final</div>
                                                <span class="text-muted d-block">17:30 - 18:30</span>
                                            </div>
                                        </td>
                                        <td class="bg-light"></td>
                                    </tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">18:00</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                    <tr><td class="fw-bold bg-dark text-white celda-bloque-hora">18:30</td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td><td class="bg-light"></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- VISTA 3: REPORTE Y FINANZAS (TRABAJOS PARTICIPADOS) -->
                    <div class="tab-pane fade" id="pane-financiero" role="tabpanel" aria-labelledby="tab-financiero">
                        

                        <h5 class="fw-bold mb-3 coordinador-titulo-caliente"><i class="bi bi-exclamation-circle me-2 text-dark"></i>Cuentas por Cobrar</h5>
                        <div class="table-responsive">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Monto Servicio</th>
                                        <th>Total Abonado</th>
                                        <th>Faltante por Pagar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-monospace fw-bold text-secondary">#11</td>
                                        <td class="fw-bold">Pedro Pérez</td>
                                        <td>$180.00</td>
                                        <td>$0.00</td>
                                        <td><span class="badge bg-danger-light text-danger fw-bold px-3 py-2 rounded-2">$180.00</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- VISTA 4: GRUPO DE TRABAJO (NUEVO PANEL AUTÓNOMO) -->
                    <div class="tab-pane fade" id="pane-trabajadores" role="tabpanel" aria-labelledby="tab-trabajadores">
                        
                        <!-- PARTE SUPERIOR: TÍTULO Y BOTÓN DE REGISTRO -->
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                            <div>
                                <h5 class="fw-bold mb-1" style="color: #F97316;">
                                    <i class="bi bi-people-fill me-2"></i>Nómina del Personal Activo
                                </h5>
                                <p class="text-muted small mb-0">Visualiza el equipo y añade nuevos trabajadores calificados a la nómina general de Servindustria TR[cite: 1].</p>
                            </div>
                            <!-- BOTÓN QUE ACTIVA LA MODAL DE TRABAJADOR -->
                            <button type="button" class="btn btn-caliente px-4 py-2.5 rounded-3 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalAgregarTrabajador">
                                <i class="bi bi-person-plus-fill me-2"></i>Agregar Trabajador
                            </button>
                        </div>

                        <!-- TABLA DE TRABAJADORES -->
                        <div class="table-responsive rounded-3 border">
                            <table class="table table-hover align-middle custom-table mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="py-3 px-4">Trabajador (Nombre y Apellido)</th>
                                        <th class="py-3">Especialización</th>
                                        <th class="py-3">Sueldo Base</th>
                                        <th class="py-3 text-center">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Registro 1 -->
                                    <tr>
                                        <td class="px-4">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; font-size: 0.85rem;">
                                                    CM
                                                </div>
                                                <span class="fw-bold text-dark">Carlos Mendoza</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge px-3 py-2 text-dark font-monospace coordinador-badge-acento">Electricista</span>
                                        </td>
                                        <td class="fw-bold text-secondary">$350.00</td>
                                        <td class="text-center">
                                            <span class="badge bg-success px-3 py-2 rounded-2">Activo</span>
                                        </td>
                                    </tr>
                                    <!-- Registro 2 -->
                                    <tr>
                                        <td class="px-4">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; font-size: 0.85rem;">
                                                    JG
                                                </div>
                                                <span class="fw-bold text-dark">Juan Gómez</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge px-3 py-2 text-dark font-monospace coordinador-badge-acento">Plomero</span>
                                        </td>
                                        <td class="fw-bold text-secondary">$300.00</td>
                                        <td class="text-center">
                                            <span class="badge bg-warning text-dark px-3 py-2 rounded-2">En Servicio</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- VISTA 5: SOLICITUD DE PRÉSTAMO DE HERRAMIENTAS (NUEVO PANEL AUTÓNOMO) -->
                    <div class="tab-pane fade" id="pane-inventario" role="tabpanel" aria-labelledby="tab-inventario">
                        <div class="mb-4">
                            <h5 class="fw-bold mb-1" style="color: #F97316;">
                                <i class="bi bi-hammer me-2"></i>Asignación y Préstamo de Herramientas
                            </h5>
                            <p class="text-muted small mb-0">Controla el flujo de inventario y vincula herramientas activas a los operadores y proyectos de campo[cite: 1].</p>
                        </div>

                        <div class="card bg-light border-0 rounded-4 p-4 mt-3">
                            <form class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">HERRAMIENTA REQUERIDA</label>
                                    <select class="form-select p-2.5 rounded-3 coordinador-input-bg bg-white" required>
                                        <option value="1">Taladro Percutor Industrial (Disponibles: 4)</option>
                                        <option value="2">Amoladora Angular (Disponibles: 2)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">VINCULAR AL OPERADOR / EMPLEADO</label>
                                    <select class="form-select p-2.5 rounded-3 coordinador-input-bg bg-white" required>
                                        <option value="1">Carlos Mendoza - Trabajo #11</option>
                                    </select>
                                </div>
                                <div class="col-12 text-end mt-4">
                                    <button type="submit" class="btn btn-acento-salida px-4 py-2 rounded-3 fw-bold">
                                        <i class="bi bi-arrow-right-short fs-5 align-middle"></i> Procesar Salida
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div> <!-- FIN CARD CONTENEDOR ÚNICO -->
            
        </div>
    </div>
</section>

<!-- ==========================================
     MODALES EXISTENTES Y NUEVAS 
     ========================================== -->

<!-- MODAL: AGREGAR TRABAJO (PLANIFICACIÓN DE HORARIO) -->
<div class="modal fade" id="modalAgregarTrabajo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAgregarTrabajoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header bg-dark text-white rounded-top-4 py-3">
                <h5 class="modal-title fw-bold" id="modalAgregarTrabajoLabel">
                    <i class="bi bi-calendar-plus me-2 text-warning"></i>Planificar Nuevo Trabajo
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <form action="app/controlador/Controlador_coordinador/ProcesarHorario.php" method="POST" id="form-nuevo-horario">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label text-muted small fw-bold">1. ASIGNACIÓN DEL PROYECTO</label>
                            <select name="asignacion_trabajo" class="form-select p-2.5 rounded-3 coordinador-input-bg" required>
                                <option value="" disabled selected>Selecciona la asignación...</option>
                                <option value="11">Trabajo #11 - Inst. Aire Acondicionado (Pedro Pérez)</option>
                                <option value="12">Trabajo #12 - Reparación Tubería Principal</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label text-muted small fw-bold">2. DÍA DE INICIO SEMANAL</label>
                            <select name="dia_comienzo" class="form-select p-2.5 rounded-3 coordinador-input-bg" required>
                                <option value="" disabled selected>Selecciona un día...</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miércoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sábado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label text-muted small fw-bold">3. DÍA ESTIMADO DE FINALIZACIÓN</label>
                            <select name="dia_finalizacion" class="form-select p-2.5 rounded-3 coordinador-input-bg" required>
                                <option value="" disabled selected>Selecciona estimación de término...</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miércoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sábado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label text-muted small fw-bold">4. INTENSIDAD HORARIA (POR DÍA)</label>
                            <select name="horas_diarias" class="form-select p-2.5 rounded-3 coordinador-input-bg" required>
                                <option value="" disabled selected>Selecciona cantidad de horas...</option>
                                <option value="1">1 Hora diaria</option>
                                <option value="2">2 Horas diarias</option>
                                <option value="3">3 Horas diarias</option>
                                <option value="4">4 Horas diarias</option>
                                <option value="6">6 Horas diarias</option>
                                <option value="8">8 Horas diarias (Jornada Completa)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light rounded-bottom-4 border-top-0 p-3">
                    <button type="button" class="btn btn-secondary px-3 py-2 rounded-3" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-caliente px-4 py-2 rounded-3 fw-bold">
                        <i class="bi bi-calendar-check me-2"></i>Guardar y Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- MODAL: AGREGAR TRABAJADOR -->
<div class="modal fade" id="modalAgregarTrabajador" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAgregarTrabajadorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header bg-dark text-white rounded-top-4 py-3">
                <h5 class="modal-title fw-bold" id="modalAgregarTrabajadorLabel">
                    <i class="bi bi-person-plus-fill me-2 text-warning"></i>Registrar Nuevo Trabajador
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <form action="app/controlador/Controlador_coordinador/ProcesarTrabajador.php" method="POST" id="form-nuevo-trabajador">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        
                        <!-- SECCIÓN 1: DATOS DE ACCESO -->
                        <div class="col-12">
                            <span class="text-muted small fw-bold text-uppercase d-block mb-1 border-bottom pb-1" style="letter-spacing: 0.5px;">1. Cuenta de Acceso</span>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-bold">Correo Electrónico</label>
                            <input type="email" name="correo" class="form-control p-2.5 rounded-3 coordinador-input-bg" placeholder="ejemplo@servindustria.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-bold">Contraseña</label>
                            <input type="password" name="contrasena" class="form-control p-2.5 rounded-3 coordinador-input-bg" placeholder="********" required>
                        </div>

                        <!-- SECCIÓN 2: IDENTIFICACIÓN PERSONAL -->
                        <div class="col-12 mt-4">
                            <span class="text-muted small fw-bold text-uppercase d-block mb-1 border-bottom pb-1" style="letter-spacing: 0.5px;">2. Información Personal</span>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-muted small fw-bold">Primer Nombre</label>
                            <input type="text" name="primer_nombre" class="form-control p-2.5 rounded-3 coordinador-input-bg" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-muted small fw-bold">Segundo Nombre</label>
                            <input type="text" name="segundo_nombre" class="form-control p-2.5 rounded-3 coordinador-input-bg">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-muted small fw-bold">Primer Apellido</label>
                            <input type="text" name="primer_apellido" class="form-control p-2.5 rounded-3 coordinador-input-bg" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-muted small fw-bold">Segundo Apellido</label>
                            <input type="text" name="segundo_apellido" class="form-control p-2.5 rounded-3 coordinador-input-bg">
                        </div>

                        <!-- SECCIÓN 3: PUESTO Y REMUNERACIÓN -->
                        <div class="col-12 mt-4">
                            <span class="text-muted small fw-bold text-uppercase d-block mb-1 border-bottom pb-1" style="letter-spacing: 0.5px;">3. Especialización y Sueldo</span>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-bold">Especialización</label>
                            <select name="especializacion" class="form-select p-2.5 rounded-3 coordinador-input-bg" required>
                                <option value="" disabled selected>Selecciona especialización...</option>
                                <option value="Electricista">Electricidad</option>
                                <option value="Albañil">Albañilería</option>
                                <option value="Carpintero">Carpintería</option>
                                <option value="Plomero">Plomería</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-bold">Sueldo Base ($)</label>
                            <input type="number" step="0.01" name="sueldo" class="form-control p-2.5 rounded-3 coordinador-input-bg" placeholder="0.00" required>
                        </div>

                    </div>
                </div>
                <div class="modal-footer bg-light rounded-bottom-4 border-top-0 p-3">
                    <button type="button" class="btn btn-secondary px-3 py-2 rounded-3" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-caliente px-4 py-2 rounded-3 fw-bold">
                        <i class="bi bi-person-check-fill me-2"></i>Registrar Trabajador
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="../publico/js/inicio.js"></script>
	</body>
</html>