<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL ?>/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo NOMBRE_SITIO ?></title>
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="navbar-brand">
            <?php echo NOMBRE_SITIO ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA_URL ?>">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA_URL ?>/paginas/agregar">Insertar</a>
          </li>
        </ul>
      </nav>
