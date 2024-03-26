<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1, maximum-scale=1,height=device-height, target-densitydpi=device-dpi">
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
  <title>Registrate</title>
  <link rel="stylesheet" href="../css/formularioRegistrate.css?v=6">
  <link rel="shortcut icon" href="../imagenes/LogoTCPCircle.png" type="image/x-icon">
  <!-- <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> -->
</head>

<body>
  <div class="contenedor">
    <form action=" " method="POST" class="formulario" name="login">
      <h2 class="titulo">Registro de Usuarios</h2>
      <div class="frmControl">
        Nombre Completo:
        <input type="text" name='nombre' required>
      </div>
      <div class="frmControl">
        Documento de Identidad:
        <input type="text" name='cedula' required>
      </div>
      <div class="frmControl">
        Teléfono:
        <input type="text" name='telefono' required>
      </div>
      <div class="frmControl">
        Email:
        <input type="email" name='usuario' required>
      </div>
      <div class="frmControl">
        Contraseña:
        <input type="password" name='pass' required>
      </div>
      <div class="frmControl">
        Referido Por:
        <input type="text" name='referidopor' required>
      </div>
      <button type="submit" class="btn" name="enviar">Enviar</button>

    </form>

    <div class="linksInferiores">
      ¿Ya tienes cuenta?<br />
      <a href="../php/login.php">Iniciar Sesión</a><br />
      <a href="../index.html">Salir</a>
    </div>
  </div>
</body>

</html>