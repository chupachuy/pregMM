  <?php
include("utilidades/conexion.php");
$nombre = $_SESSION['username'];

$preguntas = "select * from preguntas";
$preguntas2 = mysqli_query($con, $preguntas);
$tpreguntas = mysqli_num_rows($preguntas2);

$respuestas = "select * from respuestas";
$respuestas2 = mysqli_query($con, $respuestas);
$trespuestas = mysqli_num_rows($respuestas2);

$categorias = "select * from categoria";
$categorias2 = mysqli_query($con, $categorias);
$tcategorias = mysqli_num_rows($categorias2);

$premios = "select * from premios";
$premios2 = mysqli_query($con, $premios);
$tpremios = mysqli_num_rows($premios2);

$usuarios = "select * from login";
$usuarios2 = mysqli_query($con, $usuarios);
$tusuarios = mysqli_num_rows($usuarios2);


$nombreC = "select nombre from login where username='$nombre'";
$usuarios3 = mysqli_query($con, $nombreC);
$usuario =  mysqli_fetch_array($usuarios3);

  ?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="imagenes/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <b> <?php  echo $usuario['nombre']?></b><br>
        </div>
      </div>


      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú</li>
        <li>
          <a href="principal.php">
            <i class="fa fa-home"></i> <span>Inicio</span>
          </a>
        </li>
        <li>
          <a href="preguntas.php">
            <i class="fa-solid fa-comment"></i> <span>Gestión de Preguntas</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-blue"><?php echo $tpreguntas; ?></small>
            </span>
          </a>
        </li>
        <li>
          <a href="respuestas.php">
            <i class="fa fa-comments"></i> <span>Gestión de Respuestas</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?php echo $trespuestas;?></small>
            </span>
          </a>
        </li>
        <li>
          <a href="categorias.php">
            <i class="fa fa-sort-alpha-desc"></i> <span>Gestión de Categorías</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php echo $tcategorias;?></small>
            </span>
          </a>
        </li>
        <li>
          <a href="premios.php">
            <i class="fa fa-tags"></i> <span>Gestión de Premios</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?php echo $tpremios;?></small>
            </span>
          </a>
        </li>
        <li>
          <a href="usuarios.php">
            <i class="fa fa-users"></i> <span>Gestión de Usuarios</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $tusuarios;?></small>
            </span>
          </a>
        </li> 
        <li>
          <a href="logout.php">
            <i class="fa fa-power-off"></i> <span>Salir</span>
          </a>
        </li>
      
      </ul>
    </section>
  </aside>