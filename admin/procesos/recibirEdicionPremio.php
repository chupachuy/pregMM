<?php
include('../utilidades/conexion.php');

if(isset($_POST["enviarEdicionPremio"])){ 
	$idpremio = $_POST["idpremio"];
	$premio = $_POST["premio"];
	$dificultad = $_POST["dificultad"];
	$stock = $_POST["stock"];

	$sql = "update premios set premio ='$premio', dificultad='$dificultad', stock='$stock' where id_premio = '$idpremio'";
    $guardar = mysqli_query($con,$sql);

			    if($guardar){
			   echo "<script>alert('Hemos modificado tu Premio') </script>";
				echo '<script> window.location="../premios.php";</script>'; 
			         }
			         else{
			      echo "<script>alert('Error al modificar el Premio')</script>";
			      echo '<script> window.location="../premios.php";</script>';  
			     }
    }	
  else{
  	echo "<script>alert('Error editar el premio')</script>";
  	echo '<script> window.location="../premios.php";</script>'; 
  }
		


?>