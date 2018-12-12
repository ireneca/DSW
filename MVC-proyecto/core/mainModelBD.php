<?php
require_once("../core/configAPP.php");
class mainModelBD{
  private $dbh;
  private $stmt;
  private $error;
  //conectamos con la BD
  public function __construct(){
    try {
      $this->dbh=new PDO(SGBD,DB_USUARIO,DB_PASSWORD,OPCIONES);
    }
    catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }
  public function query ($sql) {
    $this->stmt = $this->dbh->prepare($sql);//preparamos la cansulta y la guardamos en stmt
  }
  public function execute () {
    return $this->stmt->execute();//ejecutamos la consulta anteriormente preparada
  }
  public function registros() {
    $this->execute();
    return$this->stmt->fetchAll(PDO::FETCH_OBJ);//debuelbe un array con los resultados de la consulta
  }
  public function registro() {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);//debuelbe resultado de consulta
  }
  public function filas() {
    $this->execute();
    return $this->stmt->rowCount();//debuelbe el numero de filas
  }
  public function bind ($param, $valor, $tipo = null) {
    if (is_null($tipo)) { //si tipo es null
      switch (true) {
        case is_int($valor): //compueva si valor es int y positivo cambia tipo
          $tipo = PDO::PARAM_INT;
          break;
        case is_bool($valor): //compueva si valor es bool y positivo cambia tipo
          $tipo = PDO::PARAM_BOOL;
          break;
        case is_null($valor): //compueva si valor es null y positivo cambia tipo
          $tipo = PDO::PARAM_NULL;
          break;
        default: //por defecto pondria tipo a string
          $tipo = PDO::PARAM_STR;
      }
    }
    $this->stmt->bindValue($param, $valor, $tipo);
  }
}
