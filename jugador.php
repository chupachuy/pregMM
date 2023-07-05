<?php 
include('session.php');
include('nav.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preguntados | Individual</title>
    <script src="js/TweenMax.min.js"></script>
    <script src="js/Winwheel.min.js"></script>
    <!-- Boostrap v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/preguntados.css" rel="stylesheet">
    <style>@import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&display=swap');</style>
    <style>@import url('https://fonts.cdnfonts.com/css/nasalization-2');</style>
    <link href="css/preguntados.css" rel="stylesheet">

</head>
<body class="jugador" style="overflow-x: hidden; background-color: #055EA2;">
    <!-- <div class="container theme-showcase" role="main"> -->

        <!-- <div class="row"> -->
            <div class="panel_p ruleta text-center"> 
             <h1>1 jugador</h1> 
             <h1 id="pts">Puntos: </h1>
             <h3 class="panel-title">

                <div class="panel-body-ruleta">
                    <button type="button" id="btn_ruleta" class="wheel__button" value="Girar" onclick="IniciarRuleta();"></button></h3>
                    <canvas id="canvas" height="302" width="302"></canvas>
                </div>

            </div>

            <div class="panel5 res">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-11 col-md-8 pt-4">
                            <div class="panel-body mb-4">
                                <span id="countdown" style="color:yellow;"></span>
                                <p class="resultado"><span class="width: 70%; margin-left: 15%; background-color: #1C3C6D;" id="resultado"></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- <div class="panel-heading"> -->
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12 text-center">
                            <input type="button" id="resultado_cat" class="btn jugadores" style="z-index: 20000;" value="Validar" onclick="ver_respuestas();" />
                            <input type="button" id="resultado_catRe" class="btn jugadoresRe" style="z-index: 20000;" value="Siguiente pregunta" onclick="sig_preg();" />
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
                <!-- </div> -->
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                                <div id="respuesta"></div>
                                <input id="restartConfetti" type="hidden">
                                <input id="stopConfetti" type="hidden">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="reiniciar_html();">Cerrar</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <?php include('footer.php'); ?> 
                <script src="js/RuletaSetUp.js"></script>
                <script src="js/jquery.confetti.js"></script>
                <script src="js/bootstrap.min.js"></script>

                <script type="text/javascript">

                    $("#resultado_vacio").hide();
                    $(".res").fadeOut();
                    $("#pts").ready(function() {
                        setInterval(function () {My_onLoad_p()}, 2000);
                    });

                    function sig_preg(){
                        window.location.reload();
                    }

                </script>

            </body>
            </html>
