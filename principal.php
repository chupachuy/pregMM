<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preguntados | Inicio</title>
    <!-- Boostrap v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!---Nasalization FONT -->
    <style>@import url('https://fonts.cdnfonts.com/css/nasalization-2');</style>

      <!-- Clases personalizadas para Preguntados -->    
  <link href="css/preguntados.css" rel="stylesheet">

<style>@import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&display=swap');</style>


</head>
<body class="principal">

    <?php include('nav.php'); ?>
    <div class="container" role="main">
        <div class="row justify-content-center mt-5">
            <div class="col-11 col-md-6 col-lg-6 text-center">
                <h1>¡Bienvenido <?php  echo $nombre?>! </h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 col-md-4 col-lg-3 img-avatar-principal">
                <?php
                  if(empty($avatar)){
                    echo '<h5 style="text-align: center; color: #fff"">No tienes un Avatar, puedes seleccionar uno</h5>';
                    }
                  ?>
                  <img class="center-block" src="<?php
                  if(!empty($avatar)){
                    echo $avatar;
                  }else{
                    echo "avatar/default.png";
                  }
                  ?>" alt="" width="290px" height="290px">
              </div>
              <div class="col-11">
                <div id="botonera" class="row center-block">
                     <button type="button" class="btn btn-primary" onclick="window.location.href='jugador.php'">1 jugador</button>
                     <!-- <button type="button" class="btn btn-primary" id="confirm">Retar en Linea</button> -->
                     <button type="button" class="btn btn-primary"  onclick="window.location.href='retarcompanero.php'">Retar a un compañero</button>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#confirm').on('click', function(e){
                e.preventDefault();
                var message = $(this).data('confirm');
                swal({
                    title: "¿Estás listo para jugar?",
                    text: message,
                    icon: "warning",
                    buttons:  ["¡No estoy listo!", true],
                    dangerMode: true,
                }).then((willDelete) => {
                  if (willDelete) {
                    swal("Preparando para la batalla ...", {
                      icon: "success",
                      buttons: false,
                      timer: 3000
                  });
                    setTimeout( function() {
                        Multi();
                    }, 3000);
                } else {
                    swal("¡Has decidido no jugar!",
                    {
                      icon: "error",
                      buttons: false,
                      timer: 3000
                  });
                }
            });
            });
        });

        function Multi(){
            $(document).ready(function(){
                $.ajax({
                    data:  'vs',
                    url:   'funciones/funciones.php',
                    type:  'post',
                    beforeSend: function () { },
                    success:  function (response) {
                        window.location.href='jugadores.php'
                    },
                    error:function(){
                        alert("error")
                    }
                });
            })
        }
    </script>
</body>
</html>
