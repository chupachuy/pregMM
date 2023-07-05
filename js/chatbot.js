$(document).ready(function() {

    $("#btn_chat").click(function(){

        $("#phone-wrapper").each(function() {

            displaying = $(this).css("display");

            if(displaying == "block") {

                $(this).fadeOut('slow',function() {

                    $(this).css("display","none");
                });
            } else {

                $(this).fadeIn('slow',function() {

                    $(this).css("display","block");

                });
            }
        });
    });


    /******************/
    /*** START CHAT ***/
    /******************/


    // establecer el nombre del visitante
    let $userName = "X";

    // start chatbox
    $("#form-start").on("submit", (event) => {

        event.preventDefault();
        $userName = $("#username").val();
        $("#landing").slideUp(300);

        setTimeout(() => {

            $("#start-chat").html("Continue chat")

        }, 300);
    });

    /*****************/
    /*** USER CHAT ***/
    /*****************/


    // Publicar un mensaje en el tablero
    function $postMessage() {

        $("#message").find("br").remove();
        let $message = $("#message").html().trim(); // get text from text box
        $message = $message.replace(/<div>/, "<br>").replace(/<div>/g, "").replace(/<\/div>/g, "<br>").replace(/<br>/g, " ").trim();
        if ($message) { // if text is not empty
            const html = `<div class="post post-user">${$message + timeStamp()}</span></div>`; // convert post to html
            $("#message-board").append(html); // add post to board
            $scrollDown(); // stay at bottom of chat
            botReply($message);
        };
        $("#message").empty();

    };

    // Entrada de chat
    $("#message").on("keyup", (event) => {

        if (event.which === 13) $postMessage(); // Use enter para enviar
    }).on("focus", () => {

        $("#message").addClass("focus");
    }).on("blur", () => {

        $("#message").removeClass("focus");
    });
    $("#send").on("click", $postMessage);




    /**********************/
    /*** AUTO REPLY BOT ***/
    /**********************/


    function botReply(userMessage) {

        const reply = generateReply(userMessage);
        if (typeof reply === "string") postBotReply(reply);
        else reply.forEach((str) => postBotReply(str));
    };

    function generateReply(userMessage) {

        const message = userMessage.toLowerCase();
        let reply = [`Lo siento, no te entiendo.`, `¡Inténtalo de nuevo por favor!`];

        // Generar algunas respuestas diferentes.
        if
            (/^buenos días|^buen día|^buenas tardes|^buenas noches|^hola/.test(message)) reply = [`¡Hola ${$userName}!`, `¡Bienvenido al chatbot de Preguntados!`, `¿Cómo puedo ayudarte?`];

        else if 
            (/^cómo aumento la dificulta?d|¿cómo aumento la dificulta?d|¿Cómo aumento la dificulta?d|¿Cómo disminuyo la dificulta?d|¿cómo disminuyo la dificulta?d|^cómo disminuyo la dificulta?d/.test(message)) reply = [`Conforme respondas correctamente más preguntas del mismo tema, aumenta el grado de dificultad.`, `Sé que puedes. Te reto a ganar.`];

        else if 
            (/^necesito tu ayuda|^ayudame|^ayuda|^help|^emergencia|^soporte/.test(message)) reply = [`Estoy aquí para ayudar.`, `¿Qué problema tiene?`];

        else if 
            (/^cómo puedo jugar con más persona?s|^cómo puedo jugar con otras persona?s|¿Cómo puedo jugar con otras persona?s|¿Cómo puedo jugar con más persona?s|¿cómo puedo jugar con más persona?s|¿cómo puedo jugar con otras persona?s/.test(message)) reply = [`Cuando otras personas de Grupo Bimbo estén conectadas, te aparecerá la opción al inicio del juego.`];

        else if 
            (/^cómo puedo retar a la misma person?a|^¿cómo puedo retar a la misma person?a|¿Cómo puedo retar a la misma person?a|^cómo puedo invitar a la misma person?a|¿Cómo puedo invitar a la misma person?a|¿cómo puedo invitar a la misma person?a/.test(message)) reply = [`Si ambas personas están conectadas, puedes volverla a retar.`];

        else if 
            (/^puedo retomar un juego anterio?r|¿puedo retomar un juego anterio?r|¿Puedo retomar un juego anterio?r/.test(message)) reply = [`Cada sesión es un nuevo inicio.`];

        else if 
            (/¿Cómo cambio de categorí?a|¿cómo cambio de categorí?a|^cómo cambio de categorí?a|¿Cómo cambio de áre?a|¿cómo cambio de áre?a|^cómo cambio de áre?a|¿Cómo cambio de secció?n|¿cómo cambio de secció?n|^cómo cambio de secció?n|^cómo cambio de tem?a|¿Cómo cambio de tem?a|¿cómo cambio de tem?a/.test(message)) reply = [`Antes de comenzar el juego, Preguntados te da la opción.`, `Actualiza la app.`];

        else if 
            (/^qué es MEPLIC?C|¿Qué es MEPLIC?C|¿qué es MEPLIC?C|^cuál es nuestra visió?n|¿Cuál es nuestra visió?n|¿cuál es nuestra visió?n|^cuál es la visión de Grupo Bimb?o|¿Cuál es la visión de Grupo Bimb?o|¿cuál es la visión de Grupo Bimb?o|¿En qué año surge Grupo Bimb?o|¿en qué año surge Grupo Bimb?o|^en qué año surge Grupo Bimb?o/.test(message)) reply = [`Eso es trampa. Investiga y aprende en la siguiente liga.`];
        else if 
            (/^gracias|^adiós|^adios|^hasta luego/.test(message)) reply = [`Un placer poder ayudar.`];


        else if 
            (/^cómo se jueg?a|¿Cómo se jueg?a|¿cómo se jueg?a/.test(message)) reply = [`Puedes jugar solo o con otros compañeros. Eliges un tema, giras la ruleta y respondes correctamente, pero ¡aguas!, porque tienes tiempo limitado.`];

        else if 
            (/^cómo gan?o|¿Cómo gan?o|¿cómo gan?o/.test(message)) reply = [`¡Depende de ti! Qué tanto conoces Grupo Bimbo.`, `Te reto a ganar.`];

        else if 
            (/^se trabó la rulet?a|¿Se trabó la rulet?a|¿se trabó la rulet?a|^la ruleta no gir?a/.test(message)) reply = [`Actualiza la aplicación, por favor.`];

        else if 
            (/^cómo subo de nive?l|¿Cómo subo de nive?l|¿cómo subo de nive?l/.test(message)) reply = [`Eres todo un retador.`, `Conforme avanzas en cada tema, subes de nivel.`];

        else if 
            (/^oye/.test(message)) reply = [`¿Qué sucede ${$userName}?`];

        else if 
            (/^tengo una duda/.test(message)) reply = [`¡Claro!`, `¿Qué duda tienes?`];

        else if 
            (/^qué es Preguntado?s|¿Qué es Preguntado?s|¿qué es Preguntado?s|¿Qué es preguntado?s|¿qué es preguntado?s|qué es preguntado?s/.test(message)) reply = [`Es una aplicación en la que, a través de trivias, demuestras tus conocimientos acerca de Grupo Bimbo y, además aprendes.`];


        return reply;
    };

    function postBotReply(reply) {

        const html = `<div class="post post-bot">${reply + timeStamp()}</div>`;
        const timeTyping = 500 + Math.floor(Math.random() * 2000);
        $("#message-board").append(html);
        $scrollDown();
    };



    /******************/
    /*** TIMESTAMPS ***/
    /******************/

    function timeStamp() {

        const timestamp = new Date();
        const hours = timestamp.getHours();
        let minutes = timestamp.getMinutes();
        if (minutes < 10) minutes = "0" + minutes;
        const html = `<span class="timestamp">${hours}:${minutes}</span>`;
        return html;

    };

    /***************/
    /*** CHAT UI ***/
    /***************/

    // Botón de flecha hacia atrás
    $("#back-button").on("click", () => {

        $("#landing").show();

    });


    // Menu - navigation
    $("#nav-icon").on("click", () => {

        $("#nav-container").show();

    });

    $("#nav-container").on("mouseleave", () => {

        $("#nav-container").hide();

    });

    $(".nav-link").on("click", () => {

        $("#nav-container").slideToggle(200);

    });

    // Borrar historial
    $("#clear-history").on("click", () => {

        $("#message-board").empty();
        $("#message").empty();

    });

    // Desconectar
    $("#sign-out").on("click", () => {

        $("#message-board").empty();
        $("#message").empty();
        $("#landing").show();
        $("#username").val("");
        $("#start-chat").html("Start chat");

    });


    /*********************/
    /*** SCROLL TO END ***/
    /*********************/

    function $scrollDown() {

        const $container = $("#message-board");
        const $maxHeight = $container.height();
        const $scrollHeight = $container[0].scrollHeight;
        if ($scrollHeight > $maxHeight) $container.scrollTop($scrollHeight);

    }

    /***************/
    /*** EMOIJIS ***/
    /***************/

    // toggle emoijis
    // $("#emoi").on("click", () => {
    //     $("#emoijis").slideToggle(300);
    //     $("#emoi").toggleClass("fa fa-grin far fa-chevron-down");
    // });

    // // agregar emoiji al mensaje
    // $(".smiley").on("click", (event) => {
    //     const $smiley = $(event.currentTarget).clone().contents().addClass("fa-lg");
    //     $("#message").append($smiley);
    //     $("#message").select(); // ==> BUG: message field not selected after adding smiley !! 
    // });

});