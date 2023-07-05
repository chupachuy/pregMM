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
    <title>Panel de AdministraciÓn</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include('includes/librerias.php'); ?>
    <link rel="stylesheet" type="text/css" href="datatables/dataTables.bootstrap.min.css"/>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="principal.php" class="logo">
         <span class="logo-mini"><b>Ruleta</b></span>
         <span class="logo-lg"><b>Ruleta</b></span>
       </a>
       <?php include('includes/menu.php'); ?>
     </header>
     <?php include('includes/menuLateral.php'); ?>
     <div class="content-wrapper">
<!--       <section class="content-header">
        <h1>
          Gestion de Premios
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">Premios</li>
        </ol>
      </section> -->

      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <section class="content">
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Agregar Premio</button><br><br>
             <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header" style="background:#3c8dbc; color:white;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><b>Agregar Premio a la Ruleta</b></h4>
                    </div>
                    <div class="modal-body">
                      <div class="box-body">
                        <form action="procesos/guardarPremio.php" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Premio</font></font></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="premio" required="true">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dificultad</font></font></label>

                            <div class="col-sm-10">
                              <select class="form-control" name="dificultad" required="true">
                               <option value="0">Baja</option>
                               <option value="1">Intermedio</option>
                               <option value="2">Dificil</option>
                             </select>
                           </div>
                         </div>

                         <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Stock</font></font></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="stock" required="true">
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
                  <th width="50">Premio</th>
                  <th width="100">Dificultad</th>
                  <th width="100">Stock</th>
                  <th width="50">Opciones</th>
                </tr>
              </thead>
              <tbody>
               <?php
               include('utilidades/conexion.php');
               $registro = mysqli_query($con, "select * from premios");
               if(mysqli_num_rows($registro)>0){
                while($registro2 = mysqli_fetch_array($registro)){
                  $idpremio = $registro2['id_premio'];
                  $premio = $registro2['premio'];
                  $dificultad = $registro2['dificultad'];
                  $stock = $registro2['stock'];
                  echo '<tr>
                  <td style="text-align: center">'.$premio.'</td>'?>
                  <?php
                  if ($dificultad==0) {
                    echo'<td style="text-align: center"><span class="label label-success">'.$dificultad.'</span></td>';        
                  }
                  elseif($dificultad==0){
                    echo'<td style="text-align: center"><span class="label label-warning">'.$dificultad.'</span></td>';    
                  }
                  else{
                    echo'<td style="text-align: center"><span class="label label-danger">'.$dificultad.'</span></td>';    
                  }

                  ?>

                  <?php
                  if ($stock<10) {
                    echo'<td style="text-align: center"><span class="label label-danger">'.$stock.'</span></td>';        
                  }
                  else{
                    echo'<td style="text-align: center"><span class="label label-success">'.$stock.'</span></td>';    
                  }


                  ?>
                  <?php echo'
                  <td>
                  <div class="row">
                  <div class="col-md-6">
                  <form action="edicionPremio.php" method="post">
                  <input type="hidden" name="premio" value="'.$premio.'">
                  <input type="hidden" name="dificultad" value="'.$dificultad.'">
                  <input type="hidden" name="stock" value="'.$stock.'">
                  <input type="hidden" name="idpremio" value="'.$idpremio.'">

                  <button name="editarPremio" type="submit" class="btn btn-info"><i class="fas fa-pencil"></i></button>
                  </form>
                  </div>
                  <div class="col-md-6">
                  <form action="procesos/recibirEliminacionPremio.php" method="post" onsubmit="return confirmation()">
                  <input type="hidden" name="idpremio" value="'.$idpremio.'">
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
      </div> 
    </div> 
  </div>
</div>

<?php include('includes/footer.php'); ?>
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