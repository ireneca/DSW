<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Piedra, Papel o Tijera</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
} 
$mensage = "";
if (isset($_POST["enviar"])){
    $nombre = test_input($_POST["nombre"]);
    $contrasena = test_input($_POST["contrasena"]);
    if ($nombre == "" || $contrasena == ""){
        $mensage = "Se requiere nombre de usuario y clave para acceder";
    }
    else {
        $salt = 'XyZzy12*_';
        $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
        $md5 = hash('md5', $salt.$contrasena);
        if ($stored_hash == $md5){
            header("Location: game.php?name=".urlencode($nombre));
        }
        else {
            $mensage = "Contraseña incorrecta";
        }
    }
}
echo $mensage;
?>
	<form method="POST">
		<p>
    		<label for="nombre">Usuario: </label> 
    		<input type="text" name="nombre" size="100" id="nombre" />
		</p>
		<p>
    		<label for="contraseña">Contraseña: </label> 
    		<input type="password" name="contrasena" size="100" id="contraseña" />
		</p>
		<input type="submit" value="Iniciar sesión" name="enviar"/>
	</form>
</body>
</html>
