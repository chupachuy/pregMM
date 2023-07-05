<?php
include('../utilidades/conexion.php');

if(isset($_POST["enviarEliminacion"])){ 
	$id = $_POST["idrespuesta"];

	$sql = "Delete from respuestas where id_respuesta = $id";
			    if(mysqli_query($con, $sql)){
			   echo "<script>alert('Hemos eliminado tu respuesta') </script>";
			   echo '<script> window.location="../respuestas.php";</script>'; 
			    }
			    else{
			      echo "<script>alert('Error al eliminar la respuesta')</script>";
			      echo '<script> window.location="../respuestas.php";</script>';  
			    }		

  }
  else{
  	echo "<script>alert('Error borrar la respuesta. Intente de nuevos')</script>";
  }
?>