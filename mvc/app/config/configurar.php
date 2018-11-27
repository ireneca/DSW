<?php
//echo dirname(dirname (__FILE__));//imprime la ruta de nuestro directorio padre, y al añadir el segundo dirname el padre de este
//por lo que la salida te muestra app en lugar de config --> /var/www/html/mvc/app

// Ruta de la aplicación
define ("RUTA_APP", dirname(dirname (__FILE__)));

//Ruta URL, por si tenemos que cambiar de servidor
define("RUTA_URL", "http://".$_SERVER["HTTP_HOST"]."/mvc");

//Nombre del proyecto
define("NOMBRE_SITIO", "_MI_FRAMERORK_MVC");

define("DB_HOST", "localhost");
define("DB_USUARIO", "irene");
define("DB_PASSWORD", "majada");
define("DB_NOMBRE", "blog");
?>
