<?php
//Incluimos las funciones
include('funciones.php');

//Codigo para ver si las variables por post estan vacias o no
if (!empty($_POST['id'])) {

	$id = $_POST['id'];
    unset($_POST['id']);
    
} else {
	$id = NULL;
}

if (!empty($_POST['siguientePaso'])) {

	$siguientePaso = $_POST['siguientePaso'];
    unset($_POST['siguientePaso']);
    
} else {
	$siguientePaso = NULL;
}

// Este paso es cuando se enviael formulario
if ($siguientePaso == 2) { 

	$conexion = conexionBD();

	if (empty($id)) {
		$errores[] = "Debes escribir el id del jugador.";
	}

    //Comprobamos que el id exista
	if (!empty($id)) {

		$sentenciaSql = "SELECT id FROM jugadores WHERE id = '$id' LIMIT 1";
		$resultadoConsulta = mysqli_query($conexion, $sentenciaSql);
		$dato = mysqli_fetch_assoc($resultadoConsulta);
		if (empty($dato)) {
			$errores[] = 'No existe ningun jugador con ese id';
		}
	} 

    //Borramos el jugador con ese id de la base de datos
	if (empty($errores)) {

		$sentenciaSql = "DELETE FROM jugadores WHERE id = '$id'";

		if (mysqli_query($conexion, $sentenciaSql)) {
			$siguientePaso = 3;
		} else {
			echo "ERROR AL ELIMINAR JUGADOR";
		}
	} else {
		$siguientePaso = NULL;
	}
} 


?>

<!DOCTYPE html>
<html lang="es">
<head>
    
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Eliminar jugadores</title>

    <!-- Estilos css y bootstrap -->
    <link rel="stylesheet" href="cssBoots/bootstrap.css">
    <link rel="stylesheet" href="estilo.css">
</head>


<body class="mb-5">
    
    <!-- Incluimos la barra de menú -->
    <?php barramenu(); ?>

    <h1 class="titulos pb-2 mb-5">Eliminar jugadores</h1>

    <!-- Visualizamos el formulario -->
    <?php if (empty($siguientePaso)) { ?>

    <form action="eliminarJugadores.php" method="POST">
        
        <input type="hidden" name="siguientePaso" value="2">
        
        <div class="forme container bg-light p-2 text-center rounded">
            <div class="row">
                <div class="col-1 m-auto text-right">
                    <span class="id-texto">ID:</span>
                </div>
                <div class="col-5 m-auto">
                    <input type="text" class="form-control" name="id" required placeholder="Id del jugador">
                </div>
                <div class="col-6">
                    <input class="btn btn-danger btn-block btn-lg " type="submit" value="Eliminar">
                </div>
            </div>
        </div>

    </form>

    <!-- VIsualizamos errores -->
    <?php
        if (!empty($errores)) {
            foreach ($errores as $error) { // recorremos el arreglo



                echo "<div class='alert alert-danger alert-dismissible fade show mt-5' role='alert'>
                        *   $error 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
                
                
            }
	    }
	?>

    <?php } ?>
    
    <!-- Visualizamos el texto de exito -->
    <?php 
    
    if (!empty($siguientePaso)) {   ?>

        <div class="container text-white text-center p-2 rounded exit">
            <h3 align="center">Se ha borrado el jugador de forma exitosa!</h3>
            <a href="eliminarJugadores.php" target="_self" class="btn btn-sm text-white w-25 p-2" style="background-image: linear-gradient(#240480, #412a80);">Regresar</a>
        </div>

        
    <?php
    } else {
        $siguientePaso = NULL;
    }
    ?>

<!-- Links de javascript de bootstrap y jquery -->
<script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="jquery/popper.min.js"></script>
<script src="jsBoots/bootstrap.min.js"></script>

</body>
</html>