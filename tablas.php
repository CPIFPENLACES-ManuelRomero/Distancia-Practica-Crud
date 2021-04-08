<!DOCTYPE html>
<?php
//Auto carga de clases
spl_autoload_register(function ($clase) {
  require_once "$clase.php";
}
);

session_start();

$conexion = $_SESSION['conexion'];
//Aquí debemos leer la base de datos y mostrar sus tablas



//consultamos las tablas de esa base de datos
//Este método nos retorna un array con todas las tablas de una base de datos concreta

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
        <fieldset id="sup"style="width:25%">
            <legend>Listado bases de datos</legend>
            <form action="index.php" method='POST'>
                <input type="submit" value="Volver" name="volver">
            </form>
        </fieldset>

        <fieldset style="width:70%">
            <legend>Gestion de las Bases de Datos <span class="resaltar">Nombre Base de datos</span></legend>
            <form action='gestionarTabla.php' method='post'>

                <?php
//                Listado de las tablas
                ?>
            <input type="submit" value="Tabla x (solo para navegar)" />
        </form>

    </fieldset>

</body>
</html>
