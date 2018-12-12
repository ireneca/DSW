<?php
session_start();
if(isset($_SESSION['usuario'])):
  require_once("../vistas/inc/header.php");
  echo "<section class='wrapper'>";
  require_once("../vistas/inc/navlateral.php");
  echo "<section id='content'>";
  require_once("../vistas/inc/navbar.php");
  ?>
  <h6 class="textoHome">El cine es la técnica y arte de proyectar fotogramas de forma rápida y sucesiva para crear la impresión de movimiento, mostrando algún vídeo.
  <br> Desde 1895 cuando se mostró públicamente la primera proyección y se vio el éxito inmediato que tuvo este invento hasta hoy que a su alrededor hemos creado una gran industria; vemos que el cine es algo que tanto le otorgamos premios o críticas, siempre que sea capaz de crear historias increíbles que la gente espere impaciente ver; por más que el tiempo desde esa primera proyección pase y la técnica que usamos para crear las películas cambie, el cine es algo que desde entonces tiene tanto éxito que no se puede evitar que se hable de él lo hagan bien o mal.</h6>
  <div class="imgHome">
    <img src="<?php echo SERVERURL; ?>/img/leboyagedanslalune.png">
    <img src="<?php echo SERVERURL; ?>/img/luna.gif">
  </div>
  <?php
  echo "</section>";
  echo "</section>";
  require_once("../vistas/inc/footer.php");
else:
  header("location: " . SERVERURL . "/usuarioControlador/login/");
endif;
 ?>
