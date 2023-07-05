<?php
include('../utilidades/conexion.php');

if(isset($_POST["enviarEdicionPregunta"])){ 
	$idpregunta = $_POST["idpregunta"];
	$categoria = $_POST["comboCategoria"];
	$dificultad = $_POST["dificultad"];
	$pregunta = $_POST["pregunta"];
	$visto = $_POST["visto"];
	$pregunta_p = utf8_decode($pregunta);
	// $idImagen = $_POST["idImagen"];
	
	$rutaservidor='../../img';
	$rutatemporal=$_FILES['foto']['tmp_name'];
	$nombrefoto=$_FILES['foto']['name'];
	$tipo = $_FILES['foto']['type'];
	$rutadestino=$rutaservidor.'/'.$nombrefoto;
	$rutafinal = substr($rutadestino, 6);
	move_uploaded_file($rutatemporal, $rutadestino);

	if($tipo=="image/png"||$tipo=="image/jpg"||$tipo=="image/jpeg") {
		$rutadestino=$rutaservidor.'/'.$nombrefoto;
		$rutafinal = substr($rutadestino, 6);
		move_uploaded_file($rutatemporal, $rutadestino);

	// $sql = "update preguntas set id_categoria = $categoria, pregunta='$pregunta_p', dificultad='$dificultad', vio='$visto' where id_pregunta = $idpregunta";
		$sql = "update preguntas set id_categoria = $categoria, pregunta='$pregunta_p', dificultad='$dificultad', img='$rutafinal', vio='$visto' where id_pregunta = $idpregunta";

		$guardar = mysqli_query($con,$sql);

		if($guardar){
			echo "<script>alert('Hemos modificado tu pregunta') </script>";
			echo '<script> window.location="../preguntas.php";</script>'; 
		}
		else{
			echo "<script>alert('Error al modificar la pregunta')</script>";
			echo '<script> window.location="../preguntas.php";</script>';  
		}
	}
	else{
		echo "<script>alert('Debes seleccionar un archivo de imagen') </script>";
		echo '<script> window.location="../preguntas.php";</script>'; 

	}

}
else{
	echo "<script>alert('Error editar el articulo. Debe seleccionar un archivo de imagen')</script>";
	echo '<script> window.location="../preguntas.php";</script>'; 
}



?>