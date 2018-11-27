<?php
class Paginas extends Controlador{
    public function __construct() {
        //echo "Controlador páginas cargado";
        $this->articuloModelo = $this->cargaModelo("Articulo");
    }
    public function actualizar ($id) {
      echo "Método actualizar\n";
      echo $id;
    }
    public function index(){
      $datos = [
        'Titulo' => 'Framework de Irene Caubín Alonso',
        'Articulos' => $this->articuloModelo->obtenerArticulos(),
        'NArticulos' => $this->articuloModelo->contarArticulos()
      ];
      $this->cargaVista('inicio',$datos);
    }
    public function articulo(){
      $this->cargaVista('articulo');
    }
}
?>
