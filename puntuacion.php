<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preguntados | Puntuación</title>

    <!-- Boostrap v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>@import url('https://fonts.cdnfonts.com/css/nasalization-2');</style>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css'>
    <link href="css/preguntados.css" rel="stylesheet">
    <link href="css/puntuacion.css" rel="stylesheet">


</head>
<body class="ranking">


    <?php include('nav.php'); ?>
    <div class="container mt-6" role="main">
        <div class="row justify-content-center">
            <div class="col-11 col-md-6">  

                <div id="busIdGlo" class="busquedaGloNorm">
                  <div class="recBusq">
                   <input id="busq" style="font-family: inherit; font-weight: normal;" placeholder="Busca a un usuario"></input>
                   <button id="contArrow"><i class="fa fa-angle-down"></i></button>
                   <button id="btnBusc" onclick="fncBuscarPal();"><i class="fa fa-search"></i></button> 
                   <span id="respCoin"></span>
                   <span id="contCoinc"></span>
                  </div>
                </div>

                <br><br>
                <h1 class="mt-6 text-center"><em>Ranking</em></h1>

                <table id="tabla" class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Puntaje</th>
                            <th scope="col">Tiempo</th>
                        </tr>
                    </thead>
                    <tbody id="contTab">
                        <?php
                        $consulta6 = mysqli_query($conexion, "SELECT * FROM login WHERE level = 1 ORDER BY Puntaje DESC");
                        $id_pre = 1;
                        while ($tabla = mysqli_fetch_array($consulta6)){ 
                            $numId = $id_pre++;
                            $tiempoForm = number_format($tabla['tiempo'], 2, '.', '');
                            echo
                            '
                            <tr id="id_'.$numId.'" class="itemCont">
                            <td>'.$numId.'</td> 
                            <td data-rank="'.$numId.'">' .$tabla['nombre'].'</td> 
                            <td>' .$tabla['Puntaje'].'</td> 
                            <td>' .$tiempoForm.' min</td> 
                            </tr>
                            ';
                        }  
                        ?>
                    </tbody>
                </table>

                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


                <!-- <table  id="tabla" class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Puntaje</th>
                            <th scope="col">Tiempo</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        
                    </tbody>
                </table> -->
                <!--<input style="display:none;" id="auxTable" value="0">-->
            </div>
        </div>
    </div>
    <!-- <?php //include('footer.php'); ?> -->


    <script type="text/javascript">


            /*$("#puntaje").ready(function() {
                setInterval(function () {My_onLoad_t()}, 2000);
            });

            function My_onLoad_t(){
                $(document).ready(function(){
                    var auxTable = $('#auxTable').val();
                    $.ajax({
                        data:  'tabla',
                        url:   'funciones/funciones.php',
                        type:  'post',
                        beforeSend: function () { },
                        success:  function (response) {                
                            $("#tbody").html(response);
                            if(auxTable == 0)
                            {
                                $('#tabla').DataTable({
                                    language: {
                                        lengthMenu: 'Mostrando _MENU_ usuarios por p¨¢gina',
                                        zeroRecords: 'No encontramos nada - intenta de nuevo',
                                        info: 'Mostrando pagina _PAGE_ of _PAGES_',
                                        infoEmpty: 'Sin usuarios disponibles',
                                        infoFiltered: '(filtrado de un total de _MAX_ usuarios)',
                                        search:         'Buscar',
                                        paginate: {
                                            'first':      'Primera',
                                            'last':       '0‰3ltima',
                                            'next':       'Siguiente',
                                            'previous':   'Anterior'
                                        },
                                    },
                                });
                                $('#auxTable').val(1);
                            }
                            else
                            {
                                $('#tabla').DataTable();
                            }
                        },
                        error:function(){
                            alert("error")
                        }
                    });
                })    
            }*/
            // $(document).ready(function(){
            //     $.ajax({
            //         data:  'tabla',
            //         url:   'funciones/funciones.php',
            //         type:  'post',
            //         beforeSend: function () { },
            //         success:  function (response) {                
            //             $("#tbody").html(response);
            //             $('#tabla').DataTable({
            //                 language: {
            //                     lengthMenu: 'Mostrando _MENU_ usuarios por pagina',
            //                     zeroRecords: 'No encontramos nada - intenta de nuevo',
            //                     info: 'Mostrando pagina _PAGE_ of _PAGES_',
            //                     infoEmpty: 'Sin usuarios disponibles',
            //                     infoFiltered: '(filtrado de un total de _MAX_ usuarios)',
            //                     search:         'Buscar',
            //                     paginate: {
            //                         'first':      'Primera',
            //                         'last':       '0‰3ltima',
            //                         'next':       'Siguiente',
            //                         'previous':   'Anterior'
            //                     },
            //                 },
            //             });
            //         },
            //         error:function(){
            //             alert("error")
            //         }
            //     });
            // })    
        </script>

        <?php include('footer.php'); ?>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/puntuacion.js"></script>
            
    </body>
</html>