<?php
include('../utilidades/conexion.php');

if(isset($_POST["enviarEliminacion"])){ 
	$id = $_POST["idlogin"];

	$sql = "Delete from login where id_login = $id";
			    if(mysqli_query($con, $sql)){
			   echo "<script>alert('Hemos eliminado el usuario') </script>";
			   echo '<script> window.location="../usuarios.php";</script>'; 
			    }
			    else{
			      echo "<script>alert('Error al eliminar el usuario')</script>";
			      echo '<script> window.location="../usuarios.php";</script>';  
			    }		

  }
  else{
  	echo "<script>alert('Error al borrar el usuario. Intente de nuevos')</script>";
  }
?>