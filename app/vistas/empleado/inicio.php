<?php require_once 'app/controlador/Controlador_cliente/ControladorCliente.php';?>
<!doctype html>
<html lang="es">
	<head>
    	<link class="icon" type="image/png" href="../publico/img/logo.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Servindustria TR - Empleado</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Iconos de Bootstrap para mejorar la interfaz visual de las tarjetas y botones -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
		<link rel="stylesheet" href="../publico/css/inicio_cliente.css">
		<link rel="stylesheet" href="../publico/css/inicio_empleado.css">
	</head>
	<body>

		<div class="sidebar-backdrop" id="sidebar-backdrop"></div>

		<main class="container main-content ">
			<section class="stats-panel">
				<div class="avatar-wrap">
					<div class="avatar">
						<img class="action-image" src="../publico/img/usuario.png" alt="">
					</div>
					<div>
						<div class="welcome-text">Bienvenido empleado</div>
						<div class="welcome-name"><?php $cliente->nombre();?></div>
					</div>
				</div>
				<div class="stats-list">
					<div class="stat-card">
						<div class="stat-number">$30</div>
						<div class="stat-label">Paga semanal</div>
					</div>
					<div class="stat-card">
						<div class="stat-number">3</div>
						<div class="stat-label">Trabajos en ejecucion</div>
					</div>
					<div class="stat-card">
						<div class="stat-number">1</div>
						<div class="stat-label">Trabajos Completados</div>
					</div>
				</div>
			</section>
		
<!-- SECCIÓN: Panel de control dinámico expandido para el Cliente -->
<section class="container-fluid mt-4 px-0">
    <div class="row g-4">
        
        <!-- Barra Superior: 3 Botones de Selección horizontales para máximo espacio abajo -->
        <div class="col-12">
            <div class="nav nav-pills gap-2 justify-content-start" id="v-pills-tab" role="tablist">
                <button class="nav-link active py-2.5 px-4 shadow-sm text-uppercase tracking-wider fw-bold border" id="v-pills-horario-tab" data-bs-toggle="pill" data-bs-target="#v-pills-horario" type="button" role="tab" aria-controls="v-pills-horario" aria-selected="true" style="font-size: 0.8rem;">
                    <i class="bi bi-calendar3 me-2"></i> Horario del Proyecto
                </button>
                <button class="nav-link py-2.5 px-4 shadow-sm text-uppercase tracking-wider fw-bold border" id="v-pills-grupo-tab" data-bs-toggle="pill" data-bs-target="#v-pills-grupo" type="button" role="tab" aria-controls="v-pills-grupo" aria-selected="false" style="font-size: 0.8rem;">
                    <i class="bi bi-people-fill me-2"></i> Grupo de Trabajo
                </button>
                <button class="nav-link py-2.5 px-4 shadow-sm text-uppercase tracking-wider fw-bold border" id="v-pills-historial-tab" data-bs-toggle="pill" data-bs-target="#v-pills-historial" type="button" role="tab" aria-controls="v-pills-historial" aria-selected="false" style="font-size: 0.8rem;">
                    <i class="bi bi-briefcase-fill me-2"></i> Trabajos Solicitados
                </button>
            </div>
        </div>

        <!-- Contenedor Inferior Completamente Expandido (100% Ancho) -->
        <div class="col-12">
            <div class="tab-content bg-white p-4 rounded shadow-sm border" id="v-pills-tabContent">
                
                <!-- Vista 1: Horario Completo sin omisiones (08:30 a 18:30) -->
                <div class="tab-pane fade show active" id="v-pills-horario" role="tabpanel" aria-labelledby="v-pills-horario-tab" tabindex="0">
                    <h5 class="mb-3 border-bottom pb-2 text-dark fw-bold text-uppercase tracking-wider" style="font-size: 0.9rem;">Planificación Semanal de Operaciones (Lunes - Domingo)</h5>
                    
                    <div class="table-responsive">
                        <table class="table schedule-corporate-table align-middle text-center m-0">
                            <thead>
                                <tr>
                                    <th class="cell-time-header">Hora</th>
                                    <th class="cell-day-header">Lunes</th>
                                    <th class="cell-day-header">Martes</th>
                                    <th class="cell-day-header">Miércoles</th>
                                    <th class="cell-day-header">Jueves</th>
                                    <th class="cell-day-header">Viernes</th>
                                    <th class="cell-day-header">Sábado</th>
                                    <th class="cell-day-header">Domingo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 08:30 -->
                                <tr>
                                    <td class="cell-time-label">08:30</td>
                                    <td rowspan="3" class="corporate-block">
                                        <div class="block-task-title">Instalación Eléctrica</div>
                                        <div class="block-task-time">08:30 - 10:00</div>
                                    </td>
                                    <td rowspan="4" class="corporate-block">
                                        <div class="block-task-title">Montaje Alumbrado</div>
                                        <div class="block-task-time">08:30 - 10:30</div>
                                    </td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 09:00 -->
                                <tr>
                                    <td class="cell-time-label">09:00</td>
                                    <td class="cell-empty"></td>
                                    <td rowspan="3" class="corporate-block">
                                        <div class="block-task-title">Cableado Interno</div>
                                        <div class="block-task-time">09:00 - 10:30</div>
                                    </td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 09:30 -->
                                <tr>
                                    <td class="cell-time-label">09:30</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 10:00 -->
                                <tr>
                                    <td class="cell-time-label">10:00</td>
                                    <td class="corporate-block">
                                        <div class="block-task-title">Pruebas Continuidad</div>
                                        <div class="block-task-time">10:00 - 10:30</div>
                                    </td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 10:30 -->
                                <tr>
                                    <td class="cell-time-label">10:30</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 11:00 -->
                                <tr>
                                    <td class="cell-time-label">11:00</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 11:30 -->
                                <tr>
                                    <td class="cell-time-label">11:30</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 12:00 -->
                                <tr>
                                    <td class="cell-time-label">12:00</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 12:30 -->
                                <tr>
                                    <td class="cell-time-label">12:30</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 13:00 -->
                                <tr>
                                    <td class="cell-time-label">13:00</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 13:30 -->
                                <tr>
                                    <td class="cell-time-label">13:30</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 14:00 -->
                                <tr>
                                    <td class="cell-time-label">14:00</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 14:30 -->
                                <tr>
                                    <td class="cell-time-label">14:30</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 15:00 -->
                                <tr>
                                    <td class="cell-time-label">15:00</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 15:30 -->
                                <tr>
                                    <td class="cell-time-label">15:30</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 16:00 -->
                                <tr>
                                    <td class="cell-time-label">16:00</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 16:30 -->
                                <tr>
                                    <td class="cell-time-label">16:30</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 17:00 -->
                                <tr>
                                    <td class="cell-time-label">17:00</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 17:30 -->
                                <tr>
                                    <td class="cell-time-label">17:30</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td rowspan="2" class="corporate-block">
                                        <div class="block-task-title">Inspección Final</div>
                                        <div class="block-task-time">17:30 - 18:30</div>
                                    </td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 18:00 -->
                                <tr>
                                    <td class="cell-time-label">18:00</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                                <!-- 18:30 -->
                                <tr>
                                    <td class="cell-time-label">18:30</td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                    <td class="cell-empty"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Vista 2: Grupo de Trabajo (Estructura formal de tabla de personal)[cite: 3] -->
                <div class="tab-pane fade" id="v-pills-grupo" role="tabpanel" aria-labelledby="v-pills-grupo-tab" tabindex="0">
                    <h5 class="mb-3 border-bottom pb-2 text-dark fw-bold text-uppercase tracking-wider" style="font-size: 0.9rem;">Personal Asignado al Proyecto</h5>
                    <div class="table-responsive">
                        <table class="table align-middle text-start m-0 border" style="font-size: 0.85rem;">
                            <thead class="table-dark">
                                <tr>
                                    <th class="ps-3 py-2">Operario / Técnico</th>
                                    <th class="py-2">Especialidad</th>
                                    <th class="py-2">Cargo</th>
                                    <th class="py-2 text-center">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-3 fw-bold text-dark">Ing. Carlos Mendoza</td>
                                    <td>Electricidad de Potencia</td>
                                    <td class="text-secondary">Supervisor Técnico</td>
                                    <td class="text-center"><span class="badge rounded-0 border text-dark bg-light px-2 py-1">ACTIVO</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-3 fw-bold text-dark">Tsu. Alejandro Silva</td>
                                    <td>Albañilería y Estructuras</td>
                                    <td class="text-secondary">Técnico Principal</td>
                                    <td class="text-center"><span class="badge rounded-0 border text-dark bg-light px-2 py-1">ACTIVO</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-3 fw-bold text-dark">Pedro Gómez</td>
                                    <td>Plomería Industrial</td>
                                    <td class="text-secondary">Instalador</td>
                                    <td class="text-center"><span class="badge rounded-0 border text-dark bg-light px-2 py-1">ASIGNADO</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Vista 3: Trabajos Solicitados (Estructura de auditoría y reportes)[cite: 3] -->
                <div class="tab-pane fade" id="v-pills-historial" role="tabpanel" aria-labelledby="v-pills-historial-tab" tabindex="0">
                    <h5 class="mb-3 border-bottom pb-2 text-dark fw-bold text-uppercase tracking-wider" style="font-size: 0.9rem;">Registro General de Servicios y Requerimientos</h5>
                    <div class="table-responsive">
                        <table class="table align-middle text-start m-0 border" style="font-size: 0.85rem;">
                            <thead class="table-dark">
                                <tr>
                                    <th class="ps-3 py-2">Código</th>
                                    <th class="py-2">Descripción del Servicio</th>
                                    <th class="py-2">Área</th>
                                    <th class="py-2">Fecha Solicitud</th>
                                    <th class="py-2 text-center">Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-3 text-secondary font-monospace fw-bold">SRV-2026-001</td>
                                    <td class="fw-bold text-dark">Mantenimiento de Tableros Principales</td>
                                    <td>Electricidad</td>
                                    <td>10/07/2026</td>
                                    <td class="text-center"><span class="badge rounded-0 border text-dark bg-light px-2 py-1">EJECUCIÓN</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-3 text-secondary font-monospace fw-bold">SRV-2026-002</td>
                                    <td class="fw-bold text-dark">Sustitución de Tuberías de Alta Presión</td>
                                    <td>Plomería</td>
                                    <td>08/07/2026</td>
                                    <td class="text-center"><span class="badge rounded-0 border text-dark bg-light px-2 py-1">COMPLETADO</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-3 text-secondary font-monospace fw-bold">SRV-2026-003</td>
                                    <td class="fw-bold text-dark">Reparación de Revestimiento Interno</td>
                                    <td>Albañilería</td>
                                    <td>05/07/2026</td>
                                    <td class="text-center"><span class="badge rounded-0 border text-dark bg-light px-2 py-1">COMPLETADO</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
            
		</main>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="../publico/js/inicio.js"></script>
	</body>
</html>