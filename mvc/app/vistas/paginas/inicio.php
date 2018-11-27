<?php
require_once(RUTA_APP."/vistas/inc/header.php");
echo "<h2>".$datos['Titulo']."</h2>";
echo "<ul>";
foreach ($datos['Articulos'] as $articulo) :
  echo "<li>".$articulo->titulo."</li>";
endforeach;
echo "</ul>";
echo "<p>nº de articulos ".$datos['NArticulos']."</p>";
echo "<p>".RUTA_APP."</p>";
echo "<p>".RUTA_URL."</p>";
echo "<p>".NOMBRE_SITIO."</p>";
require_once(RUTA_APP."/vistas/inc/footer.php");
?>
