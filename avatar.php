<?php
include('session.php');
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
    <link href="css/preguntados.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/avatarCSS.css">
    <style>@import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&display=swap');</style>
    <style>@import url('https://fonts.cdnfonts.com/css/nasalization-2');</style>
</head>
<script>
    function FormSubmit(){
  var submitBtn = document.getElementById('id');
    if(submitBtn){
      submitBtn.click();
    }
}
</script>

<body class="createavatar" onload="onload()">
    <div id="wrapper">
        <?php include('nav.php'); ?>
        <div class="container">

            <div class="row justify-content-center mt-2 text-center">
                <div class="col-11 col-md-12 text-light">
                    <p> Selecciona las características que desees para tu avatar y después haz clic en "Guardar".</p>
                </div>
            </div>
            <!-- *******************-->
            <!-- <form name=idNombre onclick="nNombre(this.id)">
					<div id="nNombre">Nombre: <input  type="text" value="" id="id" name="id" maxlength="12" placeholder="Máximo 12 caracteres"></div>
					</form> -->
            <!-- *******************-->
            <div class="row justify-content-center mt-3" id="opciones">
                <div class="col-11 col-md-4">
                    <div id="genero">
                        <!--<input type="button" value="predefinido" name="predefinido" onclick="vestir()"> -->
                        <button class="btn btn-primary" id="hombre" type="button" name="hombre" onclick="genero(this.id)">Hombre</button>
                        <button class="btn btn-primary" id="mujer" type="button" name="mujer" onclick="genero(this.id)">Mujer</button>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-11 col-md-8 text-center">
                    <!-- ******************************Opciones mujer**************************************-->
                    <div id="opcionesM" class="opciones-envolve">
                        <p><strong>Selecciona el tono de piel</strong></p>
                        <div id="piel" class="text-center">
                            <img id="mujerPClara" class="" onclick="piel(this.id)" src="img/colorPielClara.png">
                            <img id="mujerPMorena" class="" onclick="piel(this.id)" src="img/colorPielMorena.png">
                            <!--<img id="mujerPObscura" class="" onclick="piel(this.id)" src="img/colorPielObscura.png">-->
                        </div>
                        <p><strong>Selecciona el tipo de peinado</strong></p>
                        <div id="peinado">
                            <img id="peinadoM1" class="" onclick="peinado(this.id)" src="img/peinadoM1.png">
                            <img id="peinadoM2" class="" onclick="peinado(this.id)" src="img/peinadoM2.png">
                            <img id="peinadoM3" class="" onclick="peinado(this.id)" src="img/peinadoM3.png">
                            
                        </div>
                        <p><strong>Selecciona el color del cabello</strong></p>
                        <div id="colorCabello">
                            <img id="cCafe" class="" onclick="cCabello(this.id)" src="img/colorCabelloCafe.png">
                            <img id="cRubio" class="" onclick="cCabello(this.id)" src="img/colorCabelloRubio.png">
                            <img id="cNegro" class="" onclick="cCabello(this.id)" src="img/colorCabelloNegro.png">
                        </div>
                        <p><strong>Selecciona los aretes</strong></p>
                        <div id="accesorios">
                            <img id="accesorioM1" class="" onclick="accesorios(this.id)" src="img/aretesM1.png">
                            <img id="accesorioM2" class="" onclick="accesorios(this.id)" src="img/aretesM2.png">
                            <img id="accesorioM3" class="" onclick="accesorios(this.id)" src="img/aretesM3.png">
                        </div>
                        <p><strong>Selecciona los anteojos</strong></p>
                        <div id="anteojos">
                            <img id="anteojosM1" class="" onclick="anteojos(this.id)" src="img/anteojosM1.png">
                            <img id="anteojosM2" class="" onclick="anteojos(this.id)" src="img/anteojosM2.png">
                            <img id="anteojosM3" class="" onclick="anteojos(this.id)" src="img/anteojosM3.png">
                        </div>
                        

                        <!--<h4>Selecciona un vestuario para tu avatar</h4>
					<div id="vestuario">
						<img id="vestuarioM1" class="vestidos" onclick="vestuario(this.id)" src="img/mujer/vestuarioM1.png"><div class="zone" id="area1">Atención a clientes</div>
						<img id="vestuarioM2" class="vestidos" onclick="vestuario(this.id)" src="img/mujer/vestuarioM2.png"><div class="zone" id="area2">Ventas en campo</div>
                        <img id="vestuarioM3" class="vestidos" onclick="vestuario(this.id)" src="img/mujer/vestuarioM3.png"><div class="zone" id="area3">Técnicos</div>
                        <img id="vestuarioM4" class="vestidos" onclick="vestuario(this.id)" src="img/mujer/vestuarioM4.png"><div class="zone" id="area4">Administrativo</div>
					</div>-->
                        <div class="fin">
                            <input id="guardar" class="btn btn-primary" type="button" value="Guardar" name="guardar" onclick="guardar()">
                        </div>
                    </div>
                    <!-- ************************Opciones hombre*******************************************-->
                    <div id="opcionesH" class="opciones-envolve">
                        <p><strong>Selecciona el tono de piel</strong></p>
                        <div id="piel">
                            <img id="hombrePClara" class="" onclick="piel(this.id)" src="img/colorPielClara.png">
                            <img id="hombrePMorena" class="" onclick="piel(this.id)" src="img/colorPielMorena.png">
                            <!--<img id="hombrePObscura" class="" onclick="piel(this.id)" src="img/colorPielObscura.png">-->
                        </div>
                        <p><strong>Selecciona el tipo de peinado</strong></p>
                        <div id="peinado">
                            <img id="peinadoH1" class="" onclick="peinado(this.id)" src="img/peinadoH1.png">
                            <img id="peinadoH2" class="" onclick="peinado(this.id)" src="img/peinadoH2.png">
                            <img id="peinadoH3" class="" onclick="peinado(this.id)" src="img/peinadoH3.png">
                        </div>
                        <p><strong>Selecciona el color del cabello</strong></p>
                        <div id="colorCabello">
                            <img id="cCafe" class="" onclick="cCabello(this.id)" src="img/colorCabelloCafe.png">
                            <img id="cRubio" class="" onclick="cCabello(this.id)" src="img/colorCabelloRubio.png">
                            <img id="cNegro" class="" onclick="cCabello(this.id)" src="img/colorCabelloNegro.png">
                        </div>
                        <p><strong>Selecciona los anteojos</strong></p>
                        <div id="anteojos">
                            <img id="anteojosH1" class="" onclick="anteojos(this.id)" src="img/anteojosH1.png">
                            <img id="anteojosH2" class="" onclick="anteojos(this.id)" src="img/anteojosH2.png">
                            <img id="anteojosH3" class="" onclick="anteojos(this.id)" src="img/anteojosH3.png">
                        </div>
                        <p><strong>Selecciona la barba</strong></p>
                        <div id="accesorios">
                            <img id="accesorioH1" class="" onclick="accesorios(this.id)" src="img/barbaH1.png">
                            <img id="accesorioH2" class="" onclick="accesorios(this.id)" src="img/barbaH2.png">
                            <img id="accesorioH3" class="" onclick="accesorios(this.id)" src="img/barbaH3.png">
                        </div>
                        
                        <div class="fin">
                            <input id="guardar" class="btn btn-primary" type="button" value="Guardar" name="guardar" onclick="guardar()">
                        </div>
                    </div>
                </div><!-- *****fin opciones*******-->
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-11 col-md-4">
                    <div id="draw">
                        <div id="d01">
                            <!-- genero/color de piel -->
                        </div>
                        <div id="d02">
                            <!-- peinado/color de cabello -->
                        </div>
                        <div id="d03">
                            <!-- vestuario -->
                        </div>
                        <div id="d04">
                            <!-- Anteojos -->
                        </div>
                        <div id="d05">
                            <!-- Accesorios -->
                        </div>
                        <!--<div id="print"></div>-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id="imageAvatar"></div>
    <?php include('footer.php'); ?>
    <script type="text/javascript" src="js/avatarJS.js"></script>
    <!--<script src="../../js/animacion.js"></script>  
   <script src="js/chatbot.js"></script>
   <script src="js/bootstrap.min.js"></script>-->
</body>

</html>