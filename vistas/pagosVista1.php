<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagos</title>
  <link rel="stylesheet" href="../css/formularioPagos.css?v=9">
  <link rel="shortcut icon" href="../imagenes/LogoTCPCircle.png" type="image/x-icon">
</head>

<body>

  <!-- Contenedor del formulario -->
  <div class="contenedor">

    <!-- formulario para consultar ventas referente-->
    <form action="" class="formulario" id="formulario" name="formulario" method="POST">
      <h2 class="titulo">Autorizar Registro</h2>
      <div class="frmControl">
        Referente:
        <input type="text" name='referidopor' required>
      </div>
      <button type="submit" class="btn" name="consultarEstado">Verificar</button>
    </form>

    </form>
    <div class="linksInferiores">
      ¿Ya tienes cuenta?<br />
      <a href="../php/login.php">Iniciar Sesión</a><br />
      <a href="../index.html">Salir</a>
    </div>
  </div>

</body>

</html>