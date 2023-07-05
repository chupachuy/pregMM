<?php 
include('session.php');
include('nav.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preguntados | ChatBot</title>
    <script src="js/TweenMax.min.js"></script>
    <script src="js/Winwheel.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css'>

    <!-- Boostrap v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>@import url('https://fonts.cdnfonts.com/css/nasalization-2');</style>

    <link rel="stylesheet" href="css/style.css">
    <link href="css/preguntados.css" rel="stylesheet">

</head>
<body>

    <!-- <div class="container theme-showcase" role="main"> -->
        <!-- <div class="row"> -->
            <!-- <div class="panel panel-primary">   -->
                <div id="app" style="height: 80%;">
                    <div id="landing" class="bg-dark text-light" style="">
                        <span class="fas fa-robot fa-4x"></span>
                        <div>
                            <h1 class="mt-3">ChatBot - GSIM</h1>
                        </div>
                        <form id="form-start">
                            <input type="hidden" name="username" id="username" value="<?php echo $_SESSION['login_user'] ?>">
                            <button class="btn btn-primary" type="submit" id="start-chat">Iniciar ChatBot</button>
                        </form>
                    </div>
                    <div id="header" class="bg-dark">
                        <div></div>
                        <div class="text-light align-center">
                            <h2>ChatBot</h2>
                        </div>
                    </div>
                    <div id="message-board">
                    </div>
                    <div id="form" class="bg-light" style="bottom: 3em;">
                        <div><!-- <button id="emoi" class="btn-transparent btn-icon far fa-grin"></button> --></div>
                        <div id="message" placeholder="Type your message here" rows="1" contenteditable></div>
                        <div><button id="send" type="" class="btn-transparent btn-icon fas fa-paper-plane"></button></div>
                    </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->
    <script src="js/chatbot.js"></script>
    <?php include('footer.php'); ?>

</body>
</html>
