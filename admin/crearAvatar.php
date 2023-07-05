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
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <link href="css/preguntados.css" rel="stylesheet">
    <style>@import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&display=swap');</style>

</head>

<body  class="hold-transition skin-blue sidebar-mini">

<div class="panel3">
                <h1 style="padding-top: 20%; text-align: center;"> Selecciona un Avatar </h1>

                <ul class="nav navbar-nav">
                <li><a><img id="av1" src="img/avatars/av-1.png" width="150px" height="150px" /></a></li>       
                <li><a><img id="av2" src="img/avatars/av-2.png" width="150px" height="150px" /></a></li>       
                <li><a><img id="av3" src="img/avatars/av-3.png" width="150px" height="150px" /></a></li>       
                <li><a><img id="av4" src="img/avatars/av-4.png" width="150px" height="150px" /></a></li>       
                <li><a><img id="av5" src="img/avatars/av-5.png" width="150px" height="150px" /></a></li>       
                <li><a><img id="av6" src="img/avatars/av-6.png" width="150px" height="150px" /></a></li>       
                <li><a><img id="av7" src="img/avatars/av-7.png" width="150px" height="150px" /></a></li>       
                <li><a><img id="av8" src="img/avatars/av-8.png" width="150px" height="150px" /></a></li>                      

                </ul>


             
                <form action="controllerAvatar.php" method="post" enctype="multipart/form-data">
                        <input id="categoria" name="categoria" class="form-control"  type="hidden">
                        <input id="idn" name="idlogin" class="form-control"  type="hidden" value="<?php echo utf8_encode($idLogin) ?>">

                     <button type="submit" class="btn btn-success"name="enviarEdicion">Guardar Avatar</button>
                </form>
            </div>
   <script src="js/chatbot.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
</body>
</html>