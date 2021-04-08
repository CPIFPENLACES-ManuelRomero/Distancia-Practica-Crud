<!DOCTYPE html>
<?php
//Función para auto carga de clases siguiendo las buenas prácticas de programación
spl_autoload_register(function ($clase) {
  require_once "$clase.php";
}
);
session_start();

//Si paso parámetros de conexión los leo
$datosConexión = [];
if (isset($_POST['conectar'])) {

  //Guardo los datos de conexión en variable de sesión
  $_SESSION['conexion']['host'] = filter_input(INPUT_POST, 'host');
  $_SESSION['conexion']['user'] = filter_input(INPUT_POST, 'usuario');
  $_SESSION['conexion']['pass'] = filter_input(INPUT_POST, 'pass');
}

if (isset($_SESSION['conexion'])) {
//Si ya he establecido previamente conexión, recojo los datos de sesión
//Si no contendrán null y la conexión fallará y me informará de ello
  $conexion = $_SESSION['conexion'];
} else {
//Rellena el código que consideres



}

//creo un objeto de conexión con la base de datos
$db = new BD($conexion);
//En caso de error lo visualizo.


echo $db->get_error_message();

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Ejemplo de estilos CSS en un archivo externo</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


        <fieldset id="sup"style="width:70%">
            <legend>Datos de conexión</legend>
            
            <form action="." method="POST">
                <label for="host">Host</label>
                <input type="text" name="host" value="localhost" id="">
                <label for="usuario">Usuario</label>
                <input type="password" name="usuario" value="root" id="">
                <label for="pass">Password</label>
                <input type="text" name="pass" value="root" id="">
                <input type="submit" value="Conectar" name="conectar">
            </form>

        </fieldset>

        <?php

        //Aquí rellenaras la información que consideres
        //(Si estoy conectado mostrar las bases de datos, si no, no mostrar nada)

        ?>
<!--    Este código solo para probar, en realidad serían las tablas-->
        <fieldset style="width:70%">
            <legend>Datos de conexión</legend>

            <form action="tablas.php">
                <input type="submit" value="Tabla x (ficticia, solo para navegar)">
            
        </form>
        </fieldset>
    </body>
</html>
