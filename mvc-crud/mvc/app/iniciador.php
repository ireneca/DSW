<?php
//require_once("../app/librerias/Base.php");
//require_once("../app/librerias/Controlador.php");
//require_once("../app/librerias/Core.php");
spl_autoload_register(function($nombreClase){
  require_once "librerias/" . $nombreClase . ".php";
});
require_once("config/configurar.php");
require_once("helpers/url_helper.php");
?>
