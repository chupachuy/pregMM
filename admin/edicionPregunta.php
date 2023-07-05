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
          <span class="logo-mini"><b>Preguntados</span>
            <span class="logo-lg"><b>Preguntados</span>
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
                <li class="active">Edicion Pregunta</li>
              </ol>
            </section>
            <section class="content">
              <div class="row">
                <?php
                if(isset($_POST["editarPregunta"])){ 
                  $idpregunta = $_POST["idpregunta"];
                  $categoria = $_POST["categoria"];
                  $dificultad = $_POST["dificultad"];
                  $pregunta = $_POST["pregunta"];
                  $visto = $_POST["visto"];
                  $foto = $_POST['imagen'];
                  $imagen = "src='../".$foto."'";

                }
                ?>
                <div class="col-md-7">
                  <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b style="color:green;">Modificacion de Datos de la Pregunta<b></font></font></h3>
                        <div  class="box-body">
                         <form method="post" action="procesos/recibirEdicionPregunta.php" enctype="multipart/form-data">
                          <input type="hidden" name="idpregunta" value="<?php echo $idpregunta; ?>">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Categoria:</font></font></label>
                            <div class="col-sm-5">
                             <?php 
                             $consulta1="select categoria from categoria where categoria like '%$categoria'";
                             $categoria=mysqli_query($con, $consulta1);
                             $fila=mysqli_fetch_row($categoria);
                             $descripcion = $fila['0'];
                             
                             ?>
                             <input type="text" class="form-control" name="categoria" value="<?php echo $descripcion; ?>" disabled>
                           </div> 
                           <div class="col-sm-5">
                            <select class="form-control" name="comboCategoria">
                             <?php 
                             $consulta1="select id_categoria, categoria from categoria";
                             $categoria=mysqli_query($con, $consulta1);
                             while($fila=mysqli_fetch_row($categoria)){
                              echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                            }
                            ?>
                            
                          </select>
                        </div> 
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pregunta:</font></font></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="pregunta" value="<?php echo $pregunta; ?>">
                        </div> 
                      </div>



                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dificultad:</font></font></label>
                        <div class="col-sm-10">
                          <select class="form-control" name="dificultad">
                            <?php
                            if ($dificultad==0) {
                              echo "<option selected value='0'>Facil</option>";
                              echo "<option value='1'>Intermedio</option>";
                              echo "<option value='2'>Dificil</option>";
                            }
                            elseif ($dificultad==1){
                             echo "<option value='0'>Facil</option>";
                             echo "<option selected value='1'>Intermedio</option>";
                             echo "<option value='2'>Dificil</option>";
                           }
                           else{
                            echo "<option value='0'>Facil</option>";
                            echo "<option value='1'>Intermedio</option>";
                            echo "<option selected value='2'>Dificil</option>";
                          }
                          ?>
                        </select>
                      </div> 
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Imagen:</font></font></label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="foto">
                      </div> 
                      <input type="hidden" name="idImagen" value="<?php echo $imagen;?>">
                    </div>
                    
                    <button type="submit" name="enviarEdicionPregunta" class="btn btn-success">Modificar</button>  
                    <a href="preguntas.php"> <button class="btn btn-danger">Regresar</button></a>                                          
                  </form>                    
                </div></div></div>
              </div>


              <div class="col-md-3">
                <div class="box">
                  <div class="box-header with-border">
                    <!-- <h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Foto del Articulo</font></font></h3> -->
                    <div  class="box-body">
                      <?php 
                      $consulta1="select img from preguntas where id_pregunta = $idpregunta";
                      $pregunta=mysqli_query($con, $consulta1);
                      $fila=mysqli_fetch_row($pregunta);
                      $img = $fila['0'];
                      
                      ?>
                      <img style="width: 200px; height: 200px;" src="../<?php echo $img; ?>">
                      
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