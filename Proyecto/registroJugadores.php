<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="cssBoots/bootstrap.css">
  <link rel="stylesheet" href="estilo.css">
  <title>Formulario</title>
  <?php include 'funciones.php';
  barramenu(); ?>
</head>

<body>
  <h1 class="titulos">Registro Jugadores</h1>
  <br>
  <div class="forme">
    <form action="insertar.php" method="POST">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            Nombre</div>
          <div class="col-md-4">
            <input class="form-control" type="text" name="nombre" required placeholder="Nombre del jugador"></div>
          <div class="col-md-2">
            Segundo nombre:</div>
          <div class="col-md-4">
            <input class="form-control" type="text" name="segundoNombre" placeholder="Segundo nombre (opcional)"></div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            Apellido Paterno:</div>
          <div class="col-md-4">
            <input class="form-control" type="text" name="apellidoPaterno" placeholder="Apellido paterno"></div>
          <div class="col-md-2">
            Apellido Materno:</div>
          <div class="col-md-4">
            <input class="form-control" type="text" name="apellidoMaterno" placeholder="Apellido materno"></div>
        </div>
      </div>
  </div>
  <br>
  <div class="container">
    <div class="row">
      <input class="btn btn-block btn-lg reg" type="submit" value="Registrar">
      <br>
    </div>
    <br>
    </form>

    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="jquery/popper.min.js"></script>
    <script src="jsBoots/bootstrap.min.js"></script>
</body>

</html>