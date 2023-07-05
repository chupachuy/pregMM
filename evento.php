<?php
include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preguntados | Individual</title>
    <!-- Boostrap v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!---Nasalization FONT  -->
    <style>@import url('https://fonts.cdnfonts.com/css/nasalization-2');</style>

      <!--  Clases personalizadas para Preguntados  -->    
    <link href="css/preguntados.css" rel="stylesheet">

    <style>@import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&display=swap');</style>
</head>

<body class="evento">

    <?php include('nav.php'); ?>

    <div class="container mt-5">
        <div class="row justify-content-center text-center">
            <h1 class="blue">Agenda</h1>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row justify-content-center mascara">
            <div class="col-12 col-md-8">
                <ul class="nav nav-pills mb-6 justify-content-center" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">2-junio</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">3-junio</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">4-junio</button>
                  </li>
                </ul>
                <div class="tab-content mt-5" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="event">
                            <div class="date text-center">
                                <h1>Viernes 02 de junio</h1>
                            </div>
                            <div class="eventday mt-4">
                                <p><strong>1:00 - 3:00</strong> LLegada a Hacienda Cantalagua</p>
                                <p><strong>3:00 - 4:00</strong> Entrega de habitaciones <em>lobby</em></p>
                                <p><strong>4:00 - 5:00</strong> Comida en el restaurante</p>
                                <p><strong>5:00 - 8:00</strong> Bienvenida en Salón Cantalagua</p>
                                <p><strong>8:00 - 9:00</strong> Cena en el restaurante</p>
                            </div>
                            <div class="separar"></div>
                        </div>
                    </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                      <div class="event">
                            <div class="date text-center">
                                <h1>Sábado 03 de junio</h1>
                            </div>
                            <div class="eventday mt-5">
                                <p><strong>7:00 - 8:00</strong> Desayuno en el restaurante</p>
                                <p><strong>8:00 - 8:30</strong> Traslado a <em>rally</em> en el <em>Lobby</em></p>
                                <p><strong>8:30 - 11:00</strong> <em>Rally</em></p>
                                <p><strong>11:00 - 12:00</strong> Tiempo libre</p>
                                <p><strong>12:00 - 1:30</strong> Fotografía en la alberca</p>
                                <p><strong>1:30 - 3:00</strong> Comida en el restaurante</p>
                                <p><strong>3:00 - 7:00</strong> "Team Building" en el salon Cantalagua</p>
                                <p><strong>7:00 - 8:00</strong> Tiempo libre</p>
                                <p><strong>8:00 - 1:00</strong> Cena mexicana alberca</p>
                            </div>
                            <div class="separar"></div>
                        </div>
                  </div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                      <div class="date text-center">
                            <h1>Domingo 04 de junio</h1>
                        </div>
                        <div class="eventday mt-5">
                            <p><strong>7:00 - 9:00</strong> Desayuno en el restaurante</p>
                            <p><strong>9:00 - 9:30</strong> <em>Check out</em>  en el <em>Lobby</em></p>
                            <p><strong>9:30 - 1:30</strong> Sesiones y cierre Salón Cantalagua</p>
                            <p><strong>1:30 - 3:00</strong> Comida en el restaurante</p>
                            <p><strong>3:00 - 4:00</strong> Salida. Camiones en el <em>lobby</em></p>
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>



   <script src="js/chatbot.js"></script>
    <script>
        localStorage.clear();
        $(document).ready(function(){
         $("#av1").click(function() {
            localStorage.clear();
            console.log("Hola 1")
            localStorage.setItem('avatar','av-1.png');
            local=localStorage.getItem('avatar')
            $('#categoria').val(local);
         });
         });
         $(document).ready(function(){
         $("#av2").click(function() {
        localStorage.clear();
        console.log("Hola 2")
        localStorage.setItem('avatar','av-2.png');
            local=localStorage.getItem('avatar')
            $('#categoria').val(local);


         });
         });
         $(document).ready(function(){
         $("#av3").click(function() {
        localStorage.clear();
        console.log("Hola 3")
        localStorage.setItem('avatar','av-3.png');
            local=localStorage.getItem('avatar')
            $('#categoria').val(local);
         });
         });

         $(document).ready(function(){
         $("#av4").click(function() {
        localStorage.clear();
        console.log("Hola 4")
        localStorage.setItem('avatar','av-4.png');
            local=localStorage.getItem('avatar')
            $('#categoria').val(local);
         });
         });
         $(document).ready(function(){
         $("#av5").click(function() {
        localStorage.clear();
        console.log("Hola 5")
        localStorage.setItem('avatar','av-5.png');
        local=localStorage.getItem('avatar')
            $('#categoria').val(local);
         });
         });
         $(document).ready(function(){
         $("#av6").click(function() {
        localStorage.clear();
        console.log("Hola 6")
        localStorage.setItem('avatar','av-6.png');
        local=localStorage.getItem('avatar')
            $('#categoria').val(local);
         });
         });
         $(document).ready(function(){
         $("#av7").click(function() {
        localStorage.clear();
        console.log("Hola 7")
        localStorage.setItem('avatar','av-7.png');
        local=localStorage.getItem('avatar')
            $('#categoria').val(local);
         });
         });
         $(document).ready(function(){
         $("#av8").click(function() {
        localStorage.clear();
        console.log("Hola 8")
        localStorage.setItem('avatar','av-8.png');
        local=localStorage.getItem('avatar')
            $('#categoria').val(local);


         });
         });
         function local() {
          var con = localStorage.getItem('avatar');


          var saved = parseInt(con);
          alert(saved);
          $.ajax({
              type: "POST",
              url: "controllerAvatar.php",
              data: { data: saved },
              dataType: 'json',
              success: function(data) {
                  //$('#output').html(data);
                  alert(data.mensaje);
              },
              error: function(error) {
                  alert(error);
                  console.log(error);
              }
          });
        };   

    </script>
    <?php include('footer.php'); ?>
</body>
</html>