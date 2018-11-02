<?php
require_once 'model/coche.php';

class CocheController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Coche();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/coche/coche.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $coc = new Coche();

        if(isset($_REQUEST['id'])){
            $coc = $this->model->Obtener($_REQUEST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/coche/coche-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $coc = new Coche();

        $coc->id = $_REQUEST['id'];
        $coc->marca = $_REQUEST['marca'];
        $coc->modelo = $_REQUEST['modelo'];
        $coc->anio = $_REQUEST['anio'];
        $coc->kilometraje = $_REQUEST['kilometraje'];

        $coc->id > 0
            ? $this->model->Actualizar($coc)
            : $this->model->Registrar($coc);

        header('Location: index.php');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
?>
