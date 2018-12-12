<?php
class mainModelURL {

    protected $controladorActual ="UsuarioControlador"; //Controlador por defecto
    protected $metodoActual = "login"; // Método por defecto
    protected $parametros = []; // Por defecto no hay parámetros

    public function __construct() {
        $url = $this->getUrl(); //la variable $url = la salida de getURL
        //ucwords — Convierte a mayúsculas el primer caracter de cada palabra de una cadena
        if (file_exists("../controladores/" . ucwords($url[0]) . ".php")) { //comprueba si existe el fichero del controlador
          $this->controladorActual = ucwords($url[0]); //si existe lo guarda como controlador actual
          unset($url[0]); //Destruye variable $url[0]
        }
        require_once "../controladores/" . $this->controladorActual . ".php"; //requerimos el fichero del controlador
        $this->controladorActual = new $this->controladorActual; //instanciamos la clase de controlador actual como controlador actual
        if (isset($url[1])) { //si existe metodo
          if (method_exists($this->controladorActual, $url[1])) { //comprobamos si el metodo exixte en el controlador
            $this->metodoActual = $url[1]; //metodo actual es igual a ese metodo
            unset($url[1]); //Destruye variable $url[1]
          }
        }
        //array_values — Devuelve todos los valores de un array
        $this->parametros = $url ? array_values($url) : []; //parametros es igual a array url o [] si no esta
        //call_user_func_array --> Llamar al método controladorActual->metodoActual() con parametros como parametro de entrda
        //ponemos el metodo en un array y los parametros de entrada en otro
        call_user_func_array ([$this->controladorActual, $this->metodoActual], $this->parametros);
    }

    public function getURL(){
      if(isset($_GET["url"])){
        $url=rtrim($_GET["url"],"/"); //retira la barra al final de la cadena
        $url=filter_var($url,FILTER_SANITIZE_URL); //filter_var — Filtra una variable con el filtro que se indique
        //FILTER_SANITIZE_URL-->Elimina todos los caracteres excepto letras, dígitos y $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=.
        $url=explode("/",$url); //Divide un string en varios string lo divide por "/"
        return $url;
      }
    }
}
