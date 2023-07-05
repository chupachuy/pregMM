<?php
include('../utilidades/conexion.php');


	if (empty($_POST['nombre'])||empty($_POST['usuario'])||empty($_POST['pass'])){
		echo "<script>alert('Los campos deben estar llenos')</script>";
	    }

	else 
	{
		$nombre =  $_POST['nombre'];
		$usuario = $_POST['usuario'];
		$pass = $_POST['pass'];
		$nivel = $_POST['nivel'];
		$avatar = $_POST['avatar'];


		$consulta = "insert into login (username, password, avatar, level, nombre, Puntaje, status, id_turno, turno, Pts) values('".$usuario."','".md5($pass)."','".$avatar."','".$nivel."','".$nombre."', 0, 0, 0, 0, 0);";
		$resultado = mysqli_query( $con, $consulta);

		if ($resultado == 1) {
		echo "<script>alert('Usuario agregado correctamente');</script>";
		echo "<script>window.location.href = '../usuarios.php';</script>";
	   }
	    else {
		echo "<script>alert('Error al agregar el usuario');</script>";
		echo "<script>window.location.href = '../usuarios.php';</script>";
        }
    }
?>