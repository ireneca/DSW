<?php
session_start();
if (isset($_POST['c'])){
  foreach ($_POST['c'] as $key => $value) {
    unset($_SESSION[$key]);
  }
}
header("Location: index.php");
return;
?>
