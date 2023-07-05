<?php
include('../utilidades/conexion.php');

if(isset($_POST["enviarEdicionCategoria"])){ 
	$idcategoria = $_POST["idcategoria"];
	$categoria = $_POST["categoria"];

	$sql = "update categoria set categoria ='$categoria' where id_categoria = '$idcategoria'";
    $guardar = mysqli_query($con,$sql);

			    if($guardar){
			   echo "<script>alert('Hemos modificado tu Categoria') </script>";
				echo '<script> window.location="../categorias.php";</script>'; 
			         }
			         else{
			      echo "<script>alert('Error al modificar la categoria')</script>";
			      echo '<script> window.location="../categorias.php";</script>';  
			     }
    }	
  else{
  	echo "<script>alert('Error editar la categoria')</script>";
  	echo '<script> window.location="../categorias.php";</script>'; 
  }
		


?>