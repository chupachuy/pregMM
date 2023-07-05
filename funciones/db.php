<?php	
error_reporting(E_ALL);
ini_set('display_errors', '1');
	// Datos de la base de datos
$usuario = "";
$password = "";
$servidor = "localhost";
$basededatos = "";

	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");

	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! No se ha podido conectar a la base de datos" );
