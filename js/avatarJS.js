var avatar = [];
//avatar[0] = "";//genero/color de piel
//avatar[1] = "";//peinado/color de cabello
//avatar[2] = "";//vestuario
//avatar[3] = "";// anteojos
//avatar[4] = "";// accesosrio barba(Hombre) o aretes(mujer)
var tipoPeinado;
parametros = new Array();
//Prueba inicio
var avatarDefault = {
    genero: "url(img/mujer/pielObscuraM.png)",
    cabello: "url(img/mujer/peinadoMA3.png)",
    vestuario: "url(img/mujer/vestuarioM2.png)"
};
//prueba fin
function vestir() {
    document.getElementById('opcionesH').style.display = 'block';
    document.getElementById('opcionesM').style.display = 'block';
    //prueba inicio
    document.getElementById('d01').style.backgroundImage = avatarDefault.genero;
    document.getElementById('d02').style.backgroundImage = avatarDefault.cabello;
    document.getElementById('d03').style.backgroundImage = avatarDefault.vestuario;
    //prueba fin
}

function onload() {
    //alert("onload " + avatarDefault.genero);
}


/*function intentos() {
    var intentos = 1;
    parametros[7] = intentos;
}*/


/** function nNombre(id) {
    var value1 = document.idNombre.id.value;
    console.log(value1)
    parametros[6] = value1;
    console.log(parametros[6]);
} **/


function genero(id) {
    //alert(id);
    avatar[1] = ""; //resetea el tipo de peinado
    tipoPeinado = ""; //resetea la variable el tipo de peinado
    document.getElementById('d02').style.backgroundImage = avatar[1];
    if (id == "mujer") {
        vestPredefinido(id);
        document.getElementById('opcionesH').style.display = 'none';
        document.getElementById('opcionesM').style.display = 'block';
        parametros[0] = id;
    } else if (id == "hombre") {
        vestPredefinido(id);
        document.getElementById('opcionesM').style.display = 'none';
        document.getElementById('opcionesH').style.display = 'block';
        parametros[0] = id;
    }
    console.log(parametros[0]);
    //document.getElementById("print").innerHTML = avatar;
}

function vestPredefinido(gen) {

    //alert( "fuction vestPredefinido: " +gen);
    if (gen == "mujer") {
        avatar[0] = "url(img/mujer/pielClaraM.png)"; //Mujer Color de piel
        document.getElementById('d01').style.backgroundImage = avatar[0];
        avatar[1] = "calvo"; //peinado/color de cabello

        avatar[2] = "url(img/mujer/vestuarioM1.png)"; //pijama
        document.getElementById('d03').style.backgroundImage = avatar[2];

    } else if ("hombre") {
        avatar[0] = "url(img/hombre/pielClaraH.png)"; //hombre color de piel
        document.getElementById('d01').style.backgroundImage = avatar[0];
        avatar[1] = "calvo"; //peinado/color de cabello

        avatar[2] = "url(img/hombre/vestuarioH1.png)"; //pijama
        document.getElementById('d03').style.backgroundImage = avatar[2];
    } else {
        swal(
            '¡Alto!',
            'error tipo de genero',
            'error'
        )
    }
}

function piel(id) {
    //alert(id);
    switch (id) {
        //---------------------Tipo de piel MUJER-------------------------------------
        case "mujerPClara":
            avatar[0] = "url(img/mujer/pielClaraM.png)";
            document.getElementById('d01').style.backgroundImage = avatar[0];
            break;
        case "mujerPMorena":
            avatar[0] = "url(img/mujer/pielMorenaM.png)";
            document.getElementById('d01').style.backgroundImage = avatar[0];
            break;
        case "mujerPObscura":
            avatar[0] = "url(img/mujer/pielObscuraM.png)";
            document.getElementById('d01').style.backgroundImage = avatar[0];
            break;
            //----------------------Tipo de piel HOMBRE----------------------------------------
        case "hombrePClara":
            avatar[0] = "url(img/hombre/pielClaraH.png)";
            document.getElementById('d01').style.backgroundImage = avatar[0];
            break;
        case "hombrePMorena":
            avatar[0] = "url(img/hombre/pielMorenaH.png)";
            document.getElementById('d01').style.backgroundImage = avatar[0];
            break;
        case "hombrePObscura":
            avatar[0] = "url(img/hombre/pielObscuraH.png)";
            document.getElementById('d01').style.backgroundImage = avatar[0];
            break;
        default:

            swal(
                '¡Alto!',
                'error tipo de piel',
                'error'
            )
    }
    parametros[1] = id;
    //document.getElementById("print").innerHTML = avatar;
}

function peinado(id) {
    //alert(id);
    tipoPeinado = id;
    //alert("tipoPeinado: "+tipoPeinado);
    switch (id) {
        //---------------------Tipo de Peinado MUJER------------------------------
        case "peinadoM1":
            avatar[1] = "url(img/mujer/peinadoMA1.png)";
            document.getElementById('d02').style.backgroundImage = avatar[1];
            break;
        case "peinadoM2":
            avatar[1] = "url(img/mujer/peinadoMA2.png)";
            document.getElementById('d02').style.backgroundImage = avatar[1];
            break;
        case "peinadoM3":
            avatar[1] = "url(img/mujer/peinadoMA3.png)";
            document.getElementById('d02').style.backgroundImage = avatar[1];
            break;
            //---------------------Tipo de Peinado Hombre------------------------------
        case "peinadoH1":
            avatar[1] = "url(img/hombre/peinadoHA1.png)";
            document.getElementById('d02').style.backgroundImage = avatar[1];
            break;
        case "peinadoH2":
            avatar[1] = "url(img/hombre/peinadoHA2.png)";
            document.getElementById('d02').style.backgroundImage = avatar[1];
            break;
        case "peinadoH3":
            avatar[1] = "url(img/hombre/peinadoHA3.png)";
            document.getElementById('d02').style.backgroundImage = avatar[1];
            break;
        default:

            swal(
                '¡Alto!',
                'error tipo de peinadopeinado',
                'error'
            )
    }
    parametros[2] = id;
    //document.getElementById("print").innerHTML = avatar;
}

function anteojos(id) {
    //alert(id);
    tipoAnteojos = id;
    //alert("tipoAnteojos: "+tipoAnteojos);
    switch (id) {
        //---------------------Tipo de anteojos MUJER------------------------------
        case "anteojosM1":
            avatar[1] = "url(img/mujer/anteojosMA1.png)";
            document.getElementById('d04').style.backgroundImage = avatar[1];
            break;
        case "anteojosM2":
            avatar[1] = "url(img/mujer/anteojosMA2.png)";
            document.getElementById('d04').style.backgroundImage = avatar[1];
            break;
        case "anteojosM3":
            avatar[1] = "url(img/mujer/anteojosMA3.png)";
            document.getElementById('d04').style.backgroundImage = avatar[1];
            break;
            //---------------------Tipo de anteojos Hombre------------------------------
        case "anteojosH1":
            avatar[1] = "url(img/hombre/anteojosHA1.png)";
            document.getElementById('d04').style.backgroundImage = avatar[1];
            break;
        case "anteojosH2":
            avatar[1] = "url(img/hombre/anteojosHA2.png)";
            document.getElementById('d04').style.backgroundImage = avatar[1];
            break;
        case "anteojosH3":
            avatar[1] = "url(img/hombre/anteojosHA3.png)";
            document.getElementById('d04').style.backgroundImage = avatar[1];
            break;
        default:

            swal(
                '¡Alto!',
                'error tipo de Anteojos',
                'error'
            )
    }
    parametros[4] = id;
    //document.getElementById("print").innerHTML = avatar;
}

/**** ACCESORIO EN HBRE ES BARBA y EN MUJER ES ARETES **/

function accesorios(id) {
    //alert(id);
    tipoAccesorio = id;
    //alert("tipoAccesorio: "+tipoAccesorio);
    switch (id) {
        //---------------------Tipo de Accesorio MUJER------------------------------
        case "accesorioM1":
            avatar[1] = "url(img/mujer/aretesMA1.png)";
            document.getElementById('d05').style.backgroundImage = avatar[1];
            break;
        case "accesorioM2":
            avatar[1] = "url(img/mujer/aretesMA2.png)";
            document.getElementById('d05').style.backgroundImage = avatar[1];
            break;
        case "accesorioM3":
            avatar[1] = "url(img/mujer/aretesMA3.png)";
            document.getElementById('d05').style.backgroundImage = avatar[1];
            break;
            //---------------------Tipo de Accesorio Hombre------------------------------
        case "accesorioH1":
            avatar[1] = "url(img/hombre/barbaHA1.png)";
            document.getElementById('d05').style.backgroundImage = avatar[1];
            break;
        case "accesorioH2":
            avatar[1] = "url(img/hombre/barbaHA2.png)";
            document.getElementById('d05').style.backgroundImage = avatar[1];
            break;
        case "accesorioH3":
            avatar[1] = "url(img/hombre/barbaHA3.png)";
            document.getElementById('d05').style.backgroundImage = avatar[1];
            break;
        default:

            swal(
                '¡Alto!',
                'error tipo de Aretes(mujer), Barba(hombre)',
                'error'
            )
    }
    parametros[5] = id;
    //document.getElementById("print").innerHTML = avatar;
}

function cCabello(id) {
    //alert(id);
    //alert("tipoPeinado: "+tipoPeinado);
    //***************mujer**********************
    if (tipoPeinado == "peinadoM1") {
        switch (id) {

            case "cCafe":
                avatar[1] = "url(img/mujer/peinadoMA1.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            case "cRubio":
                avatar[1] = "url(img/mujer/peinadoMB1.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            case "cNegro":
                avatar[1] = "url(img/mujer/peinadoMC1.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            default:
                swal(
                    '¡Alto!',
                    'error color de cabello Cabello',
                    'error'
                )
        }
    } else if (tipoPeinado == "peinadoM2") {
        switch (id) {
            case "cCafe":
                avatar[1] = "url(img/mujer/peinadoMA2.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            case "cRubio":
                avatar[1] = "url(img/mujer/peinadoMB2.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            case "cNegro":
                avatar[1] = "url(img/mujer/peinadoMC2.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            default:
                swal(
                    '¡Alto!',
                    'error color de cabello Cabello',
                    'error'
                )
        }
    } else if (tipoPeinado == "peinadoM3") {
        switch (id) {
            case "cCafe":
                avatar[1] = "url(img/mujer/peinadoMA3.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            case "cRubio":
                avatar[1] = "url(img/mujer/peinadoMB3.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            case "cNegro":
                avatar[1] = "url(img/mujer/peinadoMC3.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            default:
                swal(
                    '¡Alto!',
                    'error color de cabello Cabello',
                    'error'
                )
        }
    } //***************hombre********************
    else if (tipoPeinado == "peinadoH1") {
        switch (id) {

            case "cCafe":
                avatar[1] = "url(img/hombre/peinadoHA1.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            case "cRubio":
                avatar[1] = "url(img/hombre/peinadoHB1.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            case "cNegro":
                avatar[1] = "url(img/hombre/peinadoHC1.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            default:
                swal(
                    '¡Alto!',
                    'error color de cabello Cabello',
                    'error'
                )
        }
    } else if (tipoPeinado == "peinadoH2") {
        switch (id) {

            case "cCafe":
                avatar[1] = "url(img/hombre/peinadoHA2.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            case "cRubio":
                avatar[1] = "url(img/hombre/peinadoHB2.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            case "cNegro":
                avatar[1] = "url(img/hombre/peinadoHC2.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            default:

                swal(
                    '¡Alto!',
                    'error color de cabello Cabello',
                    'error'
                )
        }
    } else if (tipoPeinado == "peinadoH3") {
        switch (id) {

            case "cCafe":
                avatar[1] = "url(img/hombre/peinadoHA3.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            case "cRubio":
                avatar[1] = "url(img/hombre/peinadoHB3.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            case "cNegro":
                avatar[1] = "url(img/hombre/peinadoHC3.png)";
                document.getElementById('d02').style.backgroundImage = avatar[1];
                break;
            default:
                swal(
                    '¡Alto!',
                    'error color de cabello Cabello',
                    'error'
                )
        }
    } else {


        swal(
            '¡Alto!',
            'Primero selecciona un tipo de peinado',
            'error'
        )


    }
    parametros[3] = id;
    //document.getElementById("print").innerHTML = avatar;
}

function vestuario(id) {
    //alert(id);
    switch (id) {
        //**********---------Vestuario Hombre------------***********
        case "vestuarioM1":
            avatar[2] = "url(img/mujer/vestuarioM1.png)";
            document.getElementById('d03').style.backgroundImage = avatar[2];
            break;
        case "vestuarioM2":
            avatar[2] = "url(img/mujer/vestuarioM2.png)";
            document.getElementById('d03').style.backgroundImage = avatar[2];
            break;
        case "vestuarioM3":
            avatar[2] = "url(img/mujer/vestuarioM3.png)";
            document.getElementById('d03').style.backgroundImage = avatar[2];
            break;
        case "vestuarioM4":
            avatar[2] = "url(img/mujer/vestuarioM4.png)";
            document.getElementById('d03').style.backgroundImage = avatar[2];
            break;
            //**********---------Vestuario Hombre------------***********
        case "vestuarioH1":
            avatar[2] = "url(img/hombre/vestuarioH1.png)";
            document.getElementById('d03').style.backgroundImage = avatar[2];
            break;
        case "vestuarioH2":
            avatar[2] = "url(img/hombre/vestuarioH2.png)";
            document.getElementById('d03').style.backgroundImage = avatar[2];
            break;
        case "vestuarioH3":
            avatar[2] = "url(img/hombre/vestuarioH3.png)";
            document.getElementById('d03').style.backgroundImage = avatar[2];
            break;
        case "vestuarioH4":
            avatar[2] = "url(img/hombre/vestuarioH4.png)";
            document.getElementById('d03').style.backgroundImage = avatar[2];
            break;
        default:
            swal(
                '¡Alto!',
                'error vesturaio',
                'error'
            )
    }
    parametros[4] = id;
    //document.getElementById("print").innerHTML = avatar;
}

var num = 0;

function guardar() {
    num++;
    console.log()
    FormSubmit();

    if (parametros[0] == " " || parametros[0] == null || parametros[0] == false) {
        swal(
            '¡Alto!',
            'Debes de Seleccionar tu Genero',
            'error')
        num = 0;
    } else
    if (parametros[1] == " " || parametros[1] == null || parametros[1] == false) {
        swal(
            '¡Alto!',
            'Debes de Seleccionar tu Tono de Piel',
            'error')
        num = 0;
    } else
    if (parametros[2] == " " || parametros[1] == null || parametros[2] == false) {
        swal(
            '¡Alto!',
            'Debes de Seleccionar un Tipo de Cabello',
            'error')
        num = 0;
    } else
    if (parametros[3] == " " || parametros[3] == null || parametros[3] == false) {
        swal(
            '¡Alto!',
            'Debes de Seleccionar un Color de Cabello',
            'error')
        num = 0;
    }else
    if (parametros[4] == " " || parametros[4] == null || parametros[4] == false){
        swal(
            '¡Alto!',
            'Debes de Seleccionar unos anteojos',
            'error')
        num = 0;
    }else
    if (parametros[5] == " " || parametros[5] == null || parametros[5] == false) {
        swal(
            '¡Alto!',
            'Debes de Seleccionar unos accesorios (mujer) o barba(Hombre)',
            'error')
        num = 0;

    }
    /*else
    if(parametros[4]==" "||parametros[4]==null||parametros[4]==false){
    	swal(
      '¡Alto!',
      'Debes de Seleccionar un Vestuario',
      'error')
    num=0;
    }*/
    else {

        if (num == 1) {
            /*swal(
                '¡Excelente elección!')
                */
            //console.log(parametros[0], parametros[1], parametros[2], parametros[3], parametros[4],  parametros[5]);
            console.log("parametros[0] == "+ '"'+parametros[0]+'"'+' && '+ "parametros[1] == "+ '"'+parametros[1]+'"'+' && '+"parametros[2] == "+ '"'+parametros[2]+'"'+' && '+"parametros[3] == "+ '"'+parametros[3]+'"'+' && '+"parametros[4] == "+ '"'+parametros[4]+'"'+' && '+"parametros[5] == "+ '"'+parametros[5]+'"');
            TweenMax.fromTo($("#ins2"), .5, { x: 30, opacity: 0 }, { x: 40, opacity: 1, repeat: -1, delay: 1, yoyo: true });
            //animacionentrada($("#ins2"),an[4],2,1);

            /*if (parametros[0] == "hombre") {
                parametros[4] = 'vestuarioH1';
            } else {
                parametros[4] = 'vestuarioM1';
            }*/

            //parent.sumaPuntos(5);
            //parent.actualiza(parametros);
            //parent.pagVista();

            var img = document.createElement("img");
            var src = document.getElementById("imageAvatar");
            src.appendChild(img);

            if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                    text: 'hombre hombrePClara peinadoH1 cCafe anteojosH1'
                })
                img.src = "img/avatarhombre/blanco-cabello1castano-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                 swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blancocabello1castano-anteojos2-nobarba.png";

            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1castano-barba1-anteojos1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1castano-barba1-anteojos2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1castano-barba1-noateojos.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1castano-barba2-anteojos1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1castano-barba2-anteojos2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1castano-barba2-noateojos.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1castano-nolentes-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1negro-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1negro-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1negro-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1negro-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1negro-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1negro-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1negro-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1negro-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1negro-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1rubio-anteojos1-barba1.png";    
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1rubio-anteojos1-barba2.png"; 
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){ 
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1rubio-anteojos1-nobarba.png"; 
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1rubio-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1rubio-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1rubio-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1rubio-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1rubio-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello1rubio-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2castano-anrteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2castano-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2castano-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2castano-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2castano-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2castano-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2castano-noanteojos-nonabarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2catano-noatenojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2negro-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2negro-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara"  && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2negro-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2negro-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2negro-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2negro-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2negro-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2negro-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2negro-noanteojos-nolentes.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2rubio-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2rubio-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2rubio-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2rubio-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2rubio-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2rubio-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2rubio-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2rubio-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello2rubio-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3castano-anteojos1-baraba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3castano-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3castano-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3castano-anteojos2-barba1.png";
            }else  if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3castano-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3castano-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3castano-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3castano-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3castano-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3negro-antejos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3negro-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3negro-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3negro-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3negro-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3negro-anteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3negro-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3negro-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3negro-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3rubio-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3rubio-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3rubio-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3rubio-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3rubio-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3rubio-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3rubio-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3rubio-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/blanco-cabello3rubio-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1castano-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1castano-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1castano-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1castano-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1castano-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1castano-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1castano-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1castano-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1castano-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1negro-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1negro-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1negro-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1negro-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1negro-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1negro-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1negro-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1negro-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1negro-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1rubio-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1rubio-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1rubio-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1rubio-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1rubio-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1rubio-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1rubio-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1rubio-noanteojos-barba2.png";
            }else  if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH1" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello1rubio-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello2castano-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello2castano-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello2castano-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello2castano-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello2castano-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello2castano-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello2castano-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!",
                })
                img.src = "img/avatarhombre/moreno-cabello2castano-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2castano-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2negro-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2negro-anteojos1-barba2.png";
            }else  if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2negro-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2negro-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2negro-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2negro-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2negro-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2negro-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2negro-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2rubio-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2rubio-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2rubio-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2rubio-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2rubio-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2rubio-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2rubio-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2rubio-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH2" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello2rubio-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3castano-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3castano-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3castano-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3castano-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3castano-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3castano-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3castano-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3castano-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cCafe" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3castano-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3negro-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3negro-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3negro-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3negro-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3negro-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3negro-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3negro-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3negro-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cNegro" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3negro-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3rubio-anteojos1-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3rubio-anteojos1-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH1" && parametros[5] == "accesorioH3"){
                 swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3rubio-anteojos1-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3rubio-anteojos2-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3rubio-anteojos2-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3rubio-anteojos2-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3rubio-noanteojos-barba1.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3rubio-noanteojos-barba2.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePMorena" && parametros[2] == "peinadoH3" && parametros[3] == "cRubio" && parametros[4] == "anteojosH3" && parametros[5] == "accesorioH3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/moreno-cabello3rubio-noanteojos-nobarba.png";
            }else if(parametros[0] == "hombre" && parametros[1] == "hombrePClara" && parametros[2] == "peinadoH2" && parametros[3] == "cCafe" && parametros[4] == "anteojosH2" && parametros[5] == "accesorioH2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarhombre/blanco-cabello2castano-anteojos2-barba2.png";


            /******* AVATARES MUJER ***/
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1castano-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1castano-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1castano-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1castano-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1castano-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
               swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1castano-aretes2-noanteojos.png"; 
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1castano-noaretes-anteojos1.png"; 
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1castano-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1castano-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1negro-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1negro-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1negro-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1negro-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1negro-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1negro-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1negro-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1negro-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1negro-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1rubio-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1rubio-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1rubio-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1rubio-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1rubio-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1rubio-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1rubio-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1rubio-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello1rubio-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2castano-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2castano-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2castano-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2castano-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2castano-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2castano-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2castano-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2castano-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2castano-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2negro-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2negro-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2negro-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2negro-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2negro-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2negro-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2negro-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2negro-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2negro-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2rubio-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2rubio-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2rubio-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2rubio-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2rubio-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2rubio-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2rubio-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2rubio-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2rubio-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello2rubio-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3castano-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3castano-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3castano-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3castano-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3castano-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3castano-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3castano-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3castano-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3castano-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3negro-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3negro-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3negro-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3negro-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3negro-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3negro-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3negro-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3negro-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3negro-noaretes-noanteoojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3rubio-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3rubio-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3rubio-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3rubio-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3rubio-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3rubio-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3rubio-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3rubio-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPClara" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/blanca-cabello3rubio-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1castano-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1castano-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1castano-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1castano-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1castano-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1castano-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1castano-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1castano-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1castano-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1negro-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1negro-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1negro-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1negro-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1negro-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1negro-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1negro-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1negro-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1negro-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1rubio-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1rubio-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1rubio-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1rubio-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1rubio-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1rubio-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1rubio-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1rubio-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM1" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello1rubio-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2castano-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2castano-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2castano-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2castano-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2castano-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2castano-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2castano-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2castano-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2castano-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2negro-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2negro-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2negro-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2negro-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2negro-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2negro-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2negro-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2negro-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2negro-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2rubio-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2rubio-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2rubio-aretes1-noateojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2rubio-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2rubio-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2rubio-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2rubio-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2rubio-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM2" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello2rubio-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3castano-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3castano-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3castano-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3castano-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3castano-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3castano-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3castano-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3castano-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3castano-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cCafe" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3castano-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3negro-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3negro-aretes1-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3negro-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3negro-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3negro-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3negro-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3negro-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3negro-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cNegro" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3negro-noaretes-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3rubio-aretes1-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3rubio-aretes1-anteojos2.png";
            }else  if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM1"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3rubio-aretes1-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3rubio-aretes2-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3rubio-aretes2-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM2"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3rubio-aretes2-noanteojos.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM1" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3rubio-noaretes-anteojos1.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM2" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3rubio-noaretes-anteojos2.png";
            }else if(parametros[0] == "mujer" && parametros[1] == "mujerPMorena" && parametros[2] == "peinadoM3" && parametros[3] == "cRubio" && parametros[4] == "anteojosM3" && parametros[5] == "accesorioM3"){
                swal({
                    title: "¡Excelente elección!"
                })
                img.src = "img/avatarmujer/morena-cabello3rubio-noaretes-noanteojos.png";
            }
    
            else{
                swal(
                '¡Excelente elección!'
                );
                
            }
            var parametrosAvatar = {
                "dir" : img.src
            };
            $.ajax({
                data: parametrosAvatar,
                url: 'guardAvatar.php',
                type: 'post',
                beforeSend: function() {},
                success: function(responseComp) {
                    // alert(responseComp);
                    swal('¡Excelente elección!');
                    setTimeout(function() {
                        window.location = 'principal.php';
                    }, 1000);
                },
                error: function() {
                    swal('Error');
                }
            });
        
        }

    }
}