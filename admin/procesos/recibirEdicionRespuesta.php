<?php
include('../utilidades/conexion.php');

if(isset($_POST["enviarEdicionRespuesta"])){ 
	$idpregunta = $_POST["idpregunta"];
	$idrespuesta = $_POST["idrespuesta"];
	$respuesta = $_POST["respuesta"];
	$correcta = $_POST["correcta"];

	$respuesta_r = utf8_decode($respuesta); 

	$sql = "update respuestas set respuesta ='$respuesta_r', correcta='$correcta', id_pregunta='$idpregunta' where id_respuesta = '$idrespuesta'";
    $guardar = mysqli_query($con,$sql);

			    if($guardar){
			   echo "<script>alert('Hemos modificado tu Respuesta') </script>";
				echo '<script> window.location="../respuestas.php";</script>'; 
			         }
			         else{
			      echo "<script>alert('Error al modificar la respuesta')</script>";
			      echo '<script> window.location="../respuestas.php";</script>';  
			     }
    }	
  else{
  	echo "<script>alert('Error editar la pregunta')</script>";
  	echo '<script> window.location="../respuestas.php";</script>'; 
  }
		


?>