<?php
include('session.php');
include('nav.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Batalla| Inicio</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-theme.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
      <!-- Clases personalizadas para Preguntados -->    
  <link href="css/preguntados.css" rel="stylesheet">
<style>@import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&display=swap');</style>
</head>
<body>
    <!-- <div class="container theme-showcase" role="main"> -->
        <!-- <div class="row"> -->
            <div class="panel3">
                <h1 style="padding-top: 20%; text-align: center; color: #001689"> ¡Bienvenido <?php  echo utf8_encode($nombre)?>! </h1>
                <?php
                  if(empty($avatar)){
                    echo '<h1 style="padding-top: 20%; text-align: center; color: #fff"">No tienes un Avatar, puedes seleccionar uno</h1>';
                    
                  }
                  ?>
                <img class="center-block" src="img/avatars/<?php
                  if(!empty($avatar)){
                    echo utf8_encode($avatar);
                  }else{
                 echo "default.png";
                  }
                  ?>" alt="" width="290px" height="290px">
                <div id="botonera" class="row center-block">
                 <button type="button" class="btn jugadores" onclick="window.location.href='jugador.php'">Retar compañero</button>
                 <button type="button" class="btn jugadores" id="confirm">Retos</button>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
    <!-- <?php include('footer.php'); ?> -->
    <script src="js/bootstrap.min.js"></script>
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