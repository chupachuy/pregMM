<?php
include('session.php');
include('nav.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preguntados | Inicio</title>
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
             
				<div id="draw">
			<div id="d01" ><!-- genero/color de piel -->
				
			</div>
			<div id="d02"><!-- peinado/color de cabello -->
				
			</div>
			<div id="d03"><!-- vestuario -->
				
			</div>
			<div id="d04">
				
			</div>
			<div id="d05">
				
			</div>
		</div>
		</div>
                <div id="botonera" class="row center-block">
                 <button type="button" class="btn jugadores" onclick="window.location.href='jugador.php'">1 jugador</button>
                 <button type="button" class="btn jugadores" id="confirm">Retar compañero</button>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
    <!-- <?php include('footer.php'); ?> -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        function aparecer(){
            var aGen = localStorage.getItem('avatarGen');
            var aVes = localStorage.getItem('avatarVes');
            var aPeim = localStorage.getItem('avatarPeinado');
            var acPeim = localStorage.getItem('avatarcPeinado');
            

       
        $("#d01").append('<img id="av5" src="'+aGen+'" width="200px" height="200px" />');
        $("#d02").append('<img id="av5" src="'+acPeim+'" width="200px" height="200px" />');
        $("#d03").append('<img id="av5" src="'+aVes+'" width="200px" height="200px" />');
        
        
         
         document.getElementById('d01').style.backgroundImage=localStorage.getItem('avatarGen');
     
        
       
        console.log("HOLA DESDE AVATAR2")
        }
        
        aparecer();
        
        
        
    </script>
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
