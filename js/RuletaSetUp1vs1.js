var miRuleta = new Winwheel({
    'numSegments': 6, // Número de segmentos
    'outerRadius': 148,
    // 'innerRadius': 15, // Radio externo
    'drawMode': 'segmentImage',
    'segments': [ // Datos de los segmentos

/*    { 'fillStyle': '#f1c40f', 'text': 'FILOSOFIA','textFontSize' : 14, 'textFillStyle' : '#ffffff' },
    { 'fillStyle': '#2ecc71', 'text': 'SATECC','textFontSize' : 14, 'textFillStyle' : '#ffffff' },
    { 'fillStyle': '#e67e22', 'text': 'MEPLICC','textFontSize' : 14, 'textFillStyle' : '#ffffff' },
    { 'fillStyle': '#0080FF', 'text': 'TELAPACE','textFontSize' : 14, 'textFillStyle' : '#ffffff' },
    { 'fillStyle': '#FE2E2E', 'text': 'HISTORIA','textFontSize' : 14, 'textFillStyle' : '#ffffff' },*/

    // { 'image': 'img/t01.png', 'text':'FILOSOFIA'},
    // { 'image': 'img/t03.png', 'text':'SATECC'},
    // { 'image': 'img/t04.png', 'text':'MEPLICC'},
    // { 'image': 'img/t05.png', 'text':'TELAPACE'},
    // { 'image': 'img/t02.png', 'text':'HISTORIA'},
    // ],

    { 'image': 'img/t02.png', 'text':'HISTORIA'}, //TemaC
    { 'image': 'img/t06.png', 'text':'DECÁLOGO'}, //TemaD
    { 'image': 'img/t04.png', 'text':'VALORES'}, //TemaE
    { 'image': 'img/t05.png', 'text':'ESTRUCTURA'}, //TemaA
    { 'image': 'img/t03.png', 'text':'CULTURA'}, //TemaB
    { 'image': 'img/t01.png', 'text':'POLITICAS Y REGLAMENTOS'} //TemaB
    ],
    
    'pins' : false,
    'animation': {
        'type': 'spinToStop', // Giro y alto
        'spins'    : 20, 
        'duration': 5, // Duración de giro
        'callbackFinished': 'consultar()', // Función para mostrar mensaje
        'callbackAfter': 'dibujarIndicador()' // Funciona de pintar indicador
    }
});

function redireccionarPagina() {
    window.location = "index.php";
}

function My_onLoad(idBat) {

    $(document).ready(function(){
        let parametros = {
            "Puntaje" : 'Puntaje',
            "idBat" : idBat,
        };
        $.ajax({
            data:  parametros,
            url:   'funciones/funciones.php',
            type:  'post',
            beforeSend: function () { },
            success:  function (response) {                
                $("#puntaje").html(response);
                
                
            },
            error:function(){
                alert("error")
            }
        });
    })
}

function My_onLoad_p() {

    $(document).ready(function(){

        $.ajax({
            data:  'Puntaje_1',
            url:   'funciones/funciones.php',
            type:  'post',
            beforeSend: function () { },
            success:  function (response) {                
                $("#pts").html(response);
                
                
            },
            error:function(){
                alert("error")
            }
        });
    })
}

//Reiniciar todo
function reiniciar_html(){
    clearTimeout(myVar);
    totalTime = 20;
    $("#resultado_cat").show();
    $("#resultado_vacio").hide();
    //document.getElementById("resultado").innerHTML = "Categoria: ";
    document.getElementById("resultado").innerHTML = "Sin preguntas ...";
    miRuleta.stopAnimation(false);
    miRuleta.rotationAngle = 0;
    miRuleta.draw();
    dibujarIndicador();
    document.getElementById('stopConfetti').click();
    $( "#btn_ruleta" ).prop( "disabled", false ); 
    $(".res").fadeOut();
    $(".ruleta").fadeIn();
    setTimeout("My_onLoad()", 500);
    setTimeout("My_onLoad_p()", 500);
    
    $(document).ready(function(){

        $.ajax({
            data:  'Puntaje',
            url:   'funciones/funciones.php',
            type:  'post',
            beforeSend: function () { },
            success:  function (response) {                
                $("#puntaje").html(response);
                
            },
            error:function(){
                console.log("error")
            }
        });
    })
}

//Iniciar ruleta
function IniciarRuleta() {
    miRuleta.startAnimation();
    //reiniciar_html();
}

// Funciones complementarias
dibujarIndicador();

function Mensaje() {
    var SegmentoSeleccionado = miRuleta.getIndicatedSegment();
    
    swal({
        title: 'Tema:',
        text: SegmentoSeleccionado.text + "!",
        type: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok'
    }).then(function () {
        miRuleta.stopAnimation(false);
        miRuleta.rotationAngle = 0;
        miRuleta.draw();
        dibujarIndicador();
    })
    document.getElementById("resultado_cat").innerHTML = "Categoria: " + SegmentoSeleccionado.text;
    document.getElementById("pregunta").innerHTML = "Esta es una pregunta de " + SegmentoSeleccionado.text+"?";
    
}

function consultar(){

    var SegmentoSeleccionado = miRuleta.getIndicatedSegment();
    //console.log('Segmento Seleccionado: '+SegmentoSeleccionado.text)
    
    var img = '';
    
    if(SegmentoSeleccionado.text ==='HISTORIA'){
        img= "img/icon05.png";
    }
    else if(SegmentoSeleccionado.text ==='CULTURA'){
        img="img/icon04.png";
    }
    else if(SegmentoSeleccionado.text ==='VALORES'){
        img="img/icon03.png";
    }
    else if(SegmentoSeleccionado.text ==='ESTRUCTURA'){
        img="img/icon02.png";
    }
    else if(SegmentoSeleccionado.text ==='POLITICAS Y REGLAMENTOS'){
        img="img/icon01.png";
    }
    else {
        img="img/icon06.png";
    }
    // else{
    //     img ="http://2.bp.blogspot.com/-WtQS6pQgLpc/U3sQoEKELWI/AAAAAAAAAE4/CLSZmwfV9D4/s1600/geografia.png";
    // }
    
    
    swal(SegmentoSeleccionado.text, '' , img, {
        closeOnClickOutside: false,
        buttons: {
            catch: {
                text: "Jugar",
                value: "catch"
                
            },
        },
        
    }).then((value) => {
        switch (value) {
            case "catch":
            
            $(function() {
                clearTimeout(myVar);
                updateClock();
                $(".ruleta").fadeOut(); 
                $(".res").fadeIn(); 
                $( "#btn_ruleta" ).prop( "disabled", true ); 
            });
        }
    });
    
    ObtenerPregunta(SegmentoSeleccionado.text);
    return false;
    
}

function ver_respuestas(){
    var tiempoDB = 20 - parseInt($('#countdown').html());
    clearTimeout(myVar);
    
    var radioValue = $("input[name='gender']:checked").val();
    //console.log('radioValue: ' +radioValue);
    var opsValue = document.getElementById('ops').value;
    if(radioValue == undefined){

        RespuestaVacia();
        // $('#myModal').modal('show');
        $( "#btn_ruleta" ).prop( "disabled", false );
    }
    else{
        let idBat = $('#idBat').val();
        ObtenerCorrecta(radioValue, opsValue, tiempoDB, idBat);
        
        // $('#myModal').modal('show');
        $( "#btn_ruleta" ).prop( "disabled", false );
        
    }
}

function RespuestaVacia(){

    $.ajax({
        data:  'vacia', //datos que se envian a traves de ajax
        url:   'funciones/funciones.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        beforeSend: function () {
            $("#respuesta").html("Procesando, espere por favor...");
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#respuesta").html(response);
            //setTimeout(VerEstado(8002), 5000);
            
        }
    });
    
}

function dibujarIndicador() {
    var ctx = miRuleta.ctx;
    ctx.strokeStyle = 'navy';
    ctx.fillStyle = 'black';
    ctx.lineWidth = 1;
    ctx.beginPath();
    ctx.moveTo(130, 0);
    ctx.lineTo(130, 0);
    ctx.lineTo(150, 40);
    ctx.lineTo(171, 0);
    ctx.stroke();
    ctx.fill();
}

function ObtenerPregunta(categoria){
    var parametros = {
        "categoriaR" : categoria,
        "idBatR" : $("#idBat").val(),
    };
    $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   'funciones/funciones.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            //console.log('respuesta: '+response);
            $("#resultado").html(response);
            // setTimeout(VerEstado(8002), 5000);
        }
    });
}

function ObtenerCorrecta(seleccion, rseleccion, tiempoDB, idBat){
    var parametros = {
        "seleccion" : seleccion,
        "rseleccion" : rseleccion,
        "tiempoDB" : tiempoDB,
        "idBat" : idBat
    };
    $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   'funciones/funciones.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        beforeSend: function () {
            $("#respuesta").html("Procesando, espere por favor...");
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#respuesta").html(response);
            document.getElementById('respuesta').style.display = 'block';
            document.getElementById('resultado_cat').style.display = 'none';
            // document.getElementById('resultado_catRe').style.display = 'inline-block';
            $('#modRetro').modal('show');
            $('#modRetro').on('hidden.bs.modal', function (event) {
              sig_preg();
            })
            //setTimeout(VerEstado(8002), 5000);
            
        }
    });
    
}
function Resetear(){

    $(document).ready(function(){

        $.ajax({
            data:  'resetear',
            url:   'funciones/funciones.php',
            type:  'post',
            beforeSend: function () { },
            success:  function (response) {                
                $(body).html(response);
                
                
            },
            error:function(){
                // alert("error")
            }
        });
    })
}

var totalTime = 20;
var myVar;

function updateClock() {
    document.getElementById('countdown').innerHTML = totalTime;
    if(totalTime==0){
        reiniciar_html();
        $(".res").fadeOut();
        $(".ruleta").fadeIn();
        ver_respuestas();
        //console.log('Final');
        clearTimeout(myVar);
        totalTime;
        
        
    }else{
        totalTime-=1;
        myVar= setTimeout("updateClock()",1000);
    }
    
}



