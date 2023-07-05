<?php
include('funciones/db.php');

if(isset($_POST["retar"])){ 
	$idRetador = $_POST["jugadorUno"];
	$idRetado = $_POST["jugadorDos"];
	$estatus = $_POST["estatus"];

	$sql = "INSERT INTO desafios (id_jugador1, id_jugador2, status) VALUES (".$idRetador.", '".$idRetado."', '".$estatus."')";
	$guardar = mysqli_query($conexion,$sql);

	if($guardar){
		echo "<script>alert('Hemos creado un desafio') </script>";
		echo '<script> window.location="retarcompanero.php";</script>'; 
	}
}	
else{
	echo "<script>alert('Error al crear el desafio')</script>";
	echo '<script> window.location="retarcompanero.php";</script>';  
}




?>