<?php
Class Controlador {

    public function cargaModelo ($modelo) {
        // Carga el modelo
        require_once "../app/modelos/" . $modelo . ".php";
        //Instanciamos el modelo y lo devuelve
        return new $modelo();
    }

    public function cargaVista ($vista, $datos=[]) {
        // Si el fichero existe lo carga, en caso contrario informa del error y muere
        if (file_exists("../app/vistas/paginas/" . $vista . ".php")) {
          require_once "../app/vistas/paginas/" . $vista . ".php";
        }
        else {
          die("la vista no existe");
        }
    }
    public function test_input ($data) {
      $data = trim($data);//Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
      $data = stripslashes($data);//Devuelve un string con las barras invertidas retiradas. (\' se convierte en ') Barras invertidas dobles pasa a sencilla
      $data = strip_tags($data);//Retira las etiquetas HTML y PHP de un string
      $data = htmlspecialchars($data);//Convierte caracteres especiales en entidades HTML
      return $data;
    }
}
?>
