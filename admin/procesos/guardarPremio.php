<?php
include('../utilidades/conexion.php');
	if (empty($_POST['premio'])||empty($_POST['stock'])||empty($_POST['dificultad'])){
		echo "<script>alert('Los campos deben estar llenos')</script>";
		echo "<script>window.location.href = '../premios.php';</script>";
	    }
	else 
	{
		$premio =  $_POST['premio'];
		$dificultad = $_POST['dificultad'];
		$stock = $_POST['stock'];


		$consulta = "insert into premios (premio, dificultad, stock) values('".$premio."','".$dificultad."','".$stock."');";
		$resultado = mysqli_query( $con, $consulta);

		if ($resultado == 1) {
		echo "<script>alert('Premio agregado correctamente');</script>";
		echo "<script>window.location.href = '../premios.php';</script>";
	   }
	    else {
		echo "<script>alert('Error al agregar el premio');</script>";
		echo "<script>window.location.href = '../premios.php';</script>";
        }
    }
?>