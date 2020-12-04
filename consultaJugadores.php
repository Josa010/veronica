<?php
//Incluimos las funciones
include 'funciones.php';

//Codigo de consulta de la base de datos
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
    <!-- metadatas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Estilos -->
    <link rel="stylesheet" href="cssBoots/bootstrap.css">
    <link rel="stylesheet" href="estilo.css">

    <title>Consulta de Jugadores</title>
</head>

<!-- Incluimos la barra de menú -->
<?php barramenu(); ?>

<body>

    <h1 class="titulos mb-5">Consulta de jugadores</h1>

    <!-- Mostrando los datos dentro de una tabla -->
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

                    foreach ($arregloConsulta as $datoConsulta) {
                ?>

                        <tr>
                            <td class="">
                                <?php echo  $datoConsulta['id']; ?>
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

    <!-- Links de bootstrap de javascrip y jquery -->
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="jquery/popper.min.js"></script>
    <script src="jsBoots/bootstrap.min.js"></script>

</body>

</html>