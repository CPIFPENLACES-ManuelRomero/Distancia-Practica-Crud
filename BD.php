<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this templte file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BD
 *
 * @author manuel
 * */
class BD {

  public $con;
  private $database;
  private $user;
  private $pass;
  private $host;
  private $msj = NULL;

//

    /**
     * BD constructor.
     * @param null $datosConexion
     * @source Va a construi el objeto dando valor al atributo $con que es el central de esta clase
     */
  public function __construct($datosConexion=null) {




  }

    /**
     * Retorna el estado de error si lo hubiera en la base de datos
     * Si no hay error retorna null
     */
public function get_error_message() {


  }

  public function conectado() {


  }

    /**
     * @param $sentencia
     * @param null $valores
     * @param null $conexion
     * Debe de ejecutar una sentencia que le paso por parámetro
     */
  private function ejecutarConsulta($sentencia, $valores=null) {

    $this->msj = NULL;
    //Situación de garantía de conexión
    //Si no estoy conectado, me conecto
    if ($this->con == NULL) {
        //Ten en cuenta cómo vas a gestionar los parámetros de conexión
        //Puedes pasarlos por argumento, puedes tomarlos de sesión .....

      $this->__construct();
    }

  }

    /**
     * @param $sentencia
     * @param null $valores
     * En este caso el código puede quedar como se muestra
     */
  public function insertar($sentencia, $valores=null) {
    $r = $this->ejecutarConsulta($sentencia);
    if ($this->msj != NULL)
      $this->msj = "Error insertando, tener encuenta las relaciones de integridad referencial <br />" . $this->msj;
    }

    /**
     * @param $sentencia
     * @param null $valores
     * En este caso el código puede quedar como se muestra
     */
  public function borrar($sentencia, $valores=null) {
    $this->error = null;
    $r = $this->ejecutarConsulta($sentencia, $valores);
    if ($this->msj != NULL) {
      $this->msj = "Error borrando, tener encuenta las relaciones de integridad referencial  <br />" . $this->msj;
    }
  }

    /**
     * @param $sentencia
     * @param null $valores
     * En este caso el código puede quedar como se muestra
     */
  public function actualizar($sentencia, $valores=null) {
    $this->msj = null;
    $r = $this->ejecutarConsulta($sentencia, $valores);
    //En este caso, aunque no se lance excepción, si no se ha insertado lo consideraremos un error
    if (($this->msj != NULL) || ($r->rowCount() == 0)) {
      $this->msj = "Error actualizando, tener encuenta las relaciones de integridad referencial <br />" . $this->msj;
    }
  }

  /**
   *
   * @param type $sentencia
   * @param type $valores
   * @return array con las filas de la consulta
   */
  public function seleccionar($sentencia, $valores=null):array {
    $resultado = [];



    return $resultado;
  }

  function getCon() {
    return $this->con;
  }

  function get_database() {
    return $this->database;
  }

  function getUser() {
    return $this->user;
  }

  function getPass() {
    return $this->pass;
  }

  function getHost() {
    return $this->host;
  }

  function setCon($conexion) {
    $this->con = $conexion;
  }


  //PAra seleccionar una base de datos u otra
  public function usar_BD($param=null, $conexion=null) {
  }

  /**
   * Retorna un array indexado con los nombres de las bases de datos
   */
  public function selecionar_bases_datos():array {

  }

  /**
   * Retorna un array con los campos de una tabla
   */
  public function campos($tabla):array {


  }

  public function __toString() {
    echo "<h3>Visualizando la conexión a la BD</h3>";
    echo "<h4>host: $this->host user : $this->user pass: $this->pass</h4> ";
    var_dump($this->con);
    echo "<hr/>";
    return "";
  }

  /**
   * En PDO
   */
  public function cerrarDB() {
    $this->con = null;
  }

}
