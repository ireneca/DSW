<?php
require_once("../core/mainModel.php");
class UsuarioControlador extends mainModel{
    public function __construct() {
      // Desde aquí cargaremos los modelos.
      $this->usuarioModelo = $this->cargaModelo("UsuarioModelo");
    }
    public function login(){
      if ($_SERVER['REQUEST_METHOD']=='POST'){
        $datos = [
          'usuario' => $this->limpiar_cadena($_POST['usuario']),
          'clave' => $this->encryption($_POST['clave'])
        ];
        if ($this->usuarioModelo->loguear($datos)>0){
          session_start();
          $_SESSION['usuario']=$datos['usuario'];
          header("location: " . SERVERURL . "/pagina/index/");
        }else{
          $this->cargaVista('index');
        }
      }else{
        $this->cargaVista('index');
      }
    }
    public function logout(){
      session_start();
      session_destroy();
      header("location: " . SERVERURL . "/usuarioControlador/login/");
    }
    public function index(){
      $datos = [
        'Usuarios' => $this->usuarioModelo->obtenerUsuarios()
      ];
      $this->cargaVista('usuarios',$datos);
    }
    public function nuevo(){
      //Si el método es POST haz un trimado de los datos antes de insertarlos. Después llama al método agregarUsuario y si se ejecuta redirecciona a inicio, si no muere y manda mensaje.
      if ($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['password'] == $_POST['password2']){
          $usuario = $this->limpiar_cadena($_POST['usuario']);
          $l=str_split($usuario);
          $n=$this->usuarioModelo->contarUsuarios();
          $codigo = $this->generar_codigo_aleatorio($l[0],4,$n);
          $datos = [
            'codigo' => $codigo,
            'privilegio' => $this->limpiar_cadena($_POST['privilegio']),
            'usuario' => $usuario,
            'clave' => $this->encryption($_POST['password']),
            'email' => $this->limpiar_cadena($_POST['email']),
            'foto' => ""

          ];
          if ($this->usuarioModelo->agregarUsuario($datos)){
            header("location: " . SERVERURL . "/usuarioControlador/index/");
          }else{
            die('Error');
          }
        }else {
          $datos = [
            'error' => 1
          ];
          $this->cargaVista('usuariosNuevo',$datos);
        }
      }
      //Si el método no es POST se carga la vista agregar con el array $datos vacío
      else {
        $datos = [
          'error' => 0
        ];
        $this->cargaVista('usuariosNuevo',$datos);
      }
    }
    public function editar($id){
      if ($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['password'] == $_POST['password2']){
          $usuario = $this->limpiar_cadena($_POST['usuario']);
          $l=str_split($usuario);
          $n=$this->usuarioModelo->contarUsuarios();
          $codigo = $this->generar_codigo_aleatorio($l[0],4,$n);
          $datos = [
            'codigo' => $id,
            'privilegio' => $this->limpiar_cadena($_POST['privilegio']),
            'usuario' => $usuario,
            'clave' => $this->encryption($_POST['password']),
            'email' => $this->limpiar_cadena($_POST['email']),
            'foto' => ""
          ];
          if ($this->usuarioModelo->actualizarUsuario($datos)){
            header("location: " . SERVERURL . "/usuarioControlador/index/");
          }else{
            die('Error');
          }
        }else {
          $usuario = $this->usuarioModelo->obtenerUsuario($id);
          $datos = [
            'error' => 1,
            'codigo' => $usuario->CuentaCodigo,
            'privilegio' => $usuario->CuentaPrivilegio,
            'usuario' => $usuario->CuentaUsuario,
            'clave' => $this->decryption($usuario->CuentaClave),
            'email' => $usuario->CuentaEmail,
            'foto' => $usuario->CuentaFoto
          ];
          $this->cargaVista('usuariosEditar',$datos);
        }
      }else {
        $usuario = $this->usuarioModelo->obtenerUsuario($id);
        $datos = [
          'error' => 0,
          'codigo' => $usuario->CuentaCodigo,
          'privilegio' => $usuario->CuentaPrivilegio,
          'usuario' => $usuario->CuentaUsuario,
          'clave' => $this->decryption($usuario->CuentaClave),
          'email' => $usuario->CuentaEmail,
          'foto' => $usuario->CuentaFoto
        ];
        $this->cargaVista('usuariosEditar',$datos);
      }
    }
    public function borrar($id){
      if ($_SERVER['REQUEST_METHOD']=='POST'){
        if ($this->usuarioModelo->borrarUsuario($id)){
          header("location: " . SERVERURL . "/usuarioControlador/index/");
        }else{
          die('Error');
        }
      }else {
        $usuario = $this->usuarioModelo->obtenerUsuario($id);
        $datos = [
          'codigo' => $usuario->CuentaCodigo,
          'usuario' => $usuario->CuentaUsuario
        ];
        $this->cargaVista('usuariosBorrar',$datos);
      }
    }
}
