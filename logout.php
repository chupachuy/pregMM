<?php
require 'funciones/db.php';
   session_start();
   
   $sqlupd = "UPDATE login SET status = 0 WHERE id_login = ".$_SESSION['id_login'];
   $resultupd = mysqli_query($conexion, $sqlupd);
   if(session_destroy()) {
      $user_check = $_SESSION['login_user'];
      // echo "<script>alert('Cerrado' )</script>";
      // $ses_sql1 = mysqli_query($conexion,"update login set status = 0 WHERE username = $user_check'");
      echo '<script> window.location="login.php"; </script>';
   }
?>