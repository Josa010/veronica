<?php
include 'funciones.php';
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

  $conexion = new mysqli('localhost', 'root', '', 'alpuyeca_fc');
  if ($conexion->connect_error) {
    die($errores[] = "No se pudo conectar la bd" . $conexion->connect_error);
  }

  $sql = "SELECT * FROM jugadores where id='$id'";
  $result = $conexion->query($sql);
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="cssBoots/bootstrap.css">
  <link rel="stylesheet" href="estilo.css">
  <title>Formulario</title>
  <?php barramenu(); ?>
</head>

<body>
  <h1 class="titulos">Modificar Jugadores</h1>
  <br>
  <div class="forme">
    <form action="modificarJugadores.php" method="POST">
      <input class="form-control" type="hidden" name="check" value="2">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            ID</div>
          <div class="col-md-4">
            <input class="form-control" type="text" name="id" value="<?php echo $id; ?>" required placeholder="Identificador numerico"></div>
          <div class="col-md-6">
            <input class="btn btn-block btn-lg reg" type="submit" value="Cargar datos"></div>
        </div>
      </div>
  </div>
  </form>
  <br>
  <?php if ($check == 3) { ?>
    <div class="forme">
      <form action="modificar.php" method="POST">
        <input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              Nombre</div>
            <div class="col-md-4">
              <input class="form-control" type="text" name="nombre" required value="<?php echo $nombre ?>" placeholder="Nombre del jugador"></div>
            <div class="col-md-2">
              Segundo nombre:</div>
            <div class="col-md-4">
              <input class="form-control" type="text" name="segundoNombre" value="<?php echo $segundoNombre ?>" placeholder="Segundo nombre (opcional)"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              Apellido Paterno:</div>
            <div class="col-md-4">
              <input class="form-control" type="text" name="apellidoPaterno" required value="<?php echo $apellidoPaterno ?>" placeholder="Apellido paterno"></div>
            <div class="col-md-2">
              Apellido Materno:</div>
            <div class="col-md-4">
              <input class="form-control" type="text" name="apellidoMaterno" required value="<?php echo $apellidoMaterno ?>" placeholder="Apellido materno"></div>
          </div>
        </div>
    </div>
    <br>
    <div class="container">
      <div class="row">
        <input class="btn btn-block btn-lg reg" type="submit" value="Modificar">
        <br>
      </div>
      <br>
      </form>
    <?php }  ?>

    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="jquery/popper.min.js"></script>
    <script src="jsBoots/bootstrap.min.js"></script>
</body>

</html>