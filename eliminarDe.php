<?php
include('funciones/db.php');

if(isset($_POST["eliminado"])){ 
	
		

		$id= $_POST['id'];
		$consulta = "DELETE FROM desafios WHERE id = ".$id;
		$resultado = mysqli_query( $conexion, $consulta );
		
		if ($resultado){
			echo '<script> alert("OK Eliminado")</script>'; 
			echo '<script> window.location="retarcompanero.php";</script>'; 
		}
		else {
			echo "<script>alert('Error','Ooops! Algo ha salido mal','error')</script>";
		}
		mysqli_close( $conexion );
	
  }
  else{
  	echo "<script>alert('Error al borrar el usuario. Intente de nuevos')</script>";
  }


?>