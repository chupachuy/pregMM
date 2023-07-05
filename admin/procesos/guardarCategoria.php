<?php
include('../utilidades/conexion.php');

	if (empty($_POST['categoria'])){
		echo "<script>alert('Los campos deben estar llenos')</script>";
	    }
	else 
	{
	$categoria= $_POST['categoria'];
	$consulta = "insert into categoria (categoria) values('".$categoria."');";
	$resultado = mysqli_query( $con, $consulta);

	if ($resultado == 1) {
	echo "<script>alert('Categoria agregada correctamente');</script>";
	echo "<script>window.location.href = '../categorias.php';</script>";
   }
   else {
	echo "<script>alert('Error al agregar la Categoria');</script>";
	echo "<script>window.location.href = '../categorias.php';</script>";
   }
}
?>