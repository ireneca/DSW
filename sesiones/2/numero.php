<?php
session_start();
if (isset($_POST['accion'])){
  if ( $_POST['accion'] == '-' ) {
    header("Location: index.php");
    $_SESSION['numero'] -= 1;
    return;
  } else if ( $_POST['accion'] == '+' ) {
    header("Location: index.php");
    $_SESSION['numero'] += 1;
    return;
  }else if ( $_POST['accion'] == 'Poner a cero' ) {
    header("Location: index.php");
    $_SESSION['numero'] = 0;
    return;
  }
}
?>
