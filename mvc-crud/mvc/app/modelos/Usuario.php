<?php
class Usuario {
  private $db;
  function __construct(){
    $this->db=new Base;
  }
  public function obtenerUsuarios(){
    $this->db->query("SELECT * FROM usuarios");
    return $this->db->registros();
  }
  public function obtenerUsuario($id){
    $this->db->query("SELECT * FROM usuarios WHERE id_usuario = :id");
    $this->db->bind(':id',$id);
    return $this->db->registro();
  }
  public function agregarUsuario($datos) {
    //Ejecutamos la consulta con query
    $this->db->query("INSERT INTO usuarios(nombre,email,tlf) VALUES (:nombre,:email,:telefono)");
    //Vinculamos cada uno de los parámetros con bind
    $this->db->bind(':nombre',$datos['nombre']);
    $this->db->bind(':email',$datos['email']);
    $this->db->bind(':telefono',$datos['telefono']);
    //Ejectuamos y devolvemos true si todo ha ido bien. False en caso contrario
    if ($this->db->execute()) {
      return true;
    }
    else{
      return false;
    }
  }
  public function actualizarUsuario($datos){
    $this->db->query("UPDATE usuarios SET nombre=:nombre,email=:email,tlf=:telefono WHERE id_usuario=:id");
    $this->db->bind(':id',$datos['id']);
    $this->db->bind(':nombre',$datos['nombre']);
    $this->db->bind(':email',$datos['email']);
    $this->db->bind(':telefono',$datos['telefono']);
    if ($this->db->execute()) {
      return true;
    }
    else{
      return false;
    }
  }
  public function borrarUsuario($id){
    $this->db->query("DELETE FROM usuarios WHERE id_usuario=:id");
    $this->db->bind(':id',$id);
    if ($this->db->execute()) {
      return true;
    }
    else{
      return false;
    }
  }
}
?>
