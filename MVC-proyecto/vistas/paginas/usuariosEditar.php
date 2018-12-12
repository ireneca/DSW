<?php
session_start();
if(isset($_SESSION['usuario'])):
  require_once("../vistas/inc/header.php");
  echo "<section class='wrapper'>";
  require_once("../vistas/inc/navlateral.php");
  echo "<section id='content'>";
  require_once("../vistas/inc/navbar.php");
  ?>
  <form action="<?php echo SERVERURL ?>/usuarioControlador/editar/<?php echo $datos['codigo']; ?>" method="POST">
    <div class="form-group">
      <label for="usuario">Usuario <sup>*</sup></label>
      <input type="text" class="form-control" id="usuario" value="<?php echo $datos['usuario']; ?>" name="usuario" required>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="password">Contraseña <sup>*</sup></label>
        <input type="password" class="form-control" id="password" value="<?php echo $datos['clave']; ?>" name="password" required>
      </div>
      <div class="form-group col-md-6">
        <label for="password2">Verificación contraseña <sup>*</sup></label>
        <input type="password" class="form-control" id="password2" value="<?php echo $datos['clave']; ?>" name="password2" required>
      </div>
    </div>
    <div class="form-group">
      <label for="email">Email <sup>*</sup></label>
      <input type="email" class="form-control" id="email" value="<?php echo $datos['email']; ?>" name="email" required>
    </div>
    <div class="form-group">
      <label for="privilegio">Privilegios <sup>*</sup></label>
      <select class="form-control" id="privilegio" name="privilegio">
        <option value="0" <?php $datos['privilegio']==0 ? 'selected="selected"' : ''; ?>>Visitante</option>
        <option value="1" <?php $datos['privilegio']==1 ? 'selected="selected"' : ''; ?>>Administrador</option>
      </select>
    </div>
    <input type="submit" class="btn btn-success" value="Editar">
  </form>
  <?php if($datos['error'] == 1) { ?>
  <div class="alert alert-danger" role="alert">
    <strong>Error: </strong> Verificacion de contraseña.
  </div>
  <?php
  }
  echo "</section>";
  echo "</section>";
  require_once("../vistas/inc/footer.php");
else:
  header("location: " . SERVERURL . "/usuarioControlador/login/");
endif;
 ?>
