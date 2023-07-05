<?php
include('../utilidades/conexion.php');

if(isset($_POST["enviarEliminacion"])){ 
	$id = $_POST["idpremio"];

	$sql = "Delete from premios where id_premio = $id";
			    if(mysqli_query($con, $sql)){
			   echo "<script>alert('Hemos eliminado tu premio') </script>";
			   echo '<script> window.location="../premios.php";</script>'; 
			         }
			         else{
			      echo "<script>alert('Error al eliminar el premio')</script>";
			     echo '<script> window.location="../premios.php";</script>';  
			     }		

  }
  else{
  	echo "<script>alert('Error borrar el premio')</script>";
  }
		


?>