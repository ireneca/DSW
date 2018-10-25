<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Irene</title>
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
    $email = test_input($_POST["email"]);
    $contrasena = test_input($_POST["contrasena"]);
    if ($email == "" || $contrasena == ""){
      $_SESSION['error'] = "Se requiere email y contraseña";
      header("Location: login2.php");
      return;
    }
    else if (!strpos($email,'@')) {
      $_SESSION['error'] = "El correo electrónico debe tener un signo (@)";
      header("Location: login2.php");
      return;
    }
    else {
      $salt = 'XyZzy12*_';
      $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';//$salt + php123
      $md5 = hash('md5', $salt.$contrasena);
        if ($stored_hash == $md5){
          $_SESSION['name'] = $email;
          // /etc/php/7.0/apache2/php.ini
          // /var/log/php_errors.log
          error_log("Login success ".$email);
          header("Location: view.php");
          return;
        }
        else {
          $_SESSION['error'] = "Contraseña incorrecta";
          error_log("Login fail ".$email." $md5");
          header("Location: login2.php");
          return;
        }
    }
  }
  ?>
  <h2>Inicia seción</h2>
  <?php
  if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
  }
?>
	<form method="POST">
		<p>
    		<label for="email">Email: </label>
    		<input type="text" name="email" size="100" id="email" />
		</p>
		<p>
    		<label for="contraseña">Contraseña: </label>
    		<input type="password" name="contrasena" size="100" id="contraseña" />
		</p>
		<input type="submit" value="Iniciar sesión" name="enviar"/>
	</form>
</body>
</html>
