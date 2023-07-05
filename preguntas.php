<?php 
include('session.php');
$page = "preguntas"; 
$admin = $_SESSION['nivel'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <title>Preguntas y Categorias</title>
    <link href="img/uni.ico" rel="shortcut icon">
    <link href="css/sweetalert2.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-theme.css" rel="stylesheet" />
    <script src="js/sweetalert2.js"></script>
    <script>
	function ListCat(){
		$.ajax({
                //data:  parametros, //datos que se envian a traves de ajax
                url:   'funciones/tabla_cat.php', //archivo que recibe la peticion
                type:  'post', //mÃ©todo de envio
                beforeSend: function () {
                        //$("#crud-categorias").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#crud-categorias").html(response);
						//setTimeout(VerEstado(8002), 5000);
                }
        });
		}
		
	function ListPreguntas(){
		$.ajax({
                //data:  parametros, //datos que se envian a traves de ajax
                url:   'funciones/tabla_preg.php', //archivo que recibe la peticion
                type:  'post', //mÃ©todo de envio
                beforeSend: function () {
                        //$("#crud-preguntas").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#crud-preguntas").html(response);
						//setTimeout(VerEstado(8002), 5000);
                }
        });
		}
		
	function llenar_modalCat(id_categoria){
		var parametros = {
                "id_categoria" : id_categoria,
        };
		$.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'funciones/funciones.php', //archivo que recibe la peticion
                type:  'post', //mÃ©todo de envio
                beforeSend: function () {
                        $("#edit_cat").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#edit_cat").html(response);
						//setTimeout(VerEstado(8002), 5000);
                }
        });
		}
		
	function llenar_modalEditPreg(id_pregunta_edit){
		var parametros = {
                "id_pregunta_edit" : id_pregunta_edit,
        };
		$.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'funciones/funciones.php', //archivo que recibe la peticion
                type:  'post', //mÃ©todo de envio
                beforeSend: function () {
                        $("#edit_preg").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#edit_preg").html(response);
						//setTimeout(VerEstado(8002), 5000);
                }
        });
		}
		
	function editar_modalCat(id_cat_edit,nombre_cat){
		var parametros = {
                "id_cat_edit" : id_cat_edit,
				"nombre_cat" : nombre_cat,
        };
		$.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'funciones/funciones.php', //archivo que recibe la peticion
                type:  'post', //mÃ©todo de envio
                beforeSend: function () {
                        $("#edit_cat").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#edit_cat").html(response);
						//setTimeout(VerEstado(8002), 5000);
                }
        });
		}
		
	function editar_modalPreg(id_edt_cat,id_preg_edit,nombre_preg,id_edt_resp,nombre_resp,id_edt_op2,nombre_op2,id_edt_op3,nombre_op3,dificultad){
		var parametros = {
				"id_edt_cat" : id_edt_cat,
        "id_preg_edit" : id_preg_edit,
				"nombre_preg" : nombre_preg,
				"id_edt_resp" : id_edt_resp,
				"nombre_resp" : nombre_resp,
				"id_edt_op2" : id_edt_op2,
				"nombre_op2" : nombre_op2,
				"id_edt_op3" : id_edt_op3,
				"nombre_op3" : nombre_op3,
        "dificultad" : dificultad,
        };
		$.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'funciones/funciones.php', //archivo que recibe la peticion
                type:  'post', //mÃ©todo de envio
                beforeSend: function () {
                        //$("#edit_preg").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#edit_preg").html(response);
						//setTimeout(VerEstado(8002), 5000);
                }
        });
		}
		
	function eliminar_Cat(id_cat_del){
		var parametros = {
                "id_cat_del" : id_cat_del,
        };
		$.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'funciones/funciones.php', //archivo que recibe la peticion
                type:  'post', //mÃ©todo de envio
                beforeSend: function () {
                        //$("#edit_cat").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#edit_cat").html(response);
						//setTimeout(VerEstado(8002), 5000);
                }
        });
		}
		
	function confirmar_delCat(cat_del){
		swal({
  			title: 'Estas Seguro?',
  			text: "Esta accion no se puede revertir!",
  			type: 'warning',
  			showCancelButton: true,
  			confirmButtonColor: '#3085d6',
  			cancelButtonColor: '#d33',
  			confirmButtonText: 'Si, Eliminar!'
			}).then(function () {
  				eliminar_Cat(cat_del);
			})
	}
	
	function addNew_Cat(add_cat){
		var parametros = {
                "add_cat" : add_cat,
        };
		$.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'funciones/funciones.php', //archivo que recibe la peticion
                type:  'post', //mÃ©todo de envio
                beforeSend: function () {
                        //$("#edit_cat").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#new_cat").html(response);
						//setTimeout(VerEstado(8002), 5000);
                }
        });
		}

    function addNew_Preg(add_categoria, add_pregunta, add_respuesta, add_op1, add_op2, imagen){

    var parametros = {
                "add_categoria" : add_categoria,
                "add_pregunta" : add_pregunta,
                "add_respuesta" : add_respuesta,
                "add_op1" : add_op1,
                "add_op2" : add_op2,
                "imagen" : imagen,

        };
    $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'funciones/preguntas.php', //archivo que recibe la peticion
                type:  'post', //mÃ©todo de envio
                beforeSend: function () {
                        //$("#edit_cat").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#res_new_preg").html(response);
                        $('#add_preg').val('');
                        $('#add_resp1').val('');
                        $('#add_resp2').val('');
                        $('#add_resp3').val('');
            //setTimeout(VerEstado(8002), 5000);
                }
        });
    }
		
	function confirmar_NewCat(add_cat){
		swal({
  			title: 'Estas Seguro?',
  			text: "Se agregara la nueva categoria a la base de datos.",
  			type: 'warning',
  			showCancelButton: true,
  			confirmButtonColor: '#3085d6',
  			cancelButtonColor: '#d33',
  			confirmButtonText: 'Agregar'
			}).then(function () {
  				addNew_Cat(add_cat);
			})
	}

  function confirmar_NewPreg(add_categoria, add_pregunta, add_respuesta, add_op1, add_op2, imagen){

    swal({
        title: 'Estas Seguro?',
        text: "Se agregara la nueva pregunta a la base de datos.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Agregar'
      }).then(function () {

          addNew_Preg(add_categoria, add_pregunta, add_respuesta, add_op1, add_op2, imagen);
      })
  }

    function eliminar_Preg(id_pregunta_del){ 
    var parametros = {
                "id_pregunta_del" : id_pregunta_del,
        };
    $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'funciones/preguntas.php', //archivo que recibe la peticion
                type:  'post', //mÃ©todo de envio
                beforeSend: function () {
                        //$("#edit_cat").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#edit_preg").html(response);
            //setTimeout(VerEstado(8002), 5000);
                }
        });

    }
    
  function confirmar_delPreg(id_pregunta){
    swal({
        title: 'Estas Seguro?',
        text: "Esta accion no se puede revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
      }).then(function () {
          eliminar_Preg(id_pregunta);
      })
  }
		
    </script>


</head>
<body style="padding-top:70px">

    <?php include('nav.php'); ?>

    <div class="container theme-showcase" role="main">
        <h1>Preguntas y Categorias.</h1>
        <hr />
        <div class="row"><!-- Main row -->

            <div class="col-sm-8"><!-- columna 2 -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        <div class="col-xs-4">
                        <input type="text" class="form-control" placeholder="palabra">  
                        </div>
                        <div class="col-xs-4">
                        <select class="form-control">
                        <option value="none">Filtrar Categoria</option>
                        </select>
                        </div>
                        <button type="button" class="btn btn-info" onclick=""><span class="glyphicon glyphicon-search"></span> Buscar</button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#new_preg_modal" ><span class="glyphicon glyphicon-plus-sign"></span> Nueva pregunta</button>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div id="crud-preguntas">Tabla Preguntas. </div>
                    </div>
                </div>
            </div><!-- columna 2 -->

            <div class="col-sm-4"><!-- columna 2 -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#new_cat_modal" ><span class="glyphicon glyphicon-plus-sign"></span> Agregar categoria</button>
                    </div>
                    <div class="panel-body">
                        <div id="crud-categorias">Tabla Categorias. </div>
                    </div>
                </div>
            </div><!-- columna 2 -->

        </div><!-- Main row -->

        <!-- Modal Editar Categoria -->
  <div class="modal fade" id="cat_edit_modal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Categoria</h4>
        </div>
        <div class="modal-body">
        <div id="edit_cat">...</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" onClick="editar_modalCat($('#id_cat_edt').val(), $('#nombrec').val());return false;" data-dismiss="modal">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal Nueva Categoria-->
  <div class="modal fade" id="new_cat_modal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nueva Categoria.</h4>
        </div>
        <div class="modal-body">
          <div id="new_cat">
          <input type="text" class="form-control" id="new_nombrec" name="new_nombrec" required="required" placeholder="Nombre Categoria" value="">
          </div>
        </div>
        <div id="res_new_cat"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="confirmar_NewCat($('#new_nombrec').val());return false;" data-dismiss="modal">Agregar</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal Preguntas -->
  <div class="modal fade" id="edit_preg_modal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Pregunta.</h4>
        </div>
        <div class="modal-body">
          <div id="edit_preg">

          <p></p>
          <label for="etd_preg">Pregunta:</label>
          <input type="text" class="form-control" id="edt_preg" name="etd_preg" required="required" placeholder="Editar Pregunta" value="">
          <p></p>
          <label for="etd_preg">Opcion Correcta:</label>
          <input type="text" class="form-control" id="edt_resp1" name="edt_resp1" required="required" placeholder="Respuesta Correcta" value="">
          <p></p>
          <label for="edt_resp2">Opcion 2:</label>
          <input type="text" class="form-control" id="edt_resp2" name="edt_resp2" required="required" placeholder="Opcion2" value="">
          <p></p>
          <label for="edt_resp3">Opcion 3:</label>
          <input type="text" class="form-control" id="edt_resp3" name="edt_resp3" required="required" placeholder="Opcion3" value="">
          </div>
          <div id="res_new_preg"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="editar_modalPreg($('#id_cat option:selected').val(),$('#id_etd_preg').val(),$('#edt_preg').val(),$('#id_edt_resp_preg').val(),$('#edt_resp_preg').val(),$('#id_edt_resp_opc2').val(),$('#edt_resp2').val(),$('#id_edt_resp_opc3').val(),$('#edt_resp3').val(),$('#edt_diff option:selected').val());return false;" data-dismiss="modal">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal new Preguntas -->
  <div class="modal fade" id="new_preg_modal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nueva Pregunta.</h4>
        </div>
        <div class="modal-body">
          <div id="new_preg">
          <form action="funciones/subir.php" method="post" enctype="multipart/form-data">
          <?php 
          include('funciones/db.php'); 
          include ('funciones/sel_categorias.php');
          ?>
          <p></p>
          <label for="etd_preg">Pregunta:</label>
          <input type="text" class="form-control" id="add_preg" name="add_preg" required="required" placeholder="Nueva Pregunta" value="">
          <p></p>
          <label for="diff">Dificultad:</label>
          <select class="form-control" id="add_diff" name="add_diff" style="width:100%;">
             <option value="0">Facil</option>
             <option value="1">Intermedio</option>
             <option value="2">Dificil</option>
          </select>
          <p></p>
          <label for="add_preg">Opcion Correcta:</label>
          <input type="text" class="form-control" id="add_resp1" name="add_resp1" required="required" placeholder="Respuesta Correcta" value="">
          <p></p>
          <label for="add_resp2">Opcion 2:</label>
          <input type="text" class="form-control" id="add_resp2" name="add_resp2" required="required" placeholder="Opcion2" value="">
          <p></p>
          <label for="add_resp3">Opcion 3:</label>
          <input type="text" class="form-control" id="add_resp3" name="add_resp3" required="required" placeholder="Opcion3" value="">
          <p></p>
          <label for="add_img">Imagen Pregunta:</label>
          <input name="imagen" id="imagen" type="file" >
          </div>
        </div>
        <div class="modal-footer">
            <input name="submit" type="submit" class="btn btn-success" value="Guardar">
        </div>
      </form>
      </div>
    </div>
  </div>

  <!-- Paginacion -->
        <?php
            include "funciones/db.php";
            $limit = 10;
            $sql = "SELECT COUNT(id_pregunta) FROM preguntas"; 
            $rs_result = mysqli_query($conexion, $sql);  
            $row = mysqli_fetch_row($rs_result);  
            $total_records = $row[0];  
            $total_pages = ceil($total_records / $limit); 
        ?>

        <div align="center" style="margin-bottom: 50px;">
            <ul class='pagination text-center' id="pagination">
            <?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
                        if($i == 1):?>
                        <li class='active'  id="<?php echo $i;?>"><a href='funciones/tabla_preg.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
                        <?php else:?>
                        <li id="<?php echo $i;?>"><a href='funciones/tabla_preg.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                    <?php endif;?>          
            <?php endfor;endif;?> 
       </div>
       <!-- Paginacion -->

    </div><!-- /container -->
    <?php include('footer.php'); ?>
    <script>
	window.onload = function() {
  //funciones a ejecutar
  ListCat();
  //ListPreguntas();
  };

  var initp = 1;

  function loadTabla(){
  
  jQuery("#crud-preguntas").load("./funciones/tabla_preg.php?page=" + initp);
    jQuery("#pagination li").live('click',function(e){
    e.preventDefault();
        jQuery("#crud-preguntas").html('loading...');
        jQuery("#pagination li").removeClass('active');
        jQuery(this).addClass('active');
        var pageNum = this.id;
        jQuery("#crud-preguntas").load("funciones/tabla_preg.php?page=" + pageNum);
  initp = pageNum;
    });
}

    loadTabla();

    </script>
    
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>

</body>
</html>
