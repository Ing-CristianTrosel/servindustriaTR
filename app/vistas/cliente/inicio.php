<?php require_once 'app/controlador/Controlador_cliente/ControladorCliente.php';?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Servindustria TR - Cliente</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../publico/css/inicio_cliente.css">
		<style>

		</style>
	</head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
			<div class="container-fluid">
				<a class="navbar-brand nav-brand" href="#">
					<span class="brand-logo" aria-hidden="true">
						<img class="action-image" src="../publico/img/logo.png" alt="">
					</span>
					<span class="brand-text fw-bold">Servindustria TR</span>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Alternar navegación">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="mainNav">
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="inicio">Inicio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Trabajos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Pagos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Perfil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="">
								<span class="action-carrito">
									<img class="action-image" src="../publico/img/carrito_blanco.png" alt="">
								</span>
							</a>
						</li>
						<a class="btn btn-salir" href="salir">Salir</a>
					</ul>
				</div>
			</div>
		</nav>

		<main class="container mt-4">
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
				<a href="#" class="action-card">
					<div class="action-icon">
						<!-- Coin / pagos icon -->
						<img class="action-image" src="../publico/img/dinero_negro.png" alt="">
					</div>
					<div class="action-label">Ver pagos</div>
				</a>
				<a href="#" class="action-card">
					<div class="action-icon">
						<!-- List icon -->
						<img class="action-image" src="../publico/img/lista_negro.png" alt="">
					</div>
					<div class="action-label">Ver Solicitudes</div>
				</a>
				<a href="#" class="action-card">
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
										<th>Cantidad</th>
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
										<td>25</td>
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
										<td>25</td>
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
										<td>5</td>
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
										<td>25</td>
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
                        <?php $cliente->MostrarOpcionesDireccion();?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tipo_servicio">Tipo de Servicio</label>
                    <select class="form-select" id="tipo_servicio" name="tipo_servicio" required>
                        <option value="electricidad" selected>Electricidad</option>
                        <option value="fontaneria">Fontanería</option>
                        <option value="reparacion">Reparación General</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tipo_area">Tipo de Area</label>
                    <select class="form-select" id="tipo_area" name="tipo_area" required>
                        <option value="montaje_alumbrado" selected>Montaje de Alumbrado</option>
                        <option value="instalacion_puntos">Instalación de Puntos</option>
                        <option value="cableado">Cableado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha_visita">Fecha de visita</label>
                    <input type="date" class="form-control" id="fecha_visita" name="fecha_visita" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-textarea" id="descripcion" name="descripcion" required>Tengo poca luz en mi tienda, quiero cambiar alrededor de 25 lamparas</textarea>
                </div>

                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="../publico/js/inicio.js"></script>
	</body>
</html>
