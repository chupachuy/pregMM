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
    <!-- Boostrap v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="css/preguntados.css" rel="stylesheet">
    <style>@import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&display=swap');</style>

</head>

<body  class="avatar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center mt-5 mb-3">
                <h1> Selecciona un Avatar </h1>
            </div>
            <div class="col-md-12 text-center">
                <ul id="menuAvatar" class="text-center">               
                    <li class="col-4 col-md-2 menuavatar"><a><img id="av1" src="img/avatars/av-1.png" /></a></li>           
                    <li class="col-4 col-md-2 menuavatar"><a><img id="av2" src="img/avatars/av-2.png" /></a></li>            
                    <li class="col-4 col-md-2 menuavatar"><a><img id="av3" src="img/avatars/av-3.png" /></a></li>            
                    <li class="col-4 col-md-2 menuavatar"><a><img id="av4" src="img/avatars/av-4.png" /></a></li>            
                    <li class="col-4 col-md-2 menuavatar"><a><img id="av5" src="img/avatars/av-5.png" /></a></li>
                    <li class="col-4 col-md-2 menuavatar"><a><img id="av6" src="img/avatars/av-6.png" /></a></li>       
                    <li class="col-4 col-md-2 menuavatar"><a><img id="av7" src="img/avatars/av-7.png" /></a></li>          
                    <li class="col-4 col-md-2 menuavatar"><a><img id="av8" src="img/avatars/av-8.png" /></a></li> 
                </ul>
            </div>

            <div class="col-6 col-md-3">
                <form action="controllerAvatar.php" method="post" enctype="multipart/form-data">
                    <input id="categoria" name="categoria" class="form-control"  type="hidden">
                    <input id="idn" name="idlogin" class="form-control"  type="hidden" value="<?php echo utf8_encode($idLogin) ?>">
                     <button type="submit" class="btn btn-primary jugadores2"name="enviarEdicion" >Guardar Avatar</button>
                </form>
                
            </div>
        </div>
    </div>


<?php include('footer.php'); ?>

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
            
</body>
</html>