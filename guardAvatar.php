<?php

include('funciones/db.php');
include('session.php');

$consultaQ = 'UPDATE login SET avatar = "'.$_POST['dir'].'" WHERE id_login = '.$idLogin;
$resultadoAva = mysqli_query( $conexion, $consultaQ );
if ( $resultadoAva = mysqli_query( $conexion, $consultaQ ) ) {
	echo 1;
}else{
	echo 0;
}


?>