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
<!--       <section class="content-header">
        <h1>
          Gestion de Categorias
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">Categorias</li>
        </ol>
      </section> -->

      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
           
            
            <section class="content">
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Agregar Categoria</button><br><br>


             <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header" style="background:#3c8dbc; color:white;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><b>Agregar Categoria a la Ruleta</b></h4>
                    </div>
                    <div class="modal-body">
                      <div class="box-body">
                        <form action="procesos/guardarCategoria.php" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Categoria</font></font></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="categoria" required="true">
                            </div>
                          </div>
                    <!--       <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Color</font></font></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" value="#0088cc" name="color2" id="c2"/>
                              
                            </div>
                          </div> -->
                          

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
                    <th width="50" style="text-align: center">Categoría</th>
                    <th width="50" style="text-align: center">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 include('utilidades/conexion.php');
                 $registro = mysqli_query($con, "select * from categoria");
                 if(mysqli_num_rows($registro)>0){
                  while($registro2 = mysqli_fetch_array($registro)){
                    $idcategoria = $registro2['id_categoria'];
                    $categoria = $registro2['categoria'];
                    echo '<tr>
                    <td style="text-align: center">'.utf8_encode($categoria).'</td>
                    <td>
                    <div class="row">
                    <div class="col-md-6">
                    <form action="edicionCategoria.php" method="post" style="text-align: center">
                    <input type="hidden" name="categoria" value="'.$categoria.'">
                    <input type="hidden" name="idcategoria" value="'.$idcategoria.'">
                    <button name="editarCategoria" type="submit" class="btn btn-info"><i class="fas fa-pencil"></i></button>
                    </form>
                    </div>
                    <div class="col-md-6">
                    <form action="procesos/recibirEliminacionCategoria.php" method="post" onsubmit="return confirmation()">
                    <input type="hidden" name="idcategoria" value="'.$idcategoria.'">
                    <button type="submit" name="enviarEliminacion" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                    </div>
                    </div>
                    

                    </td>
                    </tr>';
                  }
                }else{
                  echo '<tr>
                  <td colspan="2">No se encontraron resultados</td>
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
<script type="text/javascript" src="colorpicker/jquery.minicolors.js"></script>
<link href="colorpicker/jquery.minicolors.css" rel="stylesheet" type="text/css" />

<script>
 $(document).ready(function() {
  $('#ejemplo').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>

<script>
 $('#c0').minicolors({ inline:true});
 $('#c1').minicolors();
 $('#c2').minicolors({ animationEasing: 'swing'});
 $('#c3').minicolors({format: 'rgb'});

</script>

</body>
</html>
<?php
}else{
  echo '<script> window.location="index.php"; </script>';
}
?>