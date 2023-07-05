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
  <body class="hold-transition skin-blue sidebar-mini" id="body">
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
        Gestion de Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Usuarios</li>
      </ol>
    </section> -->

    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">


          <section class="content">
           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Agregar Usuario</button>
           <button type="button" class="btn btn-primary" onclick="Reinicio()">Reiniciar Usuario</button><br><br>

           <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" style="background:#3c8dbc; color:white;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b>Agregar Usuario</b></h4>
                  </div>
                  <div class="modal-body">
                    <div class="box-body">
                      <form action="procesos/guardarUsuario.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombres</font></font></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="nombre" required="true">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Usuario</font></font></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="usuario" required="true">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Password</font></font></label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" name="pass" required="true">
                            <input type="hidden" class="form-control" name="avatar" required="true" value="null">

                          </div>
                        </div>
                       
                       
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nivel</font></font></label>

                          <div class="col-sm-10">
                            <select class="form-control" name="nivel" required="true">
                             <option value="1">Usuario Basico</option>
                             <option value="2">Administrador</option>
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
                <th width="50" style="text-align: center">Nombre</th>
                <th width="100" style="text-align: center">Usuario</th>
                <th width="100" style="text-align: center">Contraseña</th>
                <th width="100" style="text-align: center">Puntaje</th>
                <th width="100" style="text-align: center">Activo</th>
                <th width="100" style="text-align: center">*</th>
                <th width="100" style="text-align: center">Turno</th>
                <th width="100" style="text-align: center">Nivel</th>
                <th width="50" style="text-align: center">Opciones</th>
              </tr>
            </thead>
            <tbody>
             <?php
             include('utilidades/conexion.php');
             $registro = mysqli_query($con, "select * from login");
             if(mysqli_num_rows($registro)>0){
              while($registro2 = mysqli_fetch_array($registro)){
                $idlogin = $registro2['id_login'];
                $username = $registro2['username'];
                $pass = $registro2['password'];
                $nivel = $registro2['level'];
                $nombreCompleto = $registro2['nombre'];
                $puntos = $registro2['Puntaje'];
                $estado = $registro2['status'];
                $id = $registro2['id_turno'];
                $activo = $registro2['turno'];
                $tiempo = $registro2['tiempo'];
                echo '<tr>
                <td style="text-align: center">'.$nombreCompleto.'</td>
                <td style="text-align: center">'.$username.'</td>
                <td style="text-align: center">'.$pass.'</td>
                <td style="text-align: center">'.$puntos.'</td>
                <td style="text-align: center">'.$estado.'</td>
                <td style="text-align: center">'.$id.'</td>
                <td style="text-align: center">'.$activo.'</td>
                <td style="text-align: center">'.$tiempo.'</td>'?>
                <?php
                if ($nivel==1) {
                  echo'<td style="text-align: center"><span class="label label-success">Usuario</span></td>';        
                }

                else{
                  echo'<td style="text-align: center"><span class="label label-danger">Administrador</span></td>';    
                }


                ?>

                <?php echo' <td>
                <div class="row">
                <div class="col-md-6">
                <form action="edicionUsuario.php" method="post">
                <input type="hidden" name="nombre" value="'.$nombreCompleto.'">
                <input type="hidden" name="username" value="'.$username.'">
                <input type="hidden" name="pass" value="'.$pass.'">
                <input type="hidden" name="nivel" value="'.$nivel.'">
                <input type="hidden" name="idlogin" value="'.$idlogin.'">
                <input type="hidden" name="puntos" value="'.$puntos.'">
                <input type="hidden" name="estado" value="'.$estado.'">
                <input type="hidden" name="id" value="'.$id.'">
                <input type="hidden" name="activo" value="'.$activo.'">

                <button name="editarUsuario" type="submit" class="btn btn-info"><i class="fas fa-pencil"></i></button>
                </form>
                </div>
                <div class="col-md-6">
                <form action="procesos/recibirEliminacionUsuario.php" method="post" onsubmit="return confirmation()">
                <input type="hidden" name="idlogin" value="'.$idlogin.'">
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
    </div> </div> </div><br><br><br><br><br><br>

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


  function Reinicio(){

    $(document).ready(function(){

      $.ajax({
        data:  'reinicio_u',
        url:   '../funciones/funciones.php',
        type:  'post',
        beforeSend: function () { },
        success:  function (response) {                
                // $(html).html(response);
                window.location.reload();
              },
              error:function(){
                // alert("error")
              }
            });
    })
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