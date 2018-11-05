<?php
require_once 'model/Coche.php';

class CocheController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Coche();
    }

    public function Index(){
        $coches = array();
        foreach($this->model->Listar() as $cohe){
          $coc = new Coche();
          $coc = $cohe;
          array_push($coches,$coc);
        }
        require_once 'view/header.php';
        require_once 'view/coche/coche.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $coc = new Coche();

        if(isset($_REQUEST['auto_id'])){
            $coc = $this->model->Obtener($_REQUEST['auto_id']);
        }

        require_once 'view/header.php';
        require_once 'view/coche/coche-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $coc = new Coche();

        $coc->auto_id = $_REQUEST['auto_id'];
        $coc->make = $_REQUEST['make'];
        $coc->model = $_REQUEST['model'];
        $coc->year = $_REQUEST['year'];
        $coc->mileage = $_REQUEST['mileage'];

        $coc->id > 0
            ? $this->model->Actualizar($coc)
            : $this->model->Registrar($coc);

        header('Location: index.php');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['auto_id']);
        header('Location: index.php');
    }
}
?>
