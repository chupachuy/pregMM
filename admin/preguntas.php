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
    <title>Panel de Administración</title>
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
<!--         <section class="content-header">
          <h1>
            Gestión de Preguntas
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Preguntas</li>
          </ol>
        </section> -->

        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <section class="content">
               <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Agregar Pregunta</button>
                <button type="button" class="btn btn-primary" onclick="Reinicio_p();">Reiniciar Preguntas</button><br><br>
               <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header" style="background:#3c8dbc; color:white;">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><b>Agregar Pregunta a la Ruleta</b></h4>
                      </div>
                      <div class="modal-body">
                        <div class="box-body">
                          <form action="procesos/guardarPregunta.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Categoría</font></font></label>
                              <div class="col-sm-10">
                                <select class="form-control" name="categoria" required="true">
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
                            <label for="inputPassword3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pregunta</font></font></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="pregunta" required="true">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dificultad</font></font></label>
                            <div class="col-sm-10">
                             <select class="form-control" name="dificultad" style="width:100%;">
                               <option value="0">Fácil</option>
                               <option value="1">Intermedio</option>
                               <option value="2">Difícil</option>
                             </select>
                           </div>
                         </div>
                         <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Correcta</font></font></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="correcta" required="true">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Opción 1</font></font></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="opcion1" required="true">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Opción 2</font></font></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="opcion2" required="true">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Opción 3</font></font></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="opcion3" required="true">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Imagen</font></font></label>

                          <div class="col-sm-10">
                            <input type="file" class="form-control" id="files" name="foto" multiple="true" />
                          </div>
                          <br />

                          <br />
                          <div class="row">
                           <div class="col-md-4"></div>
                           <div class="col-md-4"><br><div id="lista_imagenes" style="width: 150px; height: 150px; border:1px solid green;"></div></div>
                           <div class="col-md-4"></div>
                         </div>


                         <script>
                          function archivo(evt) {
                              var files = evt.target.files; // FileList object
                              // Obtenemos la imagen del campo "file".
                              for (var i = 0, f; f = files[i]; i++) {
                                //Solo admitimos imágenes.
                                if (!f.type.match('image.*')) {
                                  continue;
                                }
                                var reader = new FileReader();
                                reader.onload = (function(theFile) {
                                  return function(e) {
                                      // Insertamos la imagen
                                      document.getElementById("lista_imagenes").innerHTML = ['<img style="width:150px; height:150px;" class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                                    };
                                  })(f);
                                  reader.readAsDataURL(f);
                                }
                              }
                              document.getElementById('files').addEventListener('change', archivo, true);
                            </script>

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
                    <th width="50" style="text-align: center">Imagen</th>
                    <th width="50" style="text-align: center">Categoria</th>
                    <th width="70" style="text-align: center">Pregunta</th>
                    <th width="20" style="text-align: center">Visto</th>
                    <th width="20" style="text-align: center">Dificultad</th>
                    <th width="50" style="text-align: center">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 include('utilidades/conexion.php');
                 $registro = mysqli_query($con, "select * from preguntas");
                 
                 if(mysqli_num_rows($registro)>0) {

                  while($registro2 = mysqli_fetch_array($registro)){
                    $idpregunta = $registro2['id_pregunta'];
                    $foto = $registro2['img'];
                    $categoria = $registro2['id_categoria'];
                    $pregunta = $registro2['pregunta'];
                    $dificultad = $registro2['dificultad'];
                    $visto = $registro2['vio'];
                    $imagen = '<img src="../'.$foto.'" width="30" height="30">';

                    $vistoDec = '';
                    if ( $visto == '[]' ) {
                      $vistoDec = 'No vista';
                    }else{
                      $visto = json_decode( $visto );
                      $vistoDec = 'Vista por: '.count( $visto ).' personas';
                    }

                    echo '<tr>
                    <td style="text-align: center">'.$imagen.'</td>
                    <td style="text-align: center">'.$categoria.'</td>
                    <td>'.$pregunta.'</td>
                    <td style="text-align: center">'.$vistoDec.'</td>'
                    ?>

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

                    <?php 

                    echo '<td>
                    <div class="row">
                    <div class="col-md-6">
                    <form action="edicionPregunta.php" method="post">

                    <input type="hidden" name="idpregunta" value="'.$idpregunta.'">
                    <input type="hidden" name="categoria" value="'.$categoria.'">
                    <input type="hidden" name="dificultad" value="'.$dificultad.'">
                    <input type="hidden" name="pregunta" value="'.$pregunta.'">
                    <input type="hidden" name="imagen" value="'.$foto.'">

                    <button name="editarPregunta" type="submit" class="btn btn-info"><i class="fas fa-pencil"></i></button>
                    </form>
                    </div>
                    <div class="col-md-6">
                    <form action="procesos/recibirEliminacionPregunta.php" method="post" onsubmit="return confirmation()">
                    <input type="hidden" name="idpregunta" value="'.$idpregunta.'">
                    <input type="hidden" name="imagen" value="'.$foto.'">
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

      function Reinicio_p(){

    $(document).ready(function(){

      $.ajax({
        data:  'reinicio_p',
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
