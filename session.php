<?php
require 'funciones/db.php';
session_start();
$inactive = 2000;

if (isset($_SESSION["timeout"])) {
	
	$sessionTTL = time() - $_SESSION["timeout"];
	
	if ($sessionTTL > $inactive) {
		session_destroy();
		header("Location: logout.php");
	}
}
if ( !isset($_SESSION['id_login']) ) {
	header("location: login.php");
}
$_SESSION["timeout"] = time();
$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($conexion,"select username, id_login, id_turno from login where username = '$user_check' ");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['username'];
$idLogin = $row['id_login'];
$idTurno = $row['id_turno'];
if(!isset($_SESSION['login_user'])) {
	header("location:login.php");
}

$nom = "select id_login, nombre, avatar from login where username='$user_check'";
$usuarios3 = mysqli_query($conexion, $nom);
$usuario =  mysqli_fetch_array($usuarios3);
$nombre = $usuario['nombre'];
$avatar = $usuario['avatar'];
$idLogin = $usuario['id_login'];



?>
