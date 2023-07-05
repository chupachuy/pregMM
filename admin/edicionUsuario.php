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
            Administración
            <small>Ruleta</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Edicion Usuario</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <?php

            if(isset($_POST["editarUsuario"])){ 
              $nombre = $_POST["nombre"];
              $user = $_POST["username"];
              $pass = $_POST["pass"];
              $nivel = $_POST["nivel"];
              $idlogin = $_POST["idlogin"];
              $puntos = $_POST['puntos'];
              $estado = $_POST['estado'];
              $id = $_POST['id'];
              $activo = $_POST['activo'];

            }
            ?>
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b style="color:green;">Modificación de Datos del Usuario<b></font></font></h3>
                    <div  class="box-body">
                     <form method="post" action="procesos/recibirEdicionUsuario.php" enctype="multipart/form-data">
                      <!-- <input type="hidden" name="idpregunta" value="<?php echo $idpregunta; ?>"> -->

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre Completo:</font></font></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                        </div> 
                      </div>

                      <input type="hidden" name="idlogin" value="<?php echo $idlogin; ?>">

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre de Usuario:</font></font></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="username" value="<?php echo $user; ?>">
                        </div> 
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contraseña:</font></font></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="pass" value="<?php echo $pass; ?>">
                        </div> 
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Puntaje:</font></font></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="puntos" value="<?php echo $puntos; ?>">
                        </div> 
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Activo:</font></font></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="estado" value="<?php echo $estado; ?>" disabled>
                        </div> 
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Participación:</font></font></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="id" value="<?php echo $id; ?>" disabled>
                        </div> 
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Turno:</font></font></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="activo" value="<?php echo $activo; ?>" >
                        </div> 
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nivel:</font></font></label>
                        <div class="col-sm-10">
                          <select class="form-control" name="nivel">
                            <?php
                            if ($nivel==1) {
                              echo "<option selected value='1'>Usuario Basico</option>";
                              echo "<option value='2'>Administrador</option>";
                            }
                            else{
                             echo "<option value='1'>Usuario Basico</option>";
                             echo "<option value='2' selected>Administrador</option>";
                           }
                           ?>
                         </select>
                       </div> 
                     </div>

                     <button type="submit" name="enviarEdicionUsuario" class="btn btn-success">Modificar Datos</button>                                            
                   </form>                    
                 </div></div></div>
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