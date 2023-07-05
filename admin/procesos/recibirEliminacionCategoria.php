<?php
include('../utilidades/conexion.php');

if(isset($_POST["enviarEliminacion"])){ 
	$id = $_POST["idcategoria"];

	$sql = "Delete from categoria where id_categoria = $id";
			    if(mysqli_query($con, $sql)){
			   echo "<script>alert('Hemos eliminado tu categoria') </script>";
			   echo '<script> window.location="../categorias.php";</script>'; 
			    }
			    else{
			      echo "<script>alert('Error al eliminar la categoria')</script>";
			      echo '<script> window.location="../categorias.php";</script>';  
			    }		

  }
  else{
  	echo "<script>alert('Error borrar la categoria. Intente de nuevos')</script>";
  }
?>