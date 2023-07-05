<?php
include('../utilidades/conexion.php');


if (empty($_POST['categoria'])||empty($_POST['pregunta'])||empty($_POST['correcta'])||empty($_POST['opcion1'])||empty($_POST['opcion2']) ||empty($_POST['opcion3'])){
	echo "<script>alert('Los campos deben estar llenos')</script>";
	echo "<script>window.location.href = '../preguntas.php';</script>";
}

else 
{
	$id_cat =  $_POST['categoria'];
	$pregunta = $_POST['pregunta'];
	$dificultad = $_POST['dificultad'];
	$correcta =  $_POST['correcta'];
	$opcion1 =  $_POST['opcion1'];
	$opcion2 =  $_POST['opcion2'];
	$opcion3 =  $_POST['opcion3'];

	//Guardando la imagen
	$rutaservidor='../../img';
	$rutatemporal=$_FILES['foto']['tmp_name'];
	$nombrefoto=$_FILES['foto']['name'];
	$tipo = $_FILES['foto']['type'];
	$rutadestino=$rutaservidor.'/'.$nombrefoto;
	$rutafinal = substr($rutadestino, 6);
	move_uploaded_file($rutatemporal, $rutadestino);

	$consulta = "insert into preguntas (id_categoria, pregunta, dificultad, img, vio) values (".$id_cat.", '".utf8_decode($pregunta)."','".$dificultad."', '".$rutafinal."', '[0]')";
	$resultado = mysqli_query( $con, $consulta );

	$consulta2 = "insert into respuestas (respuesta, correcta, id_pregunta) values('".utf8_decode($correcta)."', 1, (select max(id_pregunta) from preguntas));";
	$resultado2 = mysqli_query( $con, $consulta2 );

	$consulta3 = "insert into respuestas (respuesta, correcta, id_pregunta) values('".utf8_decode($opcion1)."', 0, (select max(id_pregunta) from preguntas));";
	$resultado3 = mysqli_query( $con, $consulta3 );

	$consulta4 = "insert into respuestas (respuesta, correcta, id_pregunta) values('".utf8_decode($opcion2)."', 0, (select max(id_pregunta) from preguntas));";
	$resultado4 = mysqli_query( $con, $consulta4 );

	$consulta5 = "insert into respuestas (respuesta, correcta, id_pregunta) values('".utf8_decode($opcion3)."', 0, (select max(id_pregunta) from preguntas));";
	$resultado5 = mysqli_query( $con, $consulta5 );

	if ($resultado5 == 1) {
		echo "<script>alert('Pregunta agregada correctamente');</script>";
		echo "<script>window.location.href = '../preguntas.php';</script>";
	}
}
?>