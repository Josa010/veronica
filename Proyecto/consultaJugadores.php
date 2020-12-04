<?php

include 'funciones.php';
$conexion = conexionBD();
$sentenciaSQL = "select * from jugadores";
if ($resultado = mysqli_query($conexion, $sentenciaSQL)) {
    while ($consulta = mysqli_fetch_array($resultado)) {
        $arregloConsulta[] = $consulta;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="cssBoots/bootstrap.css">
    <link rel="stylesheet" href="estilo.css">
    <title>Consulta de Jugadores</title>
</head>
<?php barramenu(); ?>

<body>
<style>
.tbl{
    text-align: center;
	background-color: red;
    text-shadow: 0px 0px 5px black;
    color:white;
	background-image: linear-gradient(darkblue,rgb(97, 138, 160));
	box-shadow: 20px 20px 25px black , inset 0 0 20px rgb(0, 0, 0);
}
</style>


    <h1 class="titulos">Consulta de jugadores</h1>
    <br>
    <div class="container">
        <table class="table table-bordered tbl">
            <thead class="thead forme">
                <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                </tr>
            </thead>

            <tbody>

                <?php if (!empty($arregloConsulta)) {
                    $i = 0;

                    foreach ($arregloConsulta as $datoConsulta) {
                        $i++; ?>

                        <tr>
                            <td class="">
                                <?php echo  $i; ?>
                            </td>
                            <td>
                                <?php echo  $datoConsulta['nombre'] . ' ' . $datoConsulta['segundonombre']; ?>
                            </td>
                            <td>
                                <?php echo  $datoConsulta['apellidoP']; ?>
                            </td>
                            <td>
                                <?php echo  $datoConsulta['apellidoM']; ?>
                            </td>
                        </tr>

                <?php   }
                } ?>

            </tbody>
        </table>
    </div>

    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="jquery/popper.min.js"></script>
    <script src="jsBoots/bootstrap.min.js"></script>
</body>

</html>