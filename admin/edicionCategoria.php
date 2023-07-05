<?php
session_start();
include("utilidades/conexion.php");
if(isset($_SESSION['username']))
 {?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel de Administracion / Edicion</title>
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
        Administracion
        <small>Ruleta</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Edicion Categoria</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
          <?php
          if(isset($_POST["editarCategoria"])){ 
            $idcategoria = $_POST["idcategoria"];
            $categoria = $_POST["categoria"];
          }
          ?>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b style="color:green;">Modificacion de Datos de la Respuesta<b></font></font></h3>
              <div  class="box-body">
                   <form method="post" action="procesos/recibirEdicionCategoria.php" enctype="multipart/form-data">
                    <!-- <input type="hidden" name="idpregunta" value="<?php echo $idpregunta; ?>"> -->
 
                         <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Categoria:</font></font></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="categoria" value="<?php echo $categoria; ?>">
                            </div> 
                        </div>
                                <input type="hidden" name="idcategoria" value="<?php echo $idcategoria; ?>">

                        <button type="submit" name="enviarEdicionCategoria" class="btn btn-success">Modificar Datos</button>                                            
                        </form>                    
            </div></div></div>
      </div>

    </section>
  </div>
   <?php include('includes/footer.php'); ?>
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