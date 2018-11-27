<?php
class Articulo {
  private $db;
  function __construct(){
    $this->db=new Base;
  }
  public function obtenerArticulos(){
    $this->db->query("SELECT * FROM articulos");
    return $this->db->registros();
  }
  public function contarArticulos(){
    $this->db->query("SELECT * FROM articulos");
    return $this->db->filas();
  }
}
?>
