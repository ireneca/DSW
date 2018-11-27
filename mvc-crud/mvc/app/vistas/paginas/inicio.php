<?php
require_once(RUTA_APP."/vistas/inc/header.php");
?>
<table class="table">
  <thead>
    <tr>
      <th>id</th>
      <th>Nombre</th>
      <th>Email</th>
      <th>Telefono</th>
      <th colspan="2">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($datos['Usuarios'] as $usuario) :
      echo "<tr>";
      echo "<td>".$usuario->id_usuario."</td>";
      echo "<td>".$usuario->nombre."</td>";
      echo "<td>".$usuario->email."</td>";
      echo "<td>".$usuario->tlf."</td>";
      echo "<td><a class='nav-link' href='".RUTA_URL."/paginas/editar/".$usuario->id_usuario."'>Editar</a></td>";
      echo "<td><a class='nav-link' href='".RUTA_URL."/paginas/borrar/".$usuario->id_usuario."''>Borrar</a></td>";
      echo "</tr>";
    endforeach;
    ?>
  </tbody>
</table>
<?php
require_once(RUTA_APP."/vistas/inc/footer.php");
?>
