<?php include('nav.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preguntados | Puntuación</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css'>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-theme.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <link href="css/preguntados.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

</head>
<body >

    <!-- <div class="container theme-showcase" role="main"> -->
        <!-- <div class="row"> -->
            <div class="panel4">  
                <h1 style="padding-top: 20%; text-align: center;">Ranking</h1>
                <table  id="tabla" align="center"></table>
            </div>
            <!-- </div> -->
            <!-- </div> -->
            <!-- <?php include('footer.php'); ?> -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
            <script src="js/bootstrap.min.js"></script>
            <script type="text/javascript">

                $("#puntaje").ready(function() {
                    setInterval(function () {My_onLoad_t()}, 2000);
                });

                function My_onLoad_t(){

                    $(document).ready(function(){

                        $.ajax({
                            data:  'tabla',
                            url:   'funciones/funciones.php',
                            type:  'post',
                            beforeSend: function () { },
                            success:  function (response) {                
                                $("#tabla").html(response);
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