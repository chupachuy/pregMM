<?php
session_start();
include("utilidades/conexion.php");
if(isset($_SESSION['username']))
{
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Panel de Administración</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include('includes/librerias.php'); ?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="principal.php" class="logo">
          <span class="logo-mini"><b>Preguntados</b></span>
          <span class="logo-lg"><b>Preguntados</b></span>
        </a>
        <?php include('includes/menu.php'); ?>
      </header>
      <?php include('includes/menuLateral.php'); ?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Administración
            <small>Preguntados</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administracion</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-question-circle"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Preguntas</span>
                  <a href="preguntas.php">Ver tabla ...</a>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-comments"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Respuestas</span>
                  <a href="respuestas.php">Ver tabla ...</a>
                </div>
              </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-list-ol"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Categorias</span>
                  <a href="categorias.php">Ver tabla ...</a>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-gift"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Premios</span>
                  <a href="premios.php">Ver tabla ...</a>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Usuarios</span>
                  <a href="usuarios.php">Ver tabla ...</a>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa-solid fa-chart-pie"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Preguntados</span>
                  <a href="../index.php">Ir a Jugar</a>
                </div>
              </div>
            </div>

          </div>
          

        </section>

      </div>
      <!-- <?php include('includes/footer.php'); ?> -->
      <div class="control-sidebar-bg"></div>
    </div>
    <?php include('includes/javascript.php'); ?>
  </body>
  </html>
  <?php
}else{
  echo '<script> window.location="index.php"; </script>';
}
?>