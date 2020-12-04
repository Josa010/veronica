<?php
include 'funciones.php';

$nombre = $_POST['nombre'];
if (!empty($_POST['segundoNombre'])) {

    $segundoNombre = $_POST['segundoNombre'];
    unset($_POST['segundoNombre']);
} else {
    $segundoNombre = NULL;
}
$apellidoPaterno = $_POST['apellidoPaterno'];

$apellidoMaterno = $_POST['apellidoMaterno'];


$con = conexion();
$sql = "INSERT INTO `jugadores`(`id`, `nombre`, `segundonombre`, `apellidoP`, `apellidoM`) VALUES ('null','$nombre', '$segundoNombre', '$apellidoPaterno', '$apellidoMaterno')";
$resultado = mysqli_query($con, $sql) or die($errores[]="Error en algun dato");
mysqli_close($con);



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="cssBoots/bootstrap.css">
    <link rel="stylesheet" href="estilo.css">

    <title>Exito</title>
</head>
<?php barramenu(); ?>

<body>
<?php
    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "<div class='alert alert-danger' role='alert'>
			$error
		  </div>";
        
        }
    }else{
            echo "<div class='alert alert-success' role='alert'>
            Registrado con exito
              </div>";
        }
    ?>
    <a href="registroJugadores.php" class="btn btn-primary stretched-link">Volver</a>
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="jquery/popper.min.js"></script>
    <script src="jsBoots/bootstrap.min.js"></script>
</body>

</html>