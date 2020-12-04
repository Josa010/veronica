<?php

/*-------- Agregamos las funciones --------*/
include 'funciones.php';

/*-------- Comprobamos que las variables no esten vacias --------*/
if (!empty($_POST['id'])) {
	
	$id = $_POST['id'];
	unset($_POST['id']);

} else {
	$id = null;
}

if (!empty($_POST['check'])) {

	$check = $_POST['check'];
	unset($_POST['check']);

} else {
	$check = null;
}

$nombre = null;
$segundoNombre = null;
$apellidoPaterno = null;
$apellidoMaterno = null;



if ($check == 2) {

	/*-------- nos conectamos a la base --------*/
	$conexion = new mysqli('localhost', 'root', '', 'alpuyeca_fc');

	if ($conexion->connect_error) {
		die($errores[] = "No se pudo conectar la bd" . $conexion->connect_error);
	}

	/*-------- Verificamos que exista alguien con ese id --------*/
	$sql = "SELECT * FROM jugadores where id='$id'";
	$result = $conexion->query($sql);

	if(empty($result)){
		$errores[]= "No existe ningun jugador con ese ID.";
	}

	/*-------- guardamos los datos para modificar --------*/
	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$nombre = $row['nombre'];
			$segundoNombre = $row['segundonombre'];
			$apellidoPaterno = $row['apellidoP'];
			$apellidoMaterno = $row['apellidoM'];
			$check = 3;
		}

	} else {
		$errores[] = "El id no existe";
	}

	$conexion->close();
}

?>

<!DOCTYPE html>

<html lang="es">

<head>
	<!-- metadatos -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Links de css de bootstrap y normales -->
	<link rel="stylesheet" href="cssBoots/bootstrap.css">
	<link rel="stylesheet" href="estilo.css">

	<title>Modificar jugadores</title>
</head>

<body>

	<!-- Insertamos la barra de menu -->
	<?php barramenu(); ?>

	<h1 class="titulos mb-5">Modificar Jugadores</h1>

	<!-- Formulario para buscar el id a modificar -->
	<div class="forme mb-4">
		<form action="modificarJugadores.php" method="POST">
			<input class="form-control" type="hidden" name="check" value="2">
			
			<div class="container p-2">
				<div class="row">
					<div class="col-md-1 text-center my-auto">ID:</div>
					<div class="col-md-5 my-auto">
						<input class="form-control" type="text" name="id" value="<?php echo $id; ?>" required placeholder="Identificador numerico">
					</div>
					<div class="col-md-6">
						<input class="btn btn-block btn-lg reg" type="submit" value="Cargar datos">
					</div>
				</div>
			</div>
		</form>
	</div>

	<!-- Mostramos la informacion del id ingresado y la posibilidad de modificarlos -->
	<?php if ($check == 3) { ?>

		<div class="forme mb-4 pb-3">
			<form action="modificar.php" method="POST">
				<input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>">

				<div class="container py-4">
					<div class="row">
						<div class="col-md-2">Nombre:</div>
						<div class="col-md-4">
							<input class="form-control" type="text" name="nombre" required value="<?php echo $nombre ?>" placeholder="Nombre del jugador">
						</div>
						<div class="col-md-2">Segundo nombre:</div>
						<div class="col-md-4">
							<input class="form-control" type="text" name="segundoNombre" value="<?php echo $segundoNombre ?>" placeholder="Segundo nombre (opcional)">
						</div>
					</div>
				</div>

				<div class="container">
					<div class="row">
						<div class="col-md-2">Apellido Paterno:</div>
						<div class="col-md-4">
							<input class="form-control" type="text" name="apellidoPaterno" required value="<?php echo $apellidoPaterno ?>" placeholder="Apellido paterno">
						</div>
						<div class="col-md-2">Apellido Materno:</div>
						<div class="col-md-4">
							<input class="form-control" type="text" name="apellidoMaterno" required value="<?php echo $apellidoMaterno ?>" placeholder="Apellido materno">
						</div>
					</div>
				</div>
		</div>

		<div class="container">
			<div class="row">
				<input class="btn btn-block btn-lg reg" type="submit" value="Modificar">
			</div>
			</form>
		</div>

		<?php }  ?>

		<!-- Mostramos los errores -->
		<?php
			if (!empty($errores)) {
			foreach ($errores as $error) { // recorremos el arreglo

				echo "<div class='alert alert-danger alert-dismissible fade show block w-25 mx-auto' role='alert'>
						*   $error 
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>";
				}
			}
    	?>

		<!-- Links de javascript y jquery -->
		<script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="jquery/popper.min.js"></script>
		<script src="jsBoots/bootstrap.min.js"></script>
</body>

</html>