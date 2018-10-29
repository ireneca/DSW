<?php
function conectar() {
  require_once 'login.php';
  try{
    $pdo = new PDO("mysql:host=$hostname; port=$port; dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conecion exitosa!";
    return($pdo);
  }
  catch (PDOException $e){
    echo "Error!: ".$e->getMessage();
    error_log("conectar.php, SQL error=".$e->getMessage());
    die();
  }
  //$pdo=null;
}
?>
