<?php
class Paginas extends Controlador{
    public function __construct() {
      // Desde aquí cargaremos los modelos.
      $this->usuarioModelo = $this->cargaModelo("Usuario");
    }
    public function index(){
      $datos = [
        'Usuarios' => $this->usuarioModelo->obtenerUsuarios()
      ];
      $this->cargaVista('inicio',$datos);
    }
    public function agregar(){
      //Si el método es POST haz un trimado de los datos antes de insertarlos. Después llama al método agregarUsuario y si se ejecuta redirecciona a inicio, si no muere y manda mensaje.
      if ($_SERVER['REQUEST_METHOD']=='POST'){
        $datos = [
          'nombre' => $this->test_input($_POST['nombre']),
          'email' => $this->test_input($_POST['email']),
          'telefono' => $this->test_input($_POST['tlf'])
        ];
        if ($this->usuarioModelo->agregarUsuario($datos)){
          redireccionar('/paginas');
        }else{
          die('Error');
        }
      }
      //Si el método no es POST se carga la vista agregar con el array $datos vacío
      else {
        $datos = [
          'nombre' => '',
          'email' => '',
          'telefono' => ''
        ];
        $this->cargaVista('agregar',$datos);
      }
    }
    public function editar($id){
      if ($_SERVER['REQUEST_METHOD']=='POST'){
        $datos = [
          'id' => $this->test_input($id),
          'nombre' => $this->test_input($_POST['nombre']),
          'email' => $this->test_input($_POST['email']),
          'telefono' => $this->test_input($_POST['tlf'])
        ];
        if ($this->usuarioModelo->actualizarUsuario($datos)){
          redireccionar('/paginas');
        }else{
          die('Error');
        }
      }else {
        $usuario = $this->usuarioModelo->obtenerUsuario($this->test_input($id));
        $datos = [
          'id' => $usuario->id_usuario,
          'nombre' => $usuario->nombre,
          'email' => $usuario->email,
          'telefono' => $usuario->tlf
        ];
        $this->cargaVista('editar',$datos);
      }
    }
    public function borrar($id){
      if ($_SERVER['REQUEST_METHOD']=='POST'){
        if ($this->usuarioModelo->borrarUsuario($this->test_input($id))){
          redireccionar('/paginas');
        }else{
          die('Error');
        }
      }else {
        $usuario = $this->usuarioModelo->obtenerUsuario($this->test_input($id));
        $datos = [
          'id' => $usuario->id_usuario,
          'nombre' => $usuario->nombre
        ];
        $this->cargaVista('borrar',$datos);
      }
    }
}
?>
