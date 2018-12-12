<?php
require_once("../core/mainModelBD.php");
class UsuarioModelo {
  private $db;
  public function __construct(){
    $this->db=new mainModelBD();
  }
  public function loguear($datos){
    $this->db->query("SELECT * FROM cuenta WHERE CuentaUsuario = :usuario AND CuentaClave = :clave");
    $this->db->bind(':usuario',$datos['usuario']);
    $this->db->bind(':clave',$datos['clave']);
    return $this->db->filas();
  }
  public function obtenerUsuarios(){
    $this->db->query("SELECT * FROM cuenta");
    return $this->db->registros();
  }
  public function obtenerUsuario($id){
    $this->db->query("SELECT * FROM cuenta WHERE CuentaCodigo = :id");
    $this->db->bind(':id',$id);
    return $this->db->registro();
  }
  public function contarUsuarios(){
    $this->db->query("SELECT * FROM cuenta");
    return $this->db->filas();
  }
  public function agregarUsuario($datos) {
    //Ejecutamos la consulta con query
    $this->db->query("INSERT INTO cuenta VALUES (:CuentaCodigo,:CuentaPrivilegio,:CuentaUsuario,:CuentaClave,:CuentaEmail,:CuentaFoto)");
    //Vinculamos cada uno de los parámetros con bind
    $this->db->bind(':CuentaCodigo',$datos['codigo']);
    $this->db->bind(':CuentaPrivilegio',$datos['privilegio']);
    $this->db->bind(':CuentaUsuario',$datos['usuario']);
    $this->db->bind(':CuentaClave',$datos['clave']);
    $this->db->bind(':CuentaEmail',$datos['email']);
    $this->db->bind(':CuentaFoto',$datos['foto']);
    //Ejectuamos y devolvemos true si todo ha ido bien. False en caso contrario
    if ($this->db->execute()) {
      return true;
    }
    else{
      return false;
    }
  }
  public function actualizarUsuario($datos){
    $this->db->query("UPDATE cuenta SET CuentaPrivilegio=:CuentaPrivilegio,CuentaUsuario=:CuentaUsuario,
      CuentaClave=:CuentaClave,CuentaEmail=:CuentaEmail,CuentaFoto=:CuentaFoto WHERE CuentaCodigo=:CuentaCodigo");
      $this->db->bind(':CuentaCodigo',$datos['codigo']);
      $this->db->bind(':CuentaPrivilegio',$datos['privilegio']);
      $this->db->bind(':CuentaUsuario',$datos['usuario']);
      $this->db->bind(':CuentaClave',$datos['clave']);
      $this->db->bind(':CuentaEmail',$datos['email']);
      $this->db->bind(':CuentaFoto',$datos['foto']);
    if ($this->db->execute()) {
      return true;
    }
    else{
      return false;
    }
  }
  public function borrarUsuario($id){
    $this->db->query("DELETE FROM cuenta WHERE CuentaCodigo=:CuentaCodigo");
    $this->db->bind(':CuentaCodigo',$id);
    if ($this->db->execute()) {
      return true;
    }
    else{
      return false;
    }
  }
}
