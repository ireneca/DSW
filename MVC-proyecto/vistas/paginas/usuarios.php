<?php
session_start();
if(isset($_SESSION['usuario'])):
  require_once("../vistas/inc/header.php");
  echo "<section class='wrapper'>";
  require_once("../vistas/inc/navlateral.php");
  echo "<section id='content'>";
  require_once("../vistas/inc/navbar.php");
  ?>
  <p class="txtPeliculas2"><a href="<?php echo SERVERURL; ?>/usuarioControlador/nuevo/" class="nav-link text-dark"><i class="fas fa-plus"></i> Nueva</a></p>
  <table class="table">
    <thead>
      <tr>
        <th>CuentaCodigo</th>
        <th>CuentaUsuario</th>
        <th>CuentaClave</th>
        <th>CuentaEmail</th>
        <th>CuentaPrivilegio</th>
        <th colspan="2">Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($datos['Usuarios'] as $usuario) :
      echo "<tr>";
      echo "<td class='txtPeliculas'>".$usuario->CuentaCodigo."</td>";
      echo "<td class='txtPeliculas'>".$usuario->CuentaUsuario."</td>";
      echo "<td class='txtPeliculas'>".$usuario->CuentaClave."</td>";
      echo "<td class='txtPeliculas'>".$usuario->CuentaEmail."</td>";
      if($usuario->CuentaPrivilegio == 0){
        echo "<td class='txtPeliculas'>Visitante</td>";
      }else{
        echo "<td class='txtPeliculas'>Administrador</td>";
      }
      echo "<td class='txtPeliculas'><a class='nav-link text-dark' href='".SERVERURL."/usuarioControlador/editar/".$usuario->CuentaCodigo."'><i class='fas fa-edit'></i> Editar</a></td>";
      echo "<td class='txtPeliculas'><a class='nav-link text-dark' href='".SERVERURL."/usuarioControlador/borrar/".$usuario->CuentaCodigo."''><i class='fas fa-trash-alt'></i> Borrar</a></td>";
      echo "</tr>";
    endforeach;
    ?>
    </tbody>
  </table>
  <?php
  echo "</section>";
  echo "</section>";
  require_once("../vistas/inc/footer.php");
else:
  header("location: " . SERVERURL . "/usuarioControlador/login/");
endif;
 ?>
