<?php
session_start();
include 'conexion.php';
if(isset($_POST['login'])){
	$usuario = $_POST['usuario'];
	$pw =md5($_POST['pass']);
	$log = mysqli_query($con, "SELECT * FROM login WHERE username='$usuario' AND password='$pw'");
	if (mysqli_num_rows($log)>0) {
		$row = mysqli_fetch_array($log);
    print_r($row);
		$_SESSION["username"] = $row['username'];
		$_SESSION["level"] = $row['level'];

    if($_SESSION["level"] == 2){
            echo '<script> swal({title:"Bienvenidos al Sistema.", icon: "success", button: "¡Listo!"});</script>';
            echo '<script> window.location="../principal.php"; </script>';
    }else{
         echo '<script> alert("Usuario publico.");</script>';
         echo '<script> window.location="../index.php"; </script>';
    }
  }else{
  echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
  echo '<script> window.location="../index.php"; </script>';
  }
}

?>