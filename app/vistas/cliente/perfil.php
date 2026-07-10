<?php require_once 'app/controlador/Controlador_cliente/ControladorCliente.php';?>
<!doctype html>
<html lang="es">
	<head>
 	    <link class="fluid" rel="icon" type="image/png" href="../publico/img/logo.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Servindustria TR - Cliente</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../publico/css/inicio_cliente.css">
		
		<style>
			.profile-title {
				font-size: 1.5rem; 
				border-bottom: 1px solid #ffcc59; 
				padding-bottom: 8px;
			}
		</style>
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
			<section class="stats-panel mb-4">
				<div class="avatar-wrap">
					<div class="avatar">
						<img class="action-image" src="../publico/img/usuario.png" alt="">
					</div>
					<div>
						<div class="welcome-text">Bienvenido</div>
						<div class="welcome-name"><?php $cliente->nombre();?></div>
					</div>
				</div>
			</section>

			<section class="stats-panel d-flex flex-column mb-4 p-4">
				<div class="welcome-text profile-title mb-3">
					Datos Personales
				</div>
				<form action="perfil" method="POST" class="w-100">
					<div class="row g-3">
						<div class="col-md-6">
							<label for="nombre" class="form-label">Primer Nombre</label>
							<input type="text" class="form-control" id="nombre_1" name="nombre1" value="<?php echo $cliente->primerNombre; ?>" required>
						</div>
						<div class="col-md-6">
							<label for="apellido" class="form-label">Segundo Nombre</label>
							<input type="text" class="form-control" id="nombre_1" name="nombre2" value="<?php echo $cliente->segundoNombre; ?>" required>
						</div>
						<div class="col-md-6">
							<label for="telefono" class="form-label ">Primer Apellido</label>
							<input type="text" class="form-control" id="nombre_1" name="apellido1" value="<?php echo $cliente->primerApellido; ?>" required>
						</div>
						<div class="col-md-6">
							<label for="correo" class="form-label">Segundo Apellido</label>
							<input type="text" class="form-control" id="nombre_1" name="apellido2" value="<?php echo $cliente->segundoApellido; ?>" required>
						</div>
					</div>
					<div class="mt-4 d-flex justify-content-end">
						<button type="submit" class="btn  px-4">Guardar</button>
					</div>
				</form>
			</section>

			<section class="stats-panel d-flex flex-column p-4">
				<div class="welcome-text profile-title mb-3">
					Seguridad
				</div>
				<form action="cambiar_password" method="POST" class="w-100">
					<div class="row g-3 align-items-end">
						<div class="col-md-4">
							<label for="nueva_password" class="form-label">Nueva Contraseña</label>
							<input type="password" class="form-control" id="nueva_password" name="nueva_password" placeholder="Mínimo 8 caracteres" minlength="8" required>
						</div>
						<div class="col-md-4">
							<label for="confirmar_password" class="form-label">Confirmar Contraseña</label>
							<input type="password" class="form-control" id="confirmar_password" name="confirmar_password" placeholder="Repite tu contraseña" minlength="8" required>
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn w-50">Cambiar Contraseña</button>
						</div>
					</div>
				</form>
			</section>
					
		</main>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="../publico/js/inicio.js"></script>
	</body>
</html>