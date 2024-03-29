<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1, maximum-scale=1,height=device-height, target-densitydpi=device-dpi">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="../css/estilosLogin.css?v=57">
  <link rel="shortcut icon" href="../imagenes/LogoTCPCircle.png" type="image/x-icon">

</head>

<body>

  <div class="contenedor">
    <h1 class="titulo">Iniciar Sesión</h1>
    <hr class="border">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">

      <div class="form-group">
        <i class="icono izquierda fa fa-user"></i>
        <input type="text" name="usuario" class="usuario" placeholder="Usuario">
      </div>

      <div class="form-group">
        <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password_btn" placeholder="Contraseña">
        <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
      </div>

      <?php if (!empty($errores)) :  ?>
        <div class="error">
          <ul>
            <?php echo $errores; ?>
          </ul>
        </div>
      <?php endif; ?>

    </form>

    <p class="texto-registrate">
      <a href="../index.html">Salir</a>
    </p>

  </div>
</body>

</html>