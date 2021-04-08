<?php
/**
 * Obtener la base de datos y tabla que estamos gestionando
 *
 * Obtener todas sus tuplas
 *
 * Mostrarlo en una tabla
 *
 * Cada fila con un submit de editar o de borrar
 *
 * También dos opciones de añadir fila o cancelar
 */
spl_autoload_register(function ($clase) {
    require_once "$clase.php";
});

session_start();

//Este scrip tiene posibles acciones (tiene varios submit que he de gestionar=
//Todo esto has de rellenarlo y ver qué información necesitas
//Puede que tengas que pasar valores por la url, tomarlos del formulario, sesiones ...
if (isset($_POST['submit'])) {
    switch ($_POST['submit']) {
        case 'Add':
            header("Location:insertar.php");
            break;
        case 'Edit':

            header("Location:editar.php");
            exit();
            break;
        case 'Del':
            //Quiero borrar el registro soleccionado y quedarme aquí
            $msj="Se habría borrado la fila o error";

            break;
        case 'Close':
            //Necesitamos pasar la base de datos
            header("Location:tablas.php");
            break;
    }
}


?>

<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Ejemplo de estilos CSS en un archivo externo</title>
    <link rel="stylesheet" type="text/css" href="estilo.css" media="screen"/>
    <meta charset="ISO-8859-1"
    <title></title>
</head>
<body>
<fieldset style="width:70%">
    <legend>Admnistración de la tabla <?php echo $tabla; ?></legend>
    <?= $msj ?? null?>
    <table id="tabla" class="display" border="1">
        <thead>
        <tr>
            <th>Campo 1</th>
            <th>Campo n</th>

            <th colspan="2">Acciones</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <form action='gestionarTabla.php' method='post'>
                <td>valor campo 1</td>
                <td>valor campo 2</td>
                <td><input id=tabla type="submit" value="Edit" name="submit"></td>
                <td><input id=tabla type="submit" value="Del" name="submit"></td>
            </form>
        </tr>
    </table>
    <form action='gestionarTabla.php' method='post'>
        <input type="submit" value="Add" name="submit">
        <input type="submit" value="Close" name="submit">

    </form>
</fieldset>
</body>
</html>

<?php

/**
 * función usada para borrar
 * Aquí puedo leer el input registros que contendrá todos los campos
 */
function borrar($tabla, $database, $datosConexion)
{
    //He de leer todos los campos de esa fila que quiero borrar (nombre de campo y valor)
    $registro = $_POST['campos'];
    $sentencia = "delete from $tabla where ";
    $condicion = "";
    foreach ($registro as $campo => $valor) {
        $condicion .= " ($campo = '$valor') and ";
    }
    $condicion = substr($condicion, 0, strlen($condicion) - 4);
    $sentencia = "delete from $tabla where $condicion";
    $db = new BD($datosConexion);
    $db->usar_BD("$database");
    $db->borrar($sentencia);

    echo $db->get_error_message();
    $db->cerrarDB();
}

?>


