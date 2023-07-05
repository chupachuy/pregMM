<?php	
error_reporting(E_ALL);
ini_set('display_errors', '1');

	// Datos de la base de datos
$usuario = "eltacowe_preguntados_adm";
$password = "bdPre.00///11__22";
$servidor = "localhost";
$basededatos = "eltacowe_preguntados";

$con = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");

$db = mysqli_select_db( $con, $basededatos ) or die ( "Upps! No se ha podido conectar a la base de datos" );