<?php
session_start();
if (isset($_POST['nombre']) && isset($_POST['valor'])){
  $_SESSION[$_POST['nombre']]=$_POST['valor'];
}
header("Location: index.php");
return;
?>
