<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>irene</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <?php
  function test_input($data) {
      $data = trim($data);//Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
      $data = stripslashes($data);//Devuelve un string con las barras invertidas retiradas. (\' se convierte en ') Barras invertidas dobles pasa a sencilla
      $data = strip_tags($data);//Retira las etiquetas HTML y PHP de un string
      $data = htmlspecialchars($data);//Convierte caracteres especiales en entidades HTML
      return $data;
  }
  $mensage = "";
  if (isset($_POST["enviar"])){
      $apellido1 = test_input($_POST["apellido1"]);
      $ocupacion = test_input($_POST["ocupacion"]);
      $email = test_input($_POST["email"]);
      $direccion = test_input($_POST["direccion"]);
      $telefono = test_input($_POST["telefono"]);
      $tituloPro = test_input($_POST["tituloPro"]);
      if ($apellido1 == "" || $email == "" || $direccion == ""){
        $mensage = "<p style='color:red;'>Se requiere  primer apellido, dirección de correo electrónico y dirección de envío para hacer el envio</p>";
      }
      else if (!strpos($email,'@')){
        $mensage = "<p style='color:red;'>El correo electrónico debe tener un signo (@)</p>";
      }
      else if ($telefono != "" && !is_numeric($telefono)){
        $mensage = "<p style='color:red;'>El telefono bebe ser numerico</p>";
      }
      else {
        $hoy = getdate();
        $stringHoy = $hoy['hours'].$hoy['minutes'].$hoy['seconds'].$hoy['wday'].$hoy['mday'].$hoy['mon'].$hoy['year'];
        $archivo = "/var/www/html/ampliacion1/archivos/$apellido1-$stringHoy.txt";
        $content1 = "Primer apellido: $apellido1 \n";
        $content2 = "Ocupación: $ocupacion \n";
        $content3 = "Dirección de correo electrónico: $email \n";
        $content4 = "Dirección de envío: $direccion \n";
        $content5 = "Teléfono: $telefono \n";
        $content6 = "Título profesional: $tituloPro \n";
        if ($handler = fopen($archivo, 'x+')){
          fwrite($handler,$content1);
          fwrite($handler,$content2);
          fwrite($handler,$content3);
          fwrite($handler,$content4);
          fwrite($handler,$content5);
          fwrite($handler,$content6);
          fclose($handler);
          $mensage = "<p style='color:green;'>Registro correcto</p>";
        }
        else {
          $mensage = "<p style='color:red;'>Error guardar registro</p>";
        }
      }
  }
  echo $mensage;
  ?>
    <h2>Registro para un servicio de suscripción</h2>
    <form method="POST">
      <p>
          <label for="apellido1">Primer apellido: </label>
          <input type="text" name="apellido1" size="100" id="apellido1" />
      </p>
      <p>
          <label for="ocupacion">Ocupación: </label>
          <input type="text" name="ocupacion" size="100" id="ocupacion" />
      </p>
      <p>
          <label for="email">Dirección de correo electrónico: </label>
          <input type="text" name="email" size="100" id="email" />
      </p>
      <p>
          <label for="direccion">Dirección de envío: </label>
          <input type="text" name="direccion" size="100" id="direccion" />
      </p>
      <p>
          <label for="telefono">Teléfono: </label>
          <input type="text" name="telefono" size="100" id="telefono" />
      </p>
      <p>
          <label for="tituloPro">Título profesional: </label>
          <input type="text" name="tituloPro" size="100" id="tituloPro" />
      </p>
      <input type="submit" value="Registrarse" name="enviar"/>
    </form>
</body>
</html>
