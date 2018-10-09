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
    if (isset($_GET["name"])){
        function check($maquina,$persona){
            $piedra = 1;
            $papel = 2;
            $tijera = 3;
            switch ($persona){
                case $piedra:
                    switch($maquina){
                        case $piedra:
                            return "Empate";
                            break;
                        case $papel:
                            return "Pierdes";
                            break;
                        case $tijera:
                            return "Ganas";
                            break;
                    }
                    break;
                case $papel:
                    switch($maquina){
                        case $piedra:
                            return "Ganas";
                            break;
                        case $papel:
                            return "Empate";
                            break;
                        case $tijera:
                            return "Pierdes";
                            break;
                    }
                    break;
                case $tijera:
                    switch($maquina){
                        case $piedra:
                            return "Pierdes";
                            break;
                        case $papel:
                            return "Ganas";
                            break;
                        case $tijera:
                            return "Empate";
                            break;
                    }
                    break;
            }
        }
        function figura($f){
            switch ($f){
                case 1:
                    return "Piedra";
                    break;
                case 2:
                    return "Papel";
                    break;
                case 3:
                    return "Tijera";
                    break;
            }
        }
        if (isset($_POST["jugar"]) && $_POST["persona"]>0){
            $persona = $_POST["persona"];
            if ($persona==4){
                $valor="";
                for($m=1;$m<=3;$m++) {
                    for($p=1;$p<=3;$p++) {
                        $valor .= "Persona=".figura($p)." Ordenador=".figura($m)." Resultado=".check($m,$p)."\n";
                    }
                }
            }
            else {
                $maquina = mt_rand(1,3);
                $valor = "Persona=".figura($persona)." Ordenador=".figura($maquina)." Resultado=".check($maquina,$persona);
            }
        }
        else {
            $valor = "Selecciona una opción del menú desplegable";
        }
                
        $nombre = $_GET["name"];
        echo "<h1>Piedra, Papel o Tijera</h1>";
        echo "<h3>Bienvenido ".$nombre."</h3>";
        ?>
        <form method='POST'>
        	<p>
                <select name="persona" id="select">
                    <option value="0">-- Selecciona --</option>
                    <option value="1">-- Piedra --</option>
                    <option value="2">-- Papel --</option>
                    <option value="3">-- Tijera --</option>
                    <option value="4">-- Test --</option>
                </select>
                <input type="submit" value="Jugar" name="jugar"/>
                <a href="index.php"><input type="button" value="Salir" name="salir"/></a>
            </p>
            <textarea name="resultado" cols="60" rows="12" readonly><?php echo $valor; ?></textarea>
        </form>
        <?php
    }
    else {
        die ("Falta el nombre del parámetro");
    }
    ?>
</body>
</html>