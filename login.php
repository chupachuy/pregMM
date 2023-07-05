<?php
include("funciones/db.php");
session_start();
error_reporting(0);
if( $_SESSION['id_login'] ){
 header("location: principal.php");
}else{
  // header("location: login.php");
}
$error = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {

  $myusername = mysqli_real_escape_string($conexion,$_POST['username']);
  $mypassword = mysqli_real_escape_string($conexion,md5($_POST['password']));

  $sql = "SELECT id_login, level, id_turno FROM login WHERE username = '$myusername' and password = '$mypassword'";
  $result = mysqli_query($conexion, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $type = $row['level'];
  $idLogin = $row['id_login'];
  $idTurno = $row['id_turno'];

  $count = mysqli_num_rows($result);

      // Si el resultado coincide con $myusername y $mypassword, la fila de la tabla debe ser 1 fila

  if($count == 1) {
   $_SESSION['login_user'] = $myusername;
   $_SESSION['nivel'] = $type;
   $_SESSION['id_login'] = $idLogin;
   $_SESSION['id_turno'] = $idTurno;
   $sqlupd = "UPDATE login SET status = 1 WHERE id_login = ".$row['id_login'];
   $resultupd = mysqli_query($conexion, $sqlupd);
   if( $_SESSION['nivel'] == 1){
     header("location: principal.php");
   }else{
    $error = "<script>swal('Error','Ooops! Aquí no es ... :(','error')</script>";
  }
}
else {
 $error = "<script>swal('Error','Ooops! Algo ha salido mal :(','error')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/sweetalert2.js"></script>
  <link href="css/sweetalert2.css" rel="stylesheet" />
  <title>Preguntados</title>

  <!-- Font Awesome -->
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

  <!-- Boostrap v5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!--booostrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

  
  <!-- Clases personalizadas para Preguntados -->    
  <link href="css/preguntados.css" rel="stylesheet">

  <style>@import url('https://fonts.cdnfonts.com/css/nasalization-2');</style>


</head>

<body>
    <div class="login-page">
      <?php echo $error; ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="login col-lg-4 col-sm-6 col-10 d-flex justify-content-center align-items-center">
                    <form role="form" action="#" method="POST" class="row justify-content-center g-3">
                        <div class="col-12 text-center">
                          <br>
                          <p>SIM Conecta</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-4 logo-login">
                          <img src="img/Logo_35A-Blanco_Mediano.png">
                          <br><br>
                          <img src="img/prop01a.png">
                        </div>
                        <div class="col-12 text-center">
                          <p>iniciar sesión</p>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-11 text-center">
                            <p>Introduce tus datos de acceso</p>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                <input type="text" class="form-control" placeholder="Usuario"  name="username" autofocus>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-11">
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                <input type="password" class="form-control" name="password" placeholder="Contraseña" value="">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-11 button-submit">
                            <button type="submit" class="btn btn-lg btn-primary">Acceder</button>
                        </div>
                        <div class="col-12 text-center">
                          <p><a href="admin/principal.php">Administrador</a></p>
                          <br><br><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
  <!-- jS MDBOOSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
