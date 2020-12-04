<?php
/*-------- Incluimos las funciones --------*/
include 'funciones.php';

/*-------- Confirmamos que las variables existan --------*/
$nombre = $_POST['nombre'];
if (!empty($_POST['segundoNombre'])) {

    $segundoNombre = $_POST['segundoNombre'];
    unset($_POST['segundoNombre']);
} else {
    $segundoNombre = NULL;
}
$apellidoPaterno = $_POST['apellidoPaterno'];

$apellidoMaterno = $_POST['apellidoMaterno'];

/*-------- Hacemos la conexion --------*/
$con = conexion();

/*-------- Hacemos el insert --------*/
$sql = "INSERT INTO `jugadores`(`id`, `nombre`, `segundonombre`, `apellidoP`, `apellidoM`) VALUES ('null','$nombre', '$segundoNombre', '$apellidoPaterno', '$apellidoMaterno')";
$resultado = mysqli_query($con, $sql) or die($errores[]="Error en algun dato");
mysqli_close($con);



?>
<!DOCTYPE html>
<html>

<head>
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Links css de bootstrap y normal -->
    <link rel="stylesheet" href="cssBoots/bootstrap.css">
    <link rel="stylesheet" href="estilo.css">

    <title>Exito</title>
</head>

<!-- Link de la funcion de la barra de menu -->
<?php barramenu(); ?>

<body>

<!-- Mostramos errores -->
<?php
    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "<div class='alert alert-danger' role='alert'>
			$error
		  </div>";
        
        }

    // Mostramos el exito de la ejecucion
    }else{
            echo "<div class='alert alert-success w-25 mx-auto' role='alert'>
            Registrado con exito
              </div>";
        }
    ?>

    <div class="mx-auto text-center">
        <a href="registroJugadores.php" class="btn btn-primary btn-block w-25 mx-auto stretched-link">Volver</a>
    </div>
    
    
    <!-- Links de javascript y jquery -->
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="jquery/popper.min.js"></script>
    <script src="jsBoots/bootstrap.min.js"></script>
</body>

</html>