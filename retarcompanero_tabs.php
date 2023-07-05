<?php
session_start();
error_reporting(0);

// ______________________________________________________________________ Tab 1
if ( isset($_POST['tabRetar'] )) {

	include('funciones/db.php');
	 $registro = mysqli_query($conexion, "SELECT * FROM login");
	 if(mysqli_num_rows($registro)>1){
	  while($registro2 = mysqli_fetch_array($registro)){
	  	$idLogin = $_SESSION['id_login'];
	    if ($idLogin == $registro2['id_login']) {}else{
	        $idlogin = $registro2['id_login'];
	        $username = $registro2['username'];
	        $pass = "pendiente";
	        $nivel = $registro2['level'];
	        $nombreCompleto = $registro2['nombre'];
	        $puntos = $registro2['Puntaje'];

	        $id = $registro2['id_turno'];
	        $activo = $registro2['turno'];
	        $idRetador = $_SESSION['id_login'];
	        if ( $registro2['status'] == '0' || $nivel == "2" ) {
	            $estado = 'Offline';
	        }else{
	            $estado = 'Online';
	            echo '<tr>
	            <td style="text-align: center">'.$nombreCompleto.'</td>
	            <td style="text-align: center">'.$username.'</td>'?>
	            <?php echo' <td>
	            <div class="row">
	            <div class="col-md-12">
	            <form action="retar.php" method="post">

	            <input type="hidden" name="jugadorUno" value="'.$idRetador.'">
	            <input type="hidden" name="jugadorDos" value="'.$idlogin.'">
	            <input type="hidden" name="estatus" value="'.$pass.'">
	           

	            <button id="retar" name="retar" type="submit" class="btn btn-info">Retar compañero<i class="fa fa-pencil-square-o"></i></button>
	            </form>
	            </div>
	           
	            </div>


	            </td>
	            </tr>';
	        }
	        
	    }
	  }
	}else{
	  echo '<tr>
	  <td colspan="6">No se encontraron resultados</td>
	  </tr>';
	}
}
// ______________________________________________________________________ Tab 1




// ______________________________________________________________________ Tab 2
if ( isset($_POST['tabYoReto']) ) {

	include('funciones/db.php');

	 $idRetador = $_SESSION['id_login'];
	 $registro = mysqli_query($conexion, "select d.id as id, l.nombre as name, lg.nombre as named, d.status as status from desafios d inner join login l ON id_jugador1 = l.id_login inner join login lg on id_jugador2 = lg.id_login where d.id_jugador1 ='$idRetador';");
	 if(mysqli_num_rows($registro)>0){
	  while($registro3 = mysqli_fetch_array($registro)){
	    $name = $registro3['name'];
	    $named = $registro3['named'];
	    $status = $registro3['status'];
	    $id = $registro3['id'];

	    $queryBata = mysqli_query($conexion, 'SELECT * FROM batallas WHERE id_desafio = '.$id);
	    $resBata = mysqli_fetch_array($queryBata);

	    if ($resBata['jugadorGanador']) {
	        $queryGanador = mysqli_query($conexion, 'SELECT * FROM login WHERE id_login = '.$resBata['jugadorGanador']);
	        $resGanador = mysqli_fetch_array($queryGanador);
	        $resGan = $resGanador['nombre'];
	    }else{
	        $resGan = '';
	    }

	    
	    $estatusMos = '';
	    if ( $status == 'pendiente' ) {
	        $estatusMos = '<button id="aceptar" name="iniciar" type="button" class="btn btn-success btnIrReto" data-iddes="'.$id.'" disabled>Aceptar<i class="fa fa-pencil-square-o"></i></button>';
	    }else if ( $status == 'en progreso' ) {
	        if ( count(json_decode($resBata['preguntas_vistas_j1'])) >= $resBata['limite_preguntas'] ) {
	            $estatusMos = '<p style="color: #FFF;">Ya terminaste tus turnos. Falta que tu contrincante termine.</p> ';
	        }else{
	            $estatusMos = '<button id="aceptar" name="iniciar" type="button" class="btn btn-warning btnIrReto" data-iddes="'.$id.'">Continuar<i class="fa fa-pencil-square-o"></i></button>';
	        }
	    }else if ( $status == 'terminado' ) {
	        $estatusMos = '<p style="color: #FFF;">Ganador: '.$resGan.'</p>';
	    }
	                  
	    
	    echo '<tr>
	    <td style="text-align: center">'.$name.'</td>
	    <td style="text-align: center">'.$named.'</td>
	    <td style="text-align: center">'.$status.'</td>'?>
	                <?php echo' <td>
	    <div class="row">
	    <div class="col-md-6">
	    <form action="retar.php" method="post">
	    <input type="hidden" name="iddesafio" id="iddesafio_'.$id.'" value="'.$id.'">
	    
	    '.$estatusMos.'
	    
	    </form>
	    </div>
	    <div class="col-md-6">
	    <form action="eliminarDe.php" method="post" onsubmit="return confirmation()">
	    <input type="hidden" name="id" value="'.$id.'">
	    <button type="submit" name="eliminado" class="btn btn-danger">Eliminar desafío<i class="fa fa-trash"></i></button>
	    </form>
	    </div>
	    </div>


	    </td>
	    </tr>';
	  }
	}else{
	  echo '<tr>
	  <td colspan="6">No se encontraron resultados</td>
	  </tr>';
	}
}
// ______________________________________________________________________ Tab 2




// ______________________________________________________________________ Tab 3
if ( isset($_POST['tabMeRetan']) ) {

	include('funciones/db.php');

	 $idRetador = $_SESSION['id_login'];
	 $registro = mysqli_query($conexion, "select d.id as id, l.nombre as name, lg.nombre as named , d.status as status from desafios d inner join login l ON id_jugador1 = l.id_login inner join login lg on id_jugador2 = lg.id_login where d.id_jugador2 ='$idRetador';");
	 if(mysqli_num_rows($registro)>0){
	  while($registro3 = mysqli_fetch_array($registro)){
	    $name = $registro3['name'];
	    $named = $registro3['named'];
	    $status = $registro3['status'];
	    $id = $registro3['id'];

	    $queryBata = mysqli_query($conexion, 'SELECT * FROM batallas WHERE id_desafio = '.$id);
	    $resBata = mysqli_fetch_array($queryBata);

	    if ($resBata['jugadorGanador']) {
	        $queryGanador = mysqli_query($conexion, 'SELECT * FROM login WHERE id_login = '.$resBata['jugadorGanador']);
	        $resGanador = mysqli_fetch_array($queryGanador);
	        $resGan = $resGanador['nombre'];
	    }

	    
	    $estatusMos = '';
	    if ( $status == 'pendiente' ) {
	        $estatusMos = '<button id="aceptar" name="iniciar" type="submit" class="btn btn-success btnIrReto" data-iddes="'.$id.'">Aceptar<i class="fa fa-pencil-square-o"></i></button>';
	    }else if ( $status == 'en progreso' ) {
	        if ( count(json_decode($resBata['preguntas_vistas_j2'])) >= $resBata['limite_preguntas'] ) {
	            $estatusMos = '<p style="color: #FFF;">Ya terminaste tus turnos. Falta que tu contrincante termine.</p> ';
	        }else{
	            $estatusMos = '<button id="aceptar" name="iniciar" type="submit" class="btn btn-warning btnIrReto" data-iddes="'.$id.'">Continuar<i class="fa fa-pencil-square-o"></i></button>';
	        }
	    }else if ( $status == 'terminado' ) {
	        $estatusMos = '<p style="color: #FFF;">Ganador: '.$resGan.'</p>';
	    }


	    echo '<tr>
	    <td style="text-align: center">'.$named.'</td>
	    <td style="text-align: center">'.$name.'</td>
	    <td style="text-align: center">'.$status.'</td>'?>
	                <?php echo' <td>
	    <div class="row">
	    <div class="col-md-6">
	    <form action="retar.php" method="post">
	    <input type="hidden" name="iddesafio" value="'.$id.'">
	    '.$estatusMos.'
	    </form>
	    </div>
	   
	    </div>


	    </td>
	    </tr>';
	  }
	}else{
	  echo '<tr>
	  <td colspan="6">No se encontraron resultados</td>
	  </tr>';
	}
}
// ______________________________________________________________________ Tab 3


?>