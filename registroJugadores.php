
<!-- Incluimos las funciones -->
<?php include 'funciones.php';?>

<!DOCTYPE html>

<html lang="es">

<head>
	<!-- metadatos -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Links css de bootstrap y normales -->
	<link rel="stylesheet" href="cssBoots/bootstrap.css">
	<link rel="stylesheet" href="estilo.css">

	<title>Formulario</title>
	
</head>

<body>
	<!-- Insertamos la barra de menu -->
	<?php barramenu(); ?>	

	<h1 class="titulos mb-5">Registro Jugadores</h1>

	<!-- Formulario para registrar jugadores -->
	<div class="forme p-2 pb-4 mb-4">
		<form action="insertar.php" method="POST">

			<div class="container p-4">
				<div class="row">
					<div class="col-md-2">Nombre:</div>
					<div class="col-md-4">
						<input class="form-control" type="text" name="nombre" required placeholder="Nombre del jugador">
					</div>
					<div class="col-md-2">Segundo nombre:</div>
					<div class="col-md-4">
						<input class="form-control" type="text" name="segundoNombre" placeholder="Segundo nombre (opcional)">
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-2">Apellido Paterno:</div>
					<div class="col-md-4">
						<input class="form-control" type="text" name="apellidoPaterno" placeholder="Apellido paterno">
					</div>
					<div class="col-md-2">Apellido Materno:</div>
					<div class="col-md-4">
						<input class="form-control" type="text" name="apellidoMaterno" placeholder="Apellido materno">
					</div>
				</div>
			</div>
	</div>

	<div class="container">
		<div class="row">
			<input class="btn btn-block btn-lg reg" type="submit" value="Registrar">
		</div>
		</form>
	</div>

	<!-- links de javascript de bootstrap y jquery -->
	<script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="jquery/popper.min.js"></script>
	<script src="jsBoots/bootstrap.min.js"></script>
</body>

</html>