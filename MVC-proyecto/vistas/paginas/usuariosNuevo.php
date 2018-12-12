<?php
session_start();
if(isset($_SESSION['usuario'])):
  require_once("../vistas/inc/header.php");
  echo "<section class='wrapper'>";
  require_once("../vistas/inc/navlateral.php");
  echo "<section id='content'>";
  require_once("../vistas/inc/navbar.php");
  ?>
  <form action="<?php echo SERVERURL ?>/usuarioControlador/nuevo" method="POST">
    <div class="form-group">
      <label for="usuario">Usuario <sup>*</sup></label>
      <input type="text" class="form-control" id="usuario" placeholder="nombre usuario" name="usuario" required>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="password">Contraseña <sup>*</sup></label>
        <input type="password" class="form-control" id="password" placeholder="contraseña" name="password" required>
      </div>
      <div class="form-group col-md-6">
        <label for="password2">Verificación contraseña <sup>*</sup></label>
        <input type="password" class="form-control" id="password2" placeholder="verificación contraseña" name="password2" required>
      </div>
    </div>
    <div class="form-group">
      <label for="email">Email <sup>*</sup></label>
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
    </div>
    <div class="form-group">
      <label for="privilegio">Privilegios <sup>*</sup></label>
      <select class="form-control" id="privilegio" name="privilegio">
        <option value="0">Visitante</option>
        <option value="1">Administrador</option>
      </select>
    </div>
    <input type="submit" class="btn btn-success" value="Agregar">
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
