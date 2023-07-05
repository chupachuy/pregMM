  <?php
  require 'funciones/valid_sess.php';
  require 'funciones/db.php';
  ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">SIM Conecta</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="avatar.php">Mi avatar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="evento.php">Nuestro evento</a>
            </li>
            <li class="nav-item">
              <a id ="a" class="nav-link" href="principal.php">Jugar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="puntuacion.php"><em>Ranking</em></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="chat.php">ChatBoot</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </div>
  </nav>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
        // console.log(location.href=='http://192.168.100.150:8080/preguntados/jugadores.php');

        $(document).ready(function(){
          $('#a').on('click', function(e){
            if(location.href =='http://192.168.100.150:8080/preguntados/jugadores.php'){
              e.preventDefault(); 
              var message = $(this).data('confirm');
              swal({
                title: "¿Estás seguro abandonar la batalla?",
                text: message, 
                icon: "warning",
                buttons:  ["No", true],
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  swal("Saliendo ...", {
                    icon: "success",
                    buttons: false,
                    timer: 3000
                  });
                  setTimeout( function() {
                        Abandonar(); //cambiar
                      }, 3000);
                } else {
                  swal("¡Has decidido no abandonar!", {
                    icon: "error",
                    buttons: false,
                    timer: 3000
                  });
                }
              });
            } else{
              window.location.href = 'principal.php';
            }
          });
        });


        function Abandonar(){
          $(document).ready(function(){
            $.ajax({
              data:  'salir',
              url:   'funciones/funciones.php',
              type:  'post',
              beforeSend: function () { },
              success:  function (response) {
                window.location.href='principal.php'
              },
              error:function(){
                alert("error")
              }
            });
          })
        }

      </script>
