<?php
include('../utilidades/conexion.php');

if(isset($_POST["enviarEliminacion"])){ 
	$id = $_POST["idpregunta"];
	$imagen = $_POST["imagen"];

	$sql = "Delete from preguntas where id_pregunta = $id";
	if(mysqli_query($con, $sql)){
		echo "<script>alert('Hemos eliminado tu pregunta') </script>";
		echo '<script> window.location="../preguntas.php";</script>'; 
		unlink("../../img/".$imagen);
	}
	else{
		echo "<script>alert('Error al eliminar articulo')</script>";
		echo '<script> window.location="../preguntas.php";</script>';  
	}		

}
else{
	echo "<script>alert('Error borrar la pregunta')</script>";
}

?>