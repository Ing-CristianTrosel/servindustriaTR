<?php require_once 'app/controlador/Controlador_cliente/ControladorCliente.php';?>
<!doctype html>
<html lang="es">
	<head>
    	<link rel="icon" type="image/png" href="../publico/img/logo.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Servindustria TR - Cliente</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../publico/css/carrito.css">
		<link rel="stylesheet" href="../publico/css/inicio_cliente.css">
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
				<a class="sidebar-link sidebar-link-cart" href="inicio">
					<span class="action-carrito">
						<img class="action-image" src="../publico/img/casita.png" alt="">
					</span>
					Inicio
				</a>
				<a class="sidebar-link sidebar-link-cart" href="trabajos">
					<span class="action-carrito">
						<img class="action-image" src="../publico/img/plano_blanco.png" alt="">
					</span>
					Trabajos
				</a>
				<a class="sidebar-link sidebar-link-cart" href="pagos">
					<span class="action-carrito">
						<img class="action-image" src="../publico/img/dinero_blanco.png" alt="">
					</span>
					Pagos
				</a>
				<a class="sidebar-link active sidebar-link-cart" href="perfil">
					<span class="action-carrito">
						<img class="action-image" src="../publico/img/perfil.png" alt="">
					</span>
					Perfil
				</a>
				<a class="sidebar-link sidebar-link-cart" href="carrito">
					<span class="action-carrito">
						<img class="action-image" src="../publico/img/carrito_blanco.png" alt="">
					</span>
					Carrito
				</a>
				<a class="btn btn-salir sidebar-link-logout sidebar-link-cart" href="salir">
					<span class="action-carrito">
						<img class="action-image" src="../publico/img/puerta_blanca.png" alt="">
					</span>
				Salir</a>
			</nav>
		</aside>

		<main class="container main-content mt-4">
			<div class="row g-4 align-items-start">
				
				<!-- 1) COLUMNA IZQUIERDA: Listado de Selección del Cliente -->
				<div class="col-lg-8">
					<div class="stats-panel p-4 panel-block">
						<h4 class=" mb-4 pb-2 section-title">
							Tienda
						</h4>
						
						<div class="custom-table-container">
							<table class="table align-middle mb-0 custom-shop-table">
								<thead>
									<tr>
										<th scope="col" class="table-header-title">PRODUCTO</th>
										<th scope="col" class="table-header-title">ÁREA</th>
										<th scope="col" class="table-header-title text-end">PRECIO</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="table-cell-main">Instalación de Cableado Eléctrico</td>
										<td class="table-cell-muted">Electricidad</td>
										<td class="table-cell-price text-end">$150.00</td>
									</tr>
									<tr>
										<td class="table-cell-main">Mantenimiento de Tuberías</td>
										<td class="table-cell-muted">Plomería</td>
										<td class="table-cell-price text-end">$85.00</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="mt-4">
							<a href="inicio" class="small text-decoration-none text-white">← Seguir buscando servicios</a>
						</div>
					</div>
				</div>

				<!-- COLUMNA DERECHA ACCIONES -->
				<div class="col-lg-4">
					
					<!-- 2) Método de Pago -->
					<div class="stats-panel p-4 mb-4 panel-block">
						<h4 class="mb-3 pb-2 section-title">
							Método de Pago
						</h4>
						
						<div class="mb-3">
							<select id="metodoPago" class="form-select border-secondary w-100 py-2 select-center-text">
								<option value="">Seleccione una opción</option>
								<option value="pago_movil">Pago Móvil</option>
								<option value="efectivo">Efectivo</option>
							</select>
						</div>

						<!-- Contenedor desplegable Pago Móvil -->
						<div id="infoPagoMovil" class="p-3 border rounded border-secondary text-start d-none mobile-pay-info">
							<p class="mb-2 small"><span class="highlight-text">Banco:</span> Banco de Venezuela</p>
							<p class="mb-2 small"><span class="highlight-text">Teléfono:</span> 0412-1234567</p>
							<p class="mb-0 small"><span class="highlight-text">RIF:</span> J-12345678-9</p>
						</div>
					</div>

					<!-- 3) Resumen del Pedido -->
					<div class="stats-panel p-4 panel-block">
						<h4 class=" mb-3 pb-2 section-title">
							Resumen del Pedido
						</h4>
						
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span class="text-muted-custom">Subtotal:</span>
							<span class="text-white-bold">$235.00</span>
						</div>
						<div class="d-flex justify-content-between align-items-center mb-3">
							<span class="text-muted-custom">Impuestos (IVA):</span>
							<span class="text-white-bold">$0.00</span>
						</div>
						
						<div class="d-flex justify-content-between align-items-center mb-4 pt-3 total-row-divider">
							<span class="text-white-bold">Total Estimado:</span>
							<span class="final-price-text">$235.00</span>
						</div>

						<!-- Botón final para procesar el flujo -->
						<button class="btn btn-salir btn-confirm-pay w-100 py-2 fw-bold" data-bs-toggle="modal" data-bs-target="#modalVerificacion">
							Confirmar Pago
						</button>
					</div>
					
				</div>
			</div>

			<!-- MODAL DE VERIFICACIÓN -->
			<div class="modal fade" id="modalVerificacion" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content border-secondary">
						<div class="modal-header border-secondary">
							<h5 class="modal-title ">Verificar Referencia</h5>
							<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body text-start">
							<label class="form-label text-muted small">Por favor, ingrese los últimos 4 dígitos de la referencia de su Pago Móvil:</label>
							<input type="text" id="referencia" class="form-control text-center fs-4 fw-bold" maxlength="4" placeholder="0000" pattern="\d{4}">
						</div>
						<div class="modal-footer border-secondary">
							<button type="button" class="btn px-4 " onclick="verificarPago()">Verificar</button>
						</div>
					</div>
				</div>
			</div>
		</main>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="../publico/js/carrito.js"></script>
		<script src="../publico/js/inicio.js"></script>

		<script>
		
		</script>
	</body>
</html>