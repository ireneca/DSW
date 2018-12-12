<?php
session_start();
if(isset($_SESSION['usuario'])):
  require_once("../vistas/inc/header.php");
  echo "<section class='wrapper'>";
  require_once("../vistas/inc/navlateral.php");
  echo "<section id='content'>";
  require_once("../vistas/inc/navbar.php");
  ?>
  <form action="<?php echo SERVERURL ?>/usuarioControlador/borrar/<?php echo $datos['codigo']; ?>" method="POST">
    <div class="form-group">
      Confirma el borrado de la cuenta <?php echo $datos['usuario'] ?>
    </div>
    <input type="submit" class="btn btn-danger" value="Borrar">
    <a href="<?php echo SERVERURL ?>/usuarioControlador/index/" class="btn btn-secondary">Cancelar</a>
  </form>
  <?php
  echo "</section>";
  echo "</section>";
  require_once("../vistas/inc/footer.php");
else:
  header("location: " . SERVERURL . "/usuarioControlador/login/");
endif;
 ?>
