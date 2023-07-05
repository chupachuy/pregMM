<?php
include('session.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Batalla| Inicio</title>
    <!-- Boostrap v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <?php // include('./admin/includes/librerias.php'); ?>
    <link rel="stylesheet" type="text/css" href="./admin/datatables/dataTables.bootstrap.min.css" />
    <!-- Clases personalizadas para Preguntados -->
    <link href="css/preguntados.css" rel="stylesheet">
    <style>@import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&display=swap');</style>
    <style>@import url('https://fonts.cdnfonts.com/css/nasalization-2');</style>
</head>

<body class="retar-companero">
    <?php include('nav.php'); ?>
    <div class="container" role="main">
        <div class="row">
            <div class="col-12 col-md-12">
                <br><br>
                <h3 align="center" class="retar">Retar a un compañero</h3>
                <br><br>
                <div style="max-height: 50vh; overflow: scroll; overflow-x: hidden;">
                <table class="table table-responsive table-bordered table-retar-companero" id="ejemplo">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <!-- <th>Estatus</th> -->
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="tabRetar"></tbody></table>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h3 align="center" class="retar">Mis desafíos - Yo reto</h3>
            <br>
            <table class="table table-responsive table-bordered table-retar-companero" id="ejemplo">
                <thead>
                    <tr>
                        <th width="50" style="text-align: center">Jugador 1</th>
                        <th width="100" style="text-align: center">Jugador 2</th>
                        <th width="100" style="text-align: center">Estatus</th>
                        <th width="50" style="text-align: center">Opciones</th>
                    </tr>
                </thead>
                <tbody id="tabYoReto"></tbody>
                    </table>
                    <br>
                    <br>
                    <br>
                    <h3 align="center" class="retar">Retos - Ellos me retan</h3>
                    <br>
                    <table class="table table-responsive table-bordered table-retar-companero" id="ejemplo">
                        <thead>
                            <tr>
                                <th width="50" style="text-align: center">Jugador 1</th>
                                <th width="100" style="text-align: center">Jugador 2</th>
                                <th width="100" style="text-align: center">Estatus</th>
                                <th width="50" style="text-align: center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="tabMeRetan"></tbody>
                    </table>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <!--<script src="js/bootstrap.min.js"></script>-->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#aceptar').on('click', function(e) {
            e.preventDefault();
            var message = $(this).data('confirm');
            swal({
                title: "¿Estás listo para jugar?",
                text: message,
                icon: "warning",
                buttons: ["¡No estoy listo!", true],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal("Preparando para la batalla ...", {
                        icon: "success",
                        buttons: false,
                        timer: 3000
                    });
                    setTimeout(function() {
                        Multi();
                    }, 3000);
                } else {
                    swal("¡Has decidido no jugar!", {
                        icon: "error",
                        buttons: false,
                        timer: 3000
                    });
                }
            });
        });
    });
setInterval(function() {
    const $btnIrReto = document.querySelectorAll('.btnIrReto');
    $(document).ready(function() {

        for (let i = 0; i < $btnIrReto.length; i++) {
            $btnIrReto[i].addEventListener('click', (e) => {
                e.preventDefault();
                var message = $(this).data('confirm');
                let idRetoEnvi = e.target.dataset.iddes;
                swal({
                    title: "¿Estás listo para jugar?",
                    text: message,
                    icon: "warning",
                    buttons: ["¡No estoy listo!", true],
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        swal("Preparando para la batalla ...", {
                            icon: "success",
                            buttons: false,
                            timer: 3000
                        });
                        setTimeout(function() {
                            Multi(idRetoEnvi);
                        }, 3000);
                    } else {
                        swal("¡Has decidido no jugar!", {
                            icon: "error",
                            buttons: false,
                            timer: 3000
                        });
                    }
                });
            });

        }
    });
}, 1);
    function Multi(idRetoEnvi) {
        $(document).ready(function() {
            var parametros = {
                "vs" : 'vs',
                "vss" : 'vss',
                "idDesafio" : idRetoEnvi
            };
            $.ajax({
                data: parametros,
                url: 'funciones/funciones.php',
                type: 'post',
                beforeSend: function() {},
                success: function(responseComp) {
                    responseComp = responseComp.split('__');
                    response1 = responseComp[0];
                    response2 = responseComp[1];
                    // Esperar el registro o estado del desafío
                    if ( response1 == 0 ) {
                        alert('Ocurrió un error. Por favor inténtalo más tarde.');
                        window.location.href = 'retarcompanero.php';
                    }else if( response1 == 1 ){
                        window.location.href = 'jugadores.php?val='+response2;
                    }else{
                        // alert(responseComp);
                        window.location.href = 'jugadores.php?val='+response2;
                    }
                },
                error: function() {
                    alert("error")
                }
            });
        })
    }




    function tab1(){
        var parametros = {
            "tabRetar" : 'tabRetar'
        };
        $.ajax({
            data: parametros,
            url: 'retarcompanero_tabs.php',
            type: 'post',
            beforeSend: function() {},
            success: function(responseTab) {
                document.getElementById('tabRetar').innerHTML = responseTab;
            },
            error: function() {
                alert("error")
            }
        });
    }
    function tab2(){
        var parametros = {
            "tabYoReto" : 'tabYoReto'
        };
        $.ajax({
            data: parametros,
            url: 'retarcompanero_tabs.php',
            type: 'post',
            beforeSend: function() {},
            success: function(responseTab) {
                document.getElementById('tabYoReto').innerHTML = responseTab;
            },
            error: function() {
                alert("error")
            }
        });
    }
    function tab3(){
        var parametros = {
            "tabMeRetan" : 'tabMeRetan'
        };
        $.ajax({
            data: parametros,
            url: 'retarcompanero_tabs.php',
            type: 'post',
            beforeSend: function() {},
            success: function(responseTab) {
                document.getElementById('tabMeRetan').innerHTML = responseTab;
            },
            error: function() {
                alert("error")
            }
        });
    }

    tab1();
    tab2();
    tab3();

    setInterval(function() {
        tab1();
        tab2();
        tab3();
    }, 1000);
    </script>
</body>

</html>