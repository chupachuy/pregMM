<?php
include('../utilidades/conexion.php');

if(isset($_POST["enviarEdicionUsuario"])){ 
	$idlogin = $_POST["idlogin"];
	$nombre = $_POST["nombre"];
	$user = $_POST["username"];
	$pass = $_POST["pass"];
	$nivel = $_POST["nivel"];
	$puntos = $_POST['puntos'];
	// $estado = $_POST['estado'];
	$activo = $_POST['activo'];

	$nombre_n = utf8_decode($nombre);

	$sql = "update login set username ='$user', password='md5($pass)', level='$nivel' , nombre='$nombre_n', Puntaje='$puntos', turno='$activo' where id_login = '$idlogin'";
	$guardar = mysqli_query($con,$sql);

	if($guardar){
		echo "<script>alert('Hemos modificado el usuario') </script>";
		echo '<script> window.location="../usuarios.php";</script>'; 
	}
	else{
		echo "<script>alert('Error al modificar el usuario')</script>";
		echo '<script> window.location="../usuarios.php";</script>';  
	}
}	
else{
	echo "<script>alert('Error modificar el usuario')</script>";
	echo '<script> window.location="../usuarios.php";</script>'; 
}



?>