<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Preguntados | Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <script src="js/sweetalert2.js"></script>
  <link href="css/sweetalert2.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box">

    <!-- /.login-logo -->
    <div class="login-box-body">
      <div class="login-logo"> 
        <img src="https://vignette.wikia.nocookie.net/preguntados-juego/images/6/6c/PreguntadosIcono.png/revision/latest?cb=20171106215732&path-prefix=es" width="100" height="100">
        <a href="#"><b>Preguntados</b></a>
      </div>

      <p class="login-box-msg">Introduce tus datos de acceso</p>

      <form action="utilidades/validarLogin.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="usuario" placeholder="Usuario">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="pass" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Entrar</button>
            <a href='../login.php'>Usuario</a>
          </div>
          <!-- /.col -->
        </div>
      </form>



    </div>
    <!-- /.login-box-body -->
  </div>

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- <script src="plugins/iCheck/icheck.min.js"></script> -->
  <script>
    // $(function () {
    //   $('input').iCheck({
    //     checkboxClass: 'icheckbox_square-blue',
    //     radioClass: 'iradio_square-blue',
    //     increaseArea: '20%' /* optional */
    //   });
    // });
  </script>
</body>
</html>
