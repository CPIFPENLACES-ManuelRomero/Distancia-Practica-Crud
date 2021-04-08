<?php
//$bd->actualizar($tabla, $campos);
switch ($_POST['enviar']) {
  case 'Guardar':
      header("Location:gestionarTabla.php");
      exit();

  case 'Cancelar':
    header("Location:gestionarTabla.php");
    exit();

}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;
              charset = UTF-8" />
        <title>Ejemplo de estilos CSS en un archivo externo</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset>
            <legend>Editanto Registro de la tabla <?php echo $tabla ?></legend>
            <form action="editar.php" method="post">

                Nombre campo 1 <input type="text" value="Valor campo 1" name="nombre_campo_1" id=""><br />
                Nombre campo 2 <input type="text" value="Valor campo 2" name="nombre_campo_2" id=""><br />
                Nombre campo n <input type="text" value="Valor campo n"  name="nombre_campo_n" id=""><br />

                <input type="submit" value="Guardar" name='enviar'>
                <input type="submit" value="Cancelar" name='enviar'>


            </form>
        </fieldset>

    </body>
</html>
<?php

//Creo un formulario
//Paso por hidden dos arrais
//campos[] => Nombre de los campos de la tabla
//valorAnt[] => Valores del registro editado en la tabla
//valorNuevo[] => Valores del registro editado en la tabla.
//Estos son inputs, y por lo tanto voy a poder cambiar sus valores
//Estos valores (alguno de ellos son los que vamos a cambiar

function crea_formulario() {
  global $campos;
  foreach ($campos as $campo => $valor) {
    if (!(is_numeric($campo))) {
      echo "<label for = $campo>$campo</label>";
      echo "<input type = text name = valorNuevo[] value = '$valor'  /><br />";
      echo "<input type = hidden  name = campos[] value =  '$campo' />";
      echo "<input type = hidden name = valorAnt[] value= '$valor' />";
    }
  }
}

/**
 *
 * @param type $c arrays con los  nombres de los campos
 * @param type $vA arrays con los nombres antiguos
 * @param type $vN arrays con los nombres nuevos
 */
function generaSentenciaUpdate($tabla, $campos, $valorAnt, $valorNuevo) {
  $indice = 0;

  foreach ($campos as $nombreCampo) {
    $set .= "$nombreCampo = '" . $valorNuevo[$indice] . "', ";
    $where .= "$nombreCampo ='" . $valorAnt[$indice] . "' and ";
    $indice++;
  }
  $set = substr($set, 0, strlen($set) - 2);
  $where = substr($where, 0, strlen($where) - 5);
  $sentencia = "update $tabla set $set where $where ";
  echo $sentencia;
  return $sentencia;
}
?>



