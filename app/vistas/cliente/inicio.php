<?php require_once 'app/controlador/Controlador_cliente/ControladorCliente.php';?>
<!doctype html>
<html lang="es">
	<head>
    	<link rel="icon" type="image/png" href="../publico/img/logo.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Servindustria TR - Cliente</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
				<a class="sidebar-link active sidebar-link-cart" href="inicio">
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
				<a class="sidebar-link sidebar-link-cart" href="perfil">
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
		
			<section class="action-grid">
				<a href="" class="action-card" id="open-form-btn">
					<div class="action-icon">
						<img src="../publico/img/papeleo.png" alt="Papeleo" class="action-image">
					</div>
					<div class="action-label" >Solicitar Servicio</div>
				</a>
				<a href="pagos" class="action-card">
					<div class="action-icon">
						<!-- Coin / pagos icon -->
						<img class="action-image" src="../publico/img/dinero_negro.png" alt="">
					</div>
					<div class="action-label">Ver pagos</div>
				</a>
				<a href="solicitudes" class="action-card">
					<div class="action-icon">
						<!-- List icon -->
						<img class="action-image" src="../publico/img/lista_negro.png" alt="">
					</div>
					<div class="action-label">Ver Solicitudes</div>
				</a>
				<a href="trabajos" class="action-card">
					<div class="action-icon">
						<!-- Tool / trabajos icon -->
						<img src="../publico/img/plano_negro.png" alt="" class="action-image">
					</div>
					<div class="action-label">Ver Trabajos</div>
				</a>
			</section>
            <div class="content-card mt-4">
					<div class="card-header px-4 py-3">
						<h2>Tienda</h2>
					</div>
					<div class="table-wrapper">
						<div class="table-responsive">
							<table class="table align-middle mb-0">
								<thead>
									<tr>
										<th>Producto</th>
										<th>Precio</th>
										<th>Área</th>
										<th>Foto</th>
									</tr>
								</thead>
								<tbody>
									<tr class="clickable-row" tabindex="0" role="button"
										data-product="Tomacorrientes 2x4"
										data-price="5"
										data-area="Electricidad"
										data-quantity="25">
										<td>Tomacorrientes 2x4</td>
										<td>$5</td>
										<td>Electricidad</td>
										<td>Foto</td>
									</tr>
									<tr class="clickable-row" tabindex="0" role="button"
										data-product="Interruptores 2x3"
										data-price="5"
										data-area="Electricidad"
										data-quantity="25">
										<td>Interruptores 2x3</td>
										<td>$5</td>
										<td>Electricidad</td>
										<td>Foto</td>
									</tr>
									<tr class="clickable-row" tabindex="0" role="button"
										data-product="Rollo de Cable calibre 14 TWS de 50mts color Negro"
										data-price="25"
										data-area="Electricidad"
										data-quantity="5">
										<td>Cable de cobre calibre 14 TWS color Negro</td>
										<td>$25</td>
										<td>Electricidad</td>
										
										<td>Foto</td>
									</tr>
									<tr class="clickable-row" tabindex="0" role="button"
										data-product="Tomacorrientes 2x4"
										data-price="5"
										data-area="Electricidad"
										data-quantity="25">
										<td>Tomacorrientes 2x4</td>
										<td>$5</td>
										<td>Electricidad</td>
										<td>Foto</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
		</main>

		<div class="modal fade" id="modalCompra" tabindex="-1" aria-labelledby="modalCompraLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalCompraLabel">Formulario de compra</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
					</div>
					<div class="modal-body">
						<form id="formCompra">
							<div class="mb-3">
								<label class="form-label">Producto</label>
								<label type="text" class="form-control" id="productoCompra" readonly></label>
							</div>
							<div class="mb-3">
								<label class="form-label">Precio unitario</label>
								<label type="text" class="form-control" id="precioCompra" readonly></label>
							</div>
							<div class="mb-3">
								<label class="form-label">Área</label>
								<label type="text" class="form-control" id="areaCompra" readonly></label>
							</div>
							<div class="mb-3">
								<label class="form-label">Cantidad</label>
								<input type="number" class="form-control" id="cantidadCompra" min="1" value="1">
							</div>
							<div class="mb-3">
								<label class="form-label">Total</label>
								<label type="text" class="form-control" id="totalCompra" readonly></label>
							</div>
							
							<button type="submit" class="btn btn-warning w-100">Agregar al carrito</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	<div class="form-overlay" id="service-form-overlay">
        <div class="form-container">
            <button class="close-form" id="close-form-btn">&times;</button>
            
            <h1>Solicitar Servicio</h1>

            <form action="inicio" method="post" id="actual-service-form">
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <select class="form-select" id="direccion" name="direccion" required>
						<option value="" selected disabled>Seleccione una direccion</option>
                        <?php $cliente->MostrarOpcionesDireccion();?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tipo_servicio">Tipo de Servicio</label>
                    <select class="form-select" id="tipo_servicio" name="tipo_servicio" required>
						<option value="" selected disabled>Seleccione un servicio</option>
                        <option value="electricidad" selected>Electricidad</option>
                        <option value="fontaneria">Fontanería</option>
                        <option value="reparacion">Reparación General</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tipo_area">Tipo de Area</label>
                    <select class="form-select" id="tipo_area" name="tipo_area" required>
						<option value="" selected disabled>Seleccione un area</option>
                        <option value="montaje_alumbrado" selected>Montaje de Alumbrado</option>
                        <option value="instalacion_puntos">Instalación de Puntos</option>
                        <option value="cableado">Cableado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha_visita">Fecha de visita</label>
                    <input type="datetime-local" class="form-control" id="fecha_visita" name="fecha_visita" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-textarea" id="descripcion" name="descripcion" placeholder="Colocar una pequeña descripcion de su problema" required></textarea>
                </div>

                <button type="submit" name="boton-servicio" value="servicio">Enviar</button>
            </form>
        </div>
    </div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="../publico/js/inicio.js"></script>
	</body>
</html>
