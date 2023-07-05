<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel de Administracion</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include('includes/librerias.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="principal.php" class="logo">
      <span class="logo-mini"><b>Tienda</b>Ropa</span>
      <span class="logo-lg"><b>Tienda</b>Ropa</span>
    </a>
  <?php include('includes/menu.php'); ?>
  </header>
  <?php include('includes/menuLateral.php'); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administracion
        <small>Tienda Ropa</small>
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
            <span class="info-box-icon bg-aqua"><i class="fa fa-dropbox"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Articulos</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Usuarios</span>
              <span class="info-box-number">41,410</span>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Ventas</span>
              <span class="info-box-number">760</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-globe"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Visitas</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-database"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Backups</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-comment"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Mensajes</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div>


      </div>
    </section>
  </div>
   <?php include('includes/footer.php'); ?>
  <div class="control-sidebar-bg"></div>
</div>
 <?php include('includes/javascript.php'); ?>
</body>
</html>