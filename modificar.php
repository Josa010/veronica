<?php

/*-------- Incluimos las funciones --------*/
include 'funciones.php';

/*-------- Llenamos variables --------*/
if (empty($_POST['id'])) {
    $errores[] = "Tal vez no introdujo un id";
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];

if (!empty($_POST['segundoNombre'])) {

    $segundoNombre = $_POST['segundoNombre'];
    unset($_POST['segundoNombre']);

} else {
    $segundoNombre = NULL;
}

$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];

/*-------- Nos conectamos a la base --------*/
$con = conexion();

/*-------- Modificamos los datos en la base --------*/
$sql = "UPDATE `jugadores` SET `nombre` = '$nombre', `segundonombre` = '$segundoNombre', `apellidoP` = '$apellidoPaterno', `apellidoM` = '$apellidoMaterno' WHERE `jugadores`.`id` = $id;";
$resultado = mysqli_query($con, $sql) or die($errores[] = "Tal vez no introdujo un id");
mysqli_close($con);



?>
<!DOCTYPE html>
<html>

<head>
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Links css de bootstrap y normales -->
    <link rel="stylesheet" href="cssBoots/bootstrap.css">
    <link rel="stylesheet" href="estilo.css">

    <title>Exito</title>
</head>

<!-- Mostramos al barra de menu -->
<?php barramenu(); ?>


<body>

    <!-- Mostramos errores -->
    <?php
        if (!empty($errores)) {
            foreach ($errores as $error) {
                echo "<div class='alert alert-danger w-25 mx-auto' role='alert'>
                    $error
                </div>";
            }

        //Mostramos mensaje de exito
        } else {

            echo "<div class='alert alert-success w-25 mx-auto' role='alert'>
                Modificado con exito
            </div>";

        }
    ?>
    
    <div class="mx-auto text-center">
        <a href="modificarJugadores.php" class="btn btn-primary btn-block w-25 mx-auto stretched-link">Volver</a>
    </div>
    
    <!-- Links de javascript de bootstrap y jquery -->
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="jquery/popper.min.js"></script>
    <script src="jsBoots/bootstrap.min.js"></script>
</body>

</html>