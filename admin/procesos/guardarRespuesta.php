<?php
include('../utilidades/conexion.php');


	if (empty($_POST['pregunta'])||empty($_POST['respuesta'])){
		echo "<script>alert('Los campos deben estar llenos')</script>";
	    }

	else 
	{
		$pregunta =  $_POST['pregunta'];
		$respuesta = $_POST['respuesta'];
		$correcta = $_POST['correcta'];


		$consulta = "insert into respuestas (respuesta, correcta, id_pregunta) values('".$respuesta."','".$correcta."','".$pregunta."');";
		$resultado = mysqli_query( $con, $consulta);

		if ($resultado == 1) {
		echo "<script>alert('Respuesta agregada correctamente');</script>";
		echo "<script>window.location.href = '../respuestas.php';</script>";
	   }
	    else {
		echo "<script>alert('Error al agregar la Respuesta');</script>";
		echo "<script>window.location.href = '../respuestas.php';</script>";
        }
    }
?>