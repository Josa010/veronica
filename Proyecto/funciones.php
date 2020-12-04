<!-- 
  Funciones que usaremos en paginas web
  Autor:Cristian Rodiguez Rodriguez 5-G   
 -->
<?php
function conexion()
{
  $conexion = mysqli_connect('localhost', 'root', '', 'alpuyeca_fc') or die('Error en la conexion');
  return $conexion;
}
function conexionBD(){
  if ($conexion = @mysqli_connect('localhost', 'root', '')) {
    if (!mysqli_select_db($conexion, 'alpuyeca_fc')) {
      mysqli_close($conexion);
      $error['noDB'] = "Error 1002: No se pudo conectar con la base de datos.";
    }
  } else {
    $errores['noCxn'] = "Error: 1001. No fue posible realizar la conexi&oacute;n";
  }

  if (empty($errores)) {
    return $conexion;
  } else {
    return false;
  }
}
function barramenu()
{
?>
  <nav class="navbar navbar-expand-lg navbar-light mb-5">

    <a class="navbar-brand text-white" href="index.html">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-white" href="registroJugadores.php">Registro de jugadores <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="consultaJugadores.php">Consultar jugadores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="eliminarJugadores.php">eliminar jugadores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="modificarJugadores.php">Modificar jugadores</a>
        </li>

      </ul>
    </div>

  </nav>
<?php
}


?>