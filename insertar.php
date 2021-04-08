<?php
$opcion = $_POST['submit']??null;

switch ($opcion){
    case 'Guardar':
        $msj="Campo guardado o bien error";

        break;
    case 'Cancelar':
        header("Location:gestionarTabla.php");
        break;
}

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
        <fieldset>
            <legend>Insertar nuevo registro en la tabla <?php echo $tabla ?></legend>
            <h2><?=$msj?> </h2>

            <form action="insertar.php" method="post">
                Nombre campo 1 <input type="text" name="nombre_campo_1" id=""><br />
                Nombre campo 2 <input type="text" name="nombre_campo_2" id=""><br />
                Nombre campo n <input type="text" name="nombre_campo_n" id=""><br />
                <input type="submit" value="Guardar" name = submit>
                <input type="submit" value="Cancelar" name = submit>
                <input type="hidden" value='<?php echo $tabla; ?>' name="tabla">
            </form>
        </fieldset>

    </body>
</html>
<?php

function crea_formulario() {
  global $campos;
  foreach ($campos as $campo) {
    echo "<label for=$campo[0]>$campo[0]</label>";
    echo "<input type=text value='' name='$campo[0]' /><br />\n";
  }
}
?>



