<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('funciones/db.php');

	if (isset($_POST['enviarEdicion'])){

        $categoria= $_POST['categoria'];
        $idLogin= $_POST['idlogin'];
        $consulta = "update login set avatar='$categoria' where id_login='$idLogin';";
	    $resultado = mysqli_query($conexion,$consulta) or die ('Error: '. mysqli_error($conexion));
		
        if ($resultado) {
            echo "<script>alert('Categoria agregada correctamente');</script>";
            echo "<script>window.location.href = '../preguntados/crearAvatar.php';</script>";
           }
           else {
            echo "<script>alert('Error al agregar la Categoria');</script>";
            echo "<script>window.location.href = '../preguntados/crearAvatar.php';</script>";
           }
	    }else {

        echo "<script>alert('Error al agregar la Categoria');</script>";
	echo "<script>window.location.href = '../preguntados/crearAvatar.php';</script>";

        

	


	
}
?>