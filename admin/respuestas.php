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
    <title>Panel de Administracion</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include('includes/librerias.php'); ?>
    <link rel="stylesheet" type="text/css" href="datatables/dataTables.bootstrap.min.css"/>
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
  <!--     <section class="content-header">
        <h1>
          Gestión de Respuestas
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">Respuestas</li>
        </ol>
      </section> -->

      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">


            <section class="content">
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Agregar Respuesta</button><br><br>


             <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header" style="background:#3c8dbc; color:white;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><b>Agregar Respuesta a la Ruleta</b></h4>
                    </div>
                    <div class="modal-body">
                      <div class="box-body">
                        <form action="procesos/guardarRespuesta.php" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pregunta</font></font></label>
                            <div class="col-sm-10">
                              <select class="form-control" name="pregunta" required="true">
                               <?php 
                               $consulta1="select id_pregunta, pregunta from preguntas";
                               $pregunta=mysqli_query($con, $consulta1);
                               while($fila=mysqli_fetch_row($pregunta)){
                                echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Respuesta</font></font></label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="respuesta" required="true">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Correcta</font></font></label>
                          <div class="col-sm-10">
                            <select class="form-control" name="correcta" required="true">
                             <option value="1">Si</option>
                             <option value="0">No</option>
                           </select>
                         </div>
                       </div>

                     </div>
                   </div>
                   <div class="modal-footer">

                    <button type="submit" name="enviarArticulo" class="btn btn-success">Guardar</button>
                  </form>
                  <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

          <table class="table table-responsive table-bordered" id="ejemplo">                  
            <thead>
              <tr>
                <th width="50" style="text-align: center">Respuesta</th>
                <th width="100" style="text-align: center">Dificultad</th>
                <th width="100" style="text-align: center">Pregunta</th>
                <th width="100" style="text-align: center">Correcta</th>
                <th width="50" style="text-align: center">Opciones</th>
              </tr>
            </thead>
            <tbody>
             <?php
             include('utilidades/conexion.php');
             $registro = mysqli_query($con, "select * from respuestas");
             if(mysqli_num_rows($registro)>0){
              while($registro2 = mysqli_fetch_array($registro)){
                $idrespuesta = $registro2['id_respuesta'];
                $dificultad = $registro2['dificultad'];
                $respuesta = $registro2['respuesta'];
                $idpregunta = $registro2['id_pregunta'];
                $pregunta = $registro2['id_pregunta'];
                $correcta = $registro2['correcta'];
                echo '<tr>
                <td style="text-align: center">'.$respuesta.'</td>'?>
                <?php
                if ($dificultad==0) {
                  echo'<td style="text-align: center"><span class="label label-success">'.$dificultad.'</span></td>';        
                }
                elseif($dificultad==1){
                  echo'<td style="text-align: center"><span class="label label-warning">'.$dificultad.'</span></td>';    
                }
                else{
                  echo'<td style="text-align: center"><span class="label label-danger">'.$dificultad.'</span></td>';    
                }

                ?>

                <?php echo '
                <td>'.utf8_encode($pregunta).'</td>'?>
                <?php
                if ($correcta==1) {
                  echo'<td style="text-align: center"><span class="label label-success">'.$correcta.'</span></td>';        
                }
                else{
                  echo'<td style="text-align: center"><span class="label label-danger">'.$correcta.'</span></td>';    
                }

                ?>

                <?php 
                echo '<td>
                <div class="row">
                <div class="col-md-6">
                <form action="edicionRespuesta.php" method="post">
                <input type="hidden" name="pregunta" value="'.utf8_encode($pregunta).'">
                <input type="hidden" name="respuesta" value="'.utf8_encode($respuesta).'">
                <input type="hidden" name="correcta" value="'.$correcta.'">
                <input type="hidden" name="idpregunta" value="'.$idpregunta.'">
                <input type="hidden" name="idrespuesta" value="'.$idrespuesta.'">

                <button name="editarRespuesta" type="submit" class="btn btn-info"><i class="fas fa-pencil"></i></button>
                </form>
                </div>
                <div class="col-md-6">
                <form action="procesos/recibirEliminacionRespuesta.php" method="post" onsubmit="return confirmation()">
                <input type="hidden" name="idrespuesta" value="'.$idrespuesta.'">
                <button type="submit" name="enviarEliminacion" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
                </div>
                </div>

                </td>
                </tr>';
              }
            }else{
              echo '<tr>
              <td colspan="6">No se encontraron resultados</td>
              </tr>';
            }
            echo '</table>';
            ?>  
          </tbody>
        </table>

      </section>
    </div> </div> </div>

  </div>
  <!-- <?php include('includes/footer.php'); ?> -->
  <div class="control-sidebar-bg"></div>
</div>

<script type="text/javascript">
  function confirmation() {
    if(confirm("Realmente desea eliminar?"))
    {
      return true;
    }
    return false;
  }
</script>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="datatables/query.dataTables.min.js"></script> -->

<script>
 $(document).ready(function() {
  $('#ejemplo').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>
<?php include('includes/javascript.php'); ?>
</body>
</html>
<?php
}else{
  echo '<script> window.location="index.php"; </script>';
}
?>