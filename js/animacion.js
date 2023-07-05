    document.write("<script src='../../js/jQueryUI/jquery.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.ui.core.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.ui.widget.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.ui.dialog.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.ui.mouse.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.ui.position.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.ui.resizable.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.ui.draggable.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.effects.core.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.effects.blind.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.effects.drop.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.effects.fold.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.effects.explode.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.effects.fade.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.effects.pulsate.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.effects.scale.min.js'></script>");
    document.write("<script src='../../js/jQueryUI/jquery.effects.shake.min.js'></script>");

//**Animación HTML5 /JQUERY/ GSAP
//*******Diego Rojas Marcial / Mayo-2016*****

var objetos = ContenedorPantalla.getElementsByTagName('div');
$("body").css("opacity",1);


for (myVar=0;myVar<objetos.length;myVar++){
    if(objetos[myVar].parentNode.id == "ContenedorPantalla"){
      objetos[myVar].style.opacity=0; 
        console.log(objetos[myVar].parentNode.id);
       }
    $(objetos[myVar]).attr("posx",$(objetos[myVar]).css("left"));
    $(objetos[myVar]).attr("ID",objetos[myVar].id);
    $(objetos[myVar]).attr("posy",$(objetos[myVar]).css("top"));
    $(objetos[myVar]).attr("alto",$(objetos[myVar]).css("height"));
    $(objetos[myVar]).attr("ancho",$(objetos[myVar]).css("width")); 
    
    ////console.log($(objetos[myVar]).attr("ID"));
    
}    
      

 function allOpacity(){
   var objetos = ContenedorPantalla.getElementsByTagName('div');
 for (myVar=0;myVar<objetos.length;myVar++){
    TweenMax.to(objetos[myVar],1,{opacity:1});
}

 }     


function animacionentrada(obj,tipo,tiempo,retardo,funcionSigue){
    
    var Nombre = $(obj).attr("ID");
    var Obj_x = $(obj).attr("posx");
    var Obj_y = $(obj).attr("posy");
    var Obj_h = $(obj).attr("alto");
    var Obj_w = $(obj).attr("ancho");
    
    
    if(funcionSigue == undefined){

       funcionSigue = Nada; 
    }
    
    switch(tipo){
            
        case "alpha":
        TweenMax.fromTo(obj,tiempo,{opacity:0},{opacity:1,onComplete:funcionSigue});
        //console.log("Obj:" + Nombre + " animacion:alpha");    
        break;
        
        case "izq-der":
        TweenMax.fromTo(obj,tiempo,{opacity:0,left:(parseInt(Obj_x) - parseInt(Obj_w))},{opacity:1,left:Obj_x,ease:Back.easeOut,delay:retardo,onComplete:funcionSigue});
        //console.log("Obj:" + Nombre + " animacion:izq-der");                
        break; 

        case "der-izq":
        TweenMax.fromTo(obj,tiempo,{opacity:0,left:(parseInt(Obj_x) + parseInt(Obj_w)) },{opacity:1,left:Obj_x,ease:Back.easeOut,delay:retardo,onComplete:funcionSigue});
        //console.log("Obj:" + Nombre + " animacion:izq-der");                
        break; 
            
        case "arriba-abajo":
        TweenMax.fromTo(obj,tiempo,{opacity:0,top:(parseInt(Obj_y) - parseInt(Obj_h))},{opacity:1,top:Obj_y,ease:Back.easeOut,delay:retardo,onComplete:funcionSigue});
        //console.log("Obj:" + Nombre + " animacion:arriba-abajo");                
        break; 
            
        case "abajo-arriba":
        TweenMax.fromTo(obj,tiempo,{opacity:0,top:(parseInt(Obj_y) + parseInt(Obj_h))},{opacity:1,top:Obj_y,ease:Back.easeOut,delay:retardo,onComplete:funcionSigue});
        //console.log("Obj:" + Nombre + " animacion:abajo-arriba");                
        break;             
        
        case "gira":
        TweenMax.fromTo(obj,tiempo,{opacity:0,top:(parseInt(Nombre) - parseInt(Nombre))},{opacity:1,top:Nombre,rotation:360,delay:retardo,onComplete:funcionSigue});
        //console.log("Obj:" + Nombre + " animacion:abajo-arriba");  
            //TweenMax.to($("#engrane1"),3,{rotation:360});
        break;   
            
        case "explota":
            $(obj).css("opacity",1);
            $(obj).show( "explode", 1000, funcionSigue);
        break;      
            
        case "fold":
            $(obj).css("opacity",1);
            $(obj).show( "fold", 500, funcionSigue);
        break;  
            
        case "drop":
            $(obj).css("opacity",1);
            $(obj).show( "drop", 500, funcionSigue);
        break;  
            
        case "pulsate":
            $(obj).css("opacity",1);
            $(obj).show( "pulsate", 300, funcionSigue);
        break;      
   
        case "scale":
            $(obj).css("opacity",1);
            $(obj).show( "scale", 1000, funcionSigue);
        break;    
            
        case "shake":
            $(obj).css("opacity",1);
            $(obj).show( "shake", 500, funcionSigue);
        break;     
    }    
    
    function Nada(){
        //console.log("Obj:" + Nombre + " funcion:No sigue");     
    }
        
}

function animacionsalida(obj,tipo,tiempo,retardo,funcionSigue){
    
    var Nombre = $(obj).attr("ID");
    var Obj_x = $(obj).attr("posx");
    var Obj_y = $(obj).attr("posy");
    var Obj_h = $(obj).attr("alto");
    var Obj_w = $(obj).attr("ancho");
    
    
    if(funcionSigue == undefined){

       funcionSigue = Nada; 
    }
    
    switch(tipo){
            
        case "alpha":
        TweenMax.to(obj,tiempo,{opacity:0,onComplete:funcionSigue});
        //console.log("Obj:" + Nombre + " animacion:alpha");    
        break;
        
        case "izq-der":
        TweenMax.to(obj,tiempo,{opacity:0,left:(parseInt(Obj_x) + parseInt(Obj_w)),ease:Back.easeIn,delay:retardo,onComplete:funcionSigue});
        //console.log("Obj:" + Nombre + " animacion:izq-der");                
        break; 

        case "der-izq":
        TweenMax.to(obj,tiempo,{opacity:0,left:(parseInt(Obj_x) - parseInt(Obj_w)),ease:Back.easeIn,delay:retardo,onComplete:funcionSigue});
        //console.log("Obj:" + Nombre + " animacion:izq-der");                
        break; 
            
        case "arriba-abajo":
        TweenMax.to(obj,tiempo,{opacity:0,top:(parseInt(Obj_y) + parseInt(Obj_h)),ease:Back.easeIn,delay:retardo,onComplete:funcionSigue});
        //console.log("Obj:" + Nombre + " animacion:arriba-abajo");                
        break; 
            
        case "abajo-arriba":
        TweenMax.to(obj,tiempo,{opacity:0,y:(parseInt(Obj_y) - parseInt(Obj_h)),ease:Back.easeIn,delay:retardo,onComplete:funcionSigue});
        //console.log("Obj:" + Nombre + " animacion:abajo-arriba");                
        break;      
            
        case "gira":
        TweenMax.to(obj,tiempo,{opacity:0,top:Nombre,rotation:360,delay:retardo,onComplete:funcionSigue});
        //console.log("Obj:" + Nombre + " animacion:abajo-arriba");  
            //TweenMax.to($("#engrane1"),3,{rotation:360});
        break;      
          
        case "explota":
        $(obj).hide( "explode", 1000);    
        break; 
            
         case "fold":
            $(obj).hide( "fold", 1000);
        break;  
            
        case "drop":
            $(obj).hide( "drop", 1000);
        break;  
            
        case "pulsate":
            $(obj).hide( "pulsate", 2000);
        break;      
   
        case "scale":
            $(obj).hide( "scale", 1000);
        break;    
            
        case "shake":
            $(obj).hide( "shake", 1000);
        break;         
    }    
    
    function Nada(){
        //console.log("Obj:" + Nombre + " funcion:No sigue");     
    }
        
}