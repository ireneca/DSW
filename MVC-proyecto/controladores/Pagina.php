<?php
require_once("../core/mainModel.php");
class Pagina extends mainModel{
    public function __construct() {
      // Desde aquí cargaremos los modelos.
    }
    public function index(){
      $this->cargaVista('home');
    }
}
