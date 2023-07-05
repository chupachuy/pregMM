<?php
header("Content-Type: text/html;charset=utf-8");
//error_reporting(E_ALL);
error_reporting(0);
ini_set('display_errors', '1');

//mostrar preguntas segun categoria
include('db.php');

// Retar a un compañero
if (isset($_POST['categoriaR'])) {
	session_start();
	// echo $_POST['categoriaR'];
	// echo $_POST['idBatR'];


	$pregunta = '';
	$opciones ='';
	$categoria = $_POST['categoriaR'];

	$preconsulta = "select id_categoria from categoria where categoria = '".$categoria."'";
	$preresultado = mysqli_query( $conexion, $preconsulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

	$id_categoria = 0;
	
	while ($precolumna = mysqli_fetch_array( $preresultado )) {
		$id_categoria = $precolumna['id_categoria'];
	}

	// Saber si soy competidor 1 o 2
	$consultaBatalla = 'SELECT * FROM batallas WHERE id_batalla = '.$_POST['idBatR'];
	$resultadoBatalla = mysqli_query( $conexion, $consultaBatalla );
	$infoBatalla = mysqli_fetch_array( $resultadoBatalla );


	if ( $infoBatalla['jugador1'] == $_SESSION['id_login'] ) {
		// echo 'Soy el jugador 1';
		$preguntas_vistas = json_decode( $infoBatalla['preguntas_vistas_j1'] );
		$preguntas_vistas_query = '';

		for ($i=0; $i < count( $preguntas_vistas ); $i++) { 
			$preguntas_vistas_query .= ' AND id_pregunta != '.$preguntas_vistas[$i];
		}
	}else{
		// echo 'Soy el jugador 2';
		$preguntas_vistas = json_decode( $infoBatalla['preguntas_vistas_j2'] );
		$preguntas_vistas_query = '';

		if (count( $preguntas_vistas )) {
			for ($i=0; $i < count( $preguntas_vistas ); $i++) { 
				$preguntas_vistas_query .= ' AND id_pregunta != '.$preguntas_vistas[$i];
			}
		}

	}

	// [0] => 6 [id_batalla] => 6 [1] => 10 [id_desafio] => 10 [2] => 6 [jugador1] => 6 [3] => [] [preguntas_vistas_j1] => [] [4] => 1 [puntos_j1] => 1 [5] => 2 [jugador2] => 2 [6] => [] [preguntas_vistas_j2] => [] [7] => 2 [puntos_j2] => 2 [8] => 6 [limite_preguntas] => 6 [9] => 0 [jugadorGanador] => 0 [10] => 0 [id_estatusbatalla] => 0 
	// print_r($infoBatalla);

	$consulta = "select pregunta from preguntas where id_categoria = '".$id_categoria."' ".$preguntas_vistas_query." ORDER BY RAND() LIMIT 1";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	
	
	while ($columna = mysqli_fetch_array( $resultado )) {
		$pregunta = $columna['pregunta'];
		// $consulta3 = "update preguntas set vio = 1 where pregunta = '".$pregunta."' ";
		// $resultado3 = mysqli_query( $conexion, $consulta3 );
	}
	echo '<div class="row">';
	echo '<div class="col-md-10">';
	echo '<hr>';
	echo '<label style="font-weigth:bold; color:#FFF; font-size: 1.5em;"><b>'.$pregunta.'</b></label>';
	echo '</br>';
	
	$consulta2 = "select pr.id_pregunta, rp.id_respuesta, pr.img, rp.respuesta from respuestas rp
	inner join preguntas pr on pr.id_pregunta = rp.id_pregunta
	where pr.pregunta= '".$pregunta."' ORDER BY RAND()";
	$resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	$img = null;
	
	while ($columna = mysqli_fetch_array( $resultado2 )) {
		//$columna['respuesta'];
		$img = $columna['img'];
		$opciones = '
		<label style="font-weigth:bold; color:#1C3C6D; font-size: 23px;"><input type="radio" name="gender" value="'.$columna['id_respuesta'].'" /> '.$columna['respuesta'].'</label>';
		echo $opciones;
		echo '<label><input style="display:none" id="ops" type="radio" value="'.$columna['id_pregunta'].'" />'.'</label>';
		echo '<br>';
	}
	
	//mysqli_close( $conexion );
	echo '</div>';

	if ($img) {
		// echo '<div class="col-md-2"><img src="'.$img.'" alt="Smiley face" styel="width: 100%;"></div>';
	}

	if ($img=='') {

		echo '<n id="resultado">No hay más preguntas ... <br> <br>Espere un momento.</n>';
		// echo '<script> $("#countdown").ready(function() {
		// 	updateClock_1();
		// });</script>';
		echo '<script>$("#resultado_cat").hide();</script>';
		echo '<script>$("#resultado_vacio").fadeIn();</script>';
		echo '<script>miRuleta.stopAnimation(false); miRuleta.rotationAngle = 0; $(".res").delay(3000).fadeOut();</script>';
		
	}

	echo '<div class="modal fade" id="modRetro" tabindex="-1" aria-labelledby="modRetroLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        ';
	if ($img=='') {

		echo '<n id="resultado">No hay más preguntas ... <br> <br>Espere un momento.</n>';
		// echo '<script> $("#countdown").ready(function() {
		// 	updateClock_1();
		// });</script>';
		echo '<script>$("#resultado_cat").hide();</script>';
		echo '<script>$("#resultado_vacio").fadeIn();</script>';
		echo '<script>miRuleta.stopAnimation(false); miRuleta.rotationAngle = 0; $(".res").delay(3000).fadeOut();</script>';
		
	}
	else {
		// echo '<div class="col-md-2"><img src="'.$img.'" alt="Smiley face" styel="width: 100%;"></div>';
		// echo '<input type="button" href="javascript:;" onclick="ver_respuestas()" value="Cosultar" />';
		echo '<div style="width: 100%; background-color: #FFF; margin-top: 2em; padding: 1em; border-radius: .5em; display: none;" id="respuesta"></div>';
		// echo '<input type="button" href="javascript:;" value="Contestar" />';
	}
	echo       '</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
	      </div>
	    </div>
	  </div>
	</div>';
	echo '</div>';
}
// Retar a un compañero


if (isset($_POST['categoria'])) {
	session_start();
	// Condicional para saber si viene de 1 jugador o 1 vs 1
	$pregunta = '';
	$opciones ='';
	$categoria = $_POST['categoria'];

	$preconsulta = "select id_categoria from categoria where categoria = '".$categoria."'";
	$preresultado = mysqli_query( $conexion, $preconsulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

	$id_categoria = 0;
	
	while ($precolumna = mysqli_fetch_array( $preresultado )) {
		$id_categoria = $precolumna['id_categoria'];
	}

	// Aquí validar que la pregunta no se haya visto
	$consultaValid = "SELECT * FROM preguntas WHERE id_categoria = '".$id_categoria."'";
	$resultadoValid = mysqli_query( $conexion, $consultaValid ) or die ( "Algo ha ido mal en la consulta a la base de datos");

	$validaPre = '';
	$colValidNuevo = '';
	$colValidArray = array();
	while ( $colValid = mysqli_fetch_array( $resultadoValid ) ) {

		$colValidArray = array();
		// echo $colValid['vio'].'<br>';
		// echo $_SESSION['id_login'];
		if ( $validaPre == '' ) {
			$colValidArray = json_decode( $colValid['vio'] );
			if ( in_array($_SESSION['id_login'], $colValidArray) ) {
				$validaPre = '';
			}else{
				array_push( $colValidArray, $_SESSION['id_login'] );
				$colValidNuevo = json_encode( $colValidArray );
				$validaPre = $colValid['id_pregunta'];
			}
		}
		// echo $colValid['id_pregunta'].'<br>';
	}
	 // print_r( $colValidArray );
	 // echo '<br>';
	 // echo $validaPre.' id_preg<br>';
	 // print_r( $colValidNuevo );
	 // echo $colValidNuevo.' json<br>';
	 // echo $_SESSION['id_login'].'id_login';

	$consulta = "SELECT pregunta FROM preguntas WHERE id_pregunta = '".$validaPre."'";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

	// Aquí validar que la pregunta no se haya visto
	
	
	while ($columna = mysqli_fetch_array( $resultado )) {
		$pregunta = $columna['pregunta'];

		// Aquí agregar mi id
		$consulta3 = "update preguntas set vio = '".$colValidNuevo."' where pregunta = '".$pregunta."' ";
		$resultado3 = mysqli_query( $conexion, $consulta3 );
	}
	echo '<div class="row">';
	echo '<div class="col-md-10">';
	echo '<hr>';
	echo '<label style="font-weigth:bold; color:#FFF; font-size: 1.5em;"><b>'.$pregunta.'</b></label>';
	echo '</br>';
	
	$consulta2 = "select pr.id_pregunta, rp.id_respuesta, pr.img, rp.respuesta from respuestas rp
	inner join preguntas pr on pr.id_pregunta = rp.id_pregunta
	where pr.pregunta= '".$pregunta."' ORDER BY RAND()";
	$resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	$img = null;
	
	while ($columna = mysqli_fetch_array( $resultado2 )) {
		$img = $columna['img'];
		$opciones = '
		<label style="font-weigth:bold; color:#1C3C6D; font-size: 23px;"><input type="radio" name="gender" value="'.$columna['id_respuesta'].'" /> '.$columna['respuesta'].'</label>';
		echo $opciones;
		echo '<label><input style="display:none" id="ops" type="radio" value="'.$columna['id_pregunta'].'" />'.'</label>';
		echo '<br>';
	}
	
	//mysqli_close( $conexion );
	echo '</div>';

	if ($img) {
		// echo '<div class="col-md-2"><img src="'.$img.'" alt="Smiley face" styel="width: 100%;"></div>';
	}

	if ($img=='') {

		echo '<n id="resultado">No hay más preguntas ... <br> <br>Espere un momento.</n>';
		// echo '<script> $("#countdown").ready(function() {
		// 	updateClock_1();
		// });</script>';
		echo '<script>$("#resultado_cat").hide();</script>';
		echo '<script>$("#resultado_vacio").fadeIn();</script>';
		echo '<script>miRuleta.stopAnimation(false); miRuleta.rotationAngle = 0; $(".res").delay(3000).fadeOut();</script>';
		
	}

	echo '<div class="modal fade" id="modRetro" tabindex="-1" aria-labelledby="modRetroLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        ';
	if ($img=='') {

		echo '<n id="resultado">No hay más preguntas ... <br> <br>Espere un momento.</n>';
		// echo '<script> $("#countdown").ready(function() {
		// 	updateClock_1();
		// });</script>';
		echo '<script>$("#resultado_cat").hide();</script>';
		echo '<script>$("#resultado_vacio").fadeIn();</script>';
		echo '<script>miRuleta.stopAnimation(false); miRuleta.rotationAngle = 0; $(".res").delay(3000).fadeOut();</script>';
		
	}
	else {
		// echo '<div class="col-md-2"><img src="'.$img.'" alt="Smiley face" styel="width: 100%;"></div>';
		// echo '<input type="button" href="javascript:;" onclick="ver_respuestas()" value="Cosultar" />';
		echo '<div style="width: 100%; background-color: #FFF; margin-top: 2em; padding: 1em; border-radius: .5em; display: none;" id="respuesta"></div>';
		// echo '<input type="button" href="javascript:;" value="Contestar" />';
	}
	echo       '</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
	      </div>
	    </div>
	  </div>
	</div>';
	echo '</div>';


}
//mostrar preguntas segun categoria


//mostrar premio aleatorio y restart stock
function getPremio($dificul, $tiempoDB, $idBat) {

	if (isset($idBat)) {
		// echo '<script>alert('.$idBat.');</script>';
	}else{
		$idBat = '';
	}
	include('db.php');
	//session_start();
	// echo '<script>alert('.$dificul.');</script>';
	// echo '<script>alert('.$tiempoDB.');</script>';
	// echo '<script>alert('.$idBat.');</script>';
	$consulta = "select id_premio, premio from premios where stock > 0 and dificultad = ".$dificul." ORDER by RAND() LIMIT 1";
	$resultado = mysqli_query( $conexion, $consulta );
	$prem = '<div align="center" style="font-size:30px;"></div>';

	// $prem = '<div align="center" style="font-size:30px;"><b>Ooops! Intenta con otra pregunta.</b></div></p>';
	
	while ($columna = mysqli_fetch_array( $resultado )) {
		
		// $prem = '<div align="center" style="font-size:30px;"><b>Premio: '.$columna['premio'].'</b></div></p>';
		$prem = '<div align="center" style="font-size:28px;"><b>+1 punto</b></div></p>';
		$consulta2 = "update premios set stock = stock - 1 where premio = '".$columna['premio']."'";
		$consulta3 = "update login set Puntaje = Puntaje + 1, tiempo = (tiempo+'".$tiempoDB."')/2 where username = '".$_SESSION['login_user']."' and status = 1";
		$consulta4 = "update login set Puntaje = Puntaje + 1, tiempo = (tiempo+'".$tiempoDB."')/2 where username = '".$_SESSION['login_user']."' and status = 0";
		$resultado2 = mysqli_query( $conexion, $consulta2 );
		$resultado3 = mysqli_query( $conexion, $consulta3 );	
		$resultado4 = mysqli_query( $conexion, $consulta4 );

	}
	echo $prem;
}
// SELECT username,Puntaje FROM `login` WHERE status = 1

//Obtener la respuesta Correcta
if (isset($_POST['seleccion'])) {
	function obtener_respCorrecta(){
		include('db.php');
		session_start();

		if (isset($_POST['idBat'])) {
			$idBat = $_POST['idBat'];
		}else{
			$idBat = '';
		}
		
    	$tiempoDB = floatval($_POST['tiempoDB']);
		$correcta='';
		$selecccionada='';
		$dificultad='';
		$seleccion = $_POST['rseleccion'];
		$id_opcionselec =$_POST['seleccion'];
		$consulta = "select respuesta, dificultad from respuestas where id_pregunta = ".$seleccion." and correcta = 1";
		$resultado = mysqli_query( $conexion, $consulta );
		
		while ($columna = mysqli_fetch_array( $resultado )) {
			$correcta= $columna['respuesta'];
			$dificultad = $columna['dificultad'];
		}
		
		$consulta2 = "select respuesta, dificultad from respuestas where id_respuesta =".$id_opcionselec;
		$resultado2 = mysqli_query( $conexion, $consulta2 );
		
		while ($columna2 = mysqli_fetch_array( $resultado2 )) {
			$seleccionada= $columna2['respuesta'];
		}
		
		if (strcmp($seleccionada, $correcta) === 0) {

			if ($idBat != '') {

				// Guardar en Batallas
				//________________________________________________________________

				$consultDatBat = 'SELECT * FROM batallas WHERE id_batalla = '.$idBat;
				$resultDatBat = mysqli_query( $conexion, $consultDatBat );
				$resultDatBatAr = mysqli_fetch_array( $resultDatBat );

				if ( $resultDatBatAr['jugador1'] == $_SESSION['id_login'] ) {
					$jugadorACalificar = 'puntos_j1';
					$actPregVistas = 'preguntas_vistas_j1';
					$actualizarPreg = json_decode( $resultDatBatAr['preguntas_vistas_j1'] );
					array_push( $actualizarPreg, intval( $seleccion ) );
					$actualizarPreg = json_encode( $actualizarPreg );
					// echo 'Es el jugador 1';
				}else{
					$jugadorACalificar = 'puntos_j2';
					$actPregVistas = 'preguntas_vistas_j2';
					$actualizarPreg = json_decode( $resultDatBatAr['preguntas_vistas_j2'] );
					array_push( $actualizarPreg, intval( $seleccion ) );
					$actualizarPreg = json_encode( $actualizarPreg );
					// echo 'Es el jugador 2';
				}

				$consultGuardPunt = "UPDATE batallas SET ".$jugadorACalificar." = ".$jugadorACalificar." + 1, ".$actPregVistas." = '".$actualizarPreg."' WHERE id_batalla = ".$idBat;
				$resultGuardPunt = mysqli_query( $conexion, $consultGuardPunt );


				$consultDatBatDes = 'SELECT * FROM batallas WHERE id_batalla = '.$idBat;
				$resultDatBatDes = mysqli_query( $conexion, $consultDatBatDes );
				$resultDatBatDesAr = mysqli_fetch_array( $resultDatBatDes );


				if ( count( json_decode( $resultDatBatDesAr['preguntas_vistas_j1'] ) ) == $resultDatBatDesAr['limite_preguntas'] && count( json_decode( $resultDatBatDesAr['preguntas_vistas_j2'] ) ) == $resultDatBatDesAr['limite_preguntas'] ) {
					// echo 'Los dos terminaron';

					if ( $resultDatBatDesAr['puntos_j1'] > $resultDatBatDesAr['puntos_j2'] ) {
						$ganador = $resultDatBatDesAr['jugador1'];
					}else if ( $resultDatBatDesAr['puntos_j2'] > $resultDatBatDesAr['puntos_j1'] ) {
						$ganador = $resultDatBatDesAr['jugador2'];
					}else if ( $resultDatBatDesAr['puntos_j2'] == $resultDatBatDesAr['puntos_j1'] ) {
						$ganador = 0;
					}

					$consultCambEst = "UPDATE desafios SET status = 'terminado' WHERE id = ".$resultDatBatDesAr['id_desafio'];
					$resultGuardPunt = mysqli_query( $conexion, $consultCambEst );

					$consultBataGana = "UPDATE batallas SET jugadorGanador = ".$ganador." WHERE id_batalla = ".$resultDatBatDesAr['id_batalla'];
					$resultBataGana = mysqli_query( $conexion, $consultBataGana );

					echo '<script>window.location = "retarcompanero.php"</script>';
				}else if ( count( json_decode( $resultDatBatDesAr['preguntas_vistas_j1'] ) ) == $resultDatBatDesAr['limite_preguntas'] ) {
					// echo 'Termino el jugador 1';
					echo '<script>window.location = "retarcompanero.php"</script>';
				}else if ( count( json_decode( $resultDatBatDesAr['preguntas_vistas_j2'] ) ) == $resultDatBatDesAr['limite_preguntas'] ) {
					// echo 'Termino el jugador 2';
					echo '<script>window.location = "retarcompanero.php"</script>';
				}


				//________________________________________________________________
			}

			$consultGuardPuntGen = "UPDATE login SET Puntaje = Puntaje + 1, tiempo = (tiempo+'".$tiempoDB."')/2 WHERE username = '".$_SESSION['login_user']."' and status = 1";
			$resultGuardPuntGen = mysqli_query( $conexion, $consultGuardPuntGen );

			echo'<div align="center"><img style="width: 4em;" src="img/correct.png"/></div></p>';
			echo '<div class="alert alert-success" style="font-size: 1.2em;">'.$correcta.'</div>';
			getPremio($dificultad, $tiempoDB, $idBat);
			echo "<script> document.getElementById('restartConfetti').click(); </script>";
			
		}
		else {

			echo'<div align="center"><img style="width: 4em;" src="img/error.png"/></div></p>';
			$consulta3 = "update login set turno = 0 where username = '".$_SESSION['login_user']."'";
			$resultado3 = mysqli_query( $conexion, $consulta3 );
			//SELECT PARA CONOCER EL TURNO QUE TIENE EL USUARIO ACTUAL
			$consulta4 = "select id_turno from login where username = '".$_SESSION['login_user']."'";
			$resultado4 = mysqli_query( $conexion, $consulta4 );
			$columna4 = mysqli_fetch_array( $resultado4 );
			$turnoActual = intval($columna4['id_turno']);
			
			//SELECT PARA CONOCER EL ÚLTMO Y EL PRIMER TURNO
			$consulta5 = "select (case when min(id_turno) = 0 then 1 else min(id_turno) end) as minimo, max(id_turno) as maximo from login";
			$resultado5 = mysqli_query( $conexion, $consulta5 );
			$columna5 = mysqli_fetch_array( $resultado5 );
			$turnoMaximo = intval($columna5['maximo']);
			$turnoMinimo = intval($columna5['minimo']);
			//COMPARAR TURNO ACTUAL CON EL MÁXIMO TURNO
			if($turnoMaximo == $turnoActual) {
				$siguienteTurno = $turnoMinimo;
			}
			else {
				$siguienteTurno = $turnoActual + 1;
			}
			$consulta6 = "update login set turno = 1 where id_turno = '".$siguienteTurno."'";
			$resultado6 = mysqli_query( $conexion, $consulta6 );


			if ($idBat != '') {
				//________________________________________________________________

				$consultDatBat = 'SELECT * FROM batallas WHERE id_batalla = '.$idBat;
				$resultDatBat = mysqli_query( $conexion, $consultDatBat );
				$resultDatBatAr = mysqli_fetch_array( $resultDatBat );

				if ( $resultDatBatAr['jugador1'] == $_SESSION['id_login'] ) {
					$jugadorACalificar = 'puntos_j1';
					$actPregVistas = 'preguntas_vistas_j1';
					$actualizarPreg = json_decode( $resultDatBatAr['preguntas_vistas_j1'] );
					array_push( $actualizarPreg, intval( $seleccion ) );
					$actualizarPreg = json_encode( $actualizarPreg );
					// echo 'Es el jugador 1';
				}else{
					$jugadorACalificar = 'puntos_j2';
					$actPregVistas = 'preguntas_vistas_j2';
					$actualizarPreg = json_decode( $resultDatBatAr['preguntas_vistas_j2'] );
					array_push( $actualizarPreg, intval( $seleccion ) );
					$actualizarPreg = json_encode( $actualizarPreg );
					// echo 'Es el jugador 2';
				}

				$consultGuardPunt = "UPDATE batallas SET ".$jugadorACalificar." = ".$jugadorACalificar." + 0, ".$actPregVistas." = '".$actualizarPreg."' WHERE id_batalla = ".$idBat;
				$resultGuardPunt = mysqli_query( $conexion, $consultGuardPunt );


				$consultDatBatDes = 'SELECT * FROM batallas WHERE id_batalla = '.$idBat;
				$resultDatBatDes = mysqli_query( $conexion, $consultDatBatDes );
				$resultDatBatDesAr = mysqli_fetch_array( $resultDatBatDes );


				if ( count( json_decode( $resultDatBatDesAr['preguntas_vistas_j1'] ) ) == $resultDatBatDesAr['limite_preguntas'] && count( json_decode( $resultDatBatDesAr['preguntas_vistas_j2'] ) ) == $resultDatBatDesAr['limite_preguntas'] ) {
					// echo 'Los dos terminaron';

					if ( $resultDatBatDesAr['puntos_j1'] > $resultDatBatDesAr['puntos_j2'] ) {
						$ganador = $resultDatBatDesAr['jugador1'];
					}else if ( $resultDatBatDesAr['puntos_j2'] > $resultDatBatDesAr['puntos_j1'] ) {
						$ganador = $resultDatBatDesAr['jugador2'];
					}else if ( $resultDatBatDesAr['puntos_j2'] == $resultDatBatDesAr['puntos_j1'] ) {
						$ganador = 0;
					}

					$consultCambEst = "UPDATE desafios SET status = 'terminado' WHERE id = ".$resultDatBatDesAr['id_desafio'];
					$resultGuardPunt = mysqli_query( $conexion, $consultCambEst );

					$consultBataGana = "UPDATE batallas SET jugadorGanador = ".$ganador." WHERE id_batalla = ".$resultDatBatDesAr['id_batalla'];
					$resultBataGana = mysqli_query( $conexion, $consultBataGana );

					echo '<script>window.location = "retarcompanero.php"</script>';
				}else if ( count( json_decode( $resultDatBatDesAr['preguntas_vistas_j1'] ) ) == $resultDatBatDesAr['limite_preguntas'] ) {
					// echo 'Termino el jugador 1';
					echo '<script>window.location = "retarcompanero.php"</script>';
				}else if ( count( json_decode( $resultDatBatDesAr['preguntas_vistas_j2'] ) ) == $resultDatBatDesAr['limite_preguntas'] ) {
					// echo 'Termino el jugador 2';
					echo '<script>window.location = "retarcompanero.php"</script>';
				}


				//________________________________________________________________
			}

			
			echo '<div class="alert alert-danger" style="font-size: 1.2em;"><strong> Tu seleccion: </strong>'.$seleccionada.'</div>';
			echo '<div class="alert alert-success" style="font-size: 1.2em;"><strong> Respuesta Correcta: </strong>'.$correcta.'</div>';
		}
	}
	obtener_respCorrecta();
}

if (isset($_POST['vacia'])) {

	function Vacia(){
		include('db.php');
		session_start();

		echo'<div align="center"><img src="img/error.png"/></div></p>';
		$consulta3 = "update login set turno = 0 where username = '".$_SESSION['login_user']."'";
		$resultado3 = mysqli_query( $conexion, $consulta3 );
			//SELECT PARA CONOCER EL TURNO QUE TIENE EL USUARIO ACTUAL
		$consulta4 = "select id_turno from login where username = '".$_SESSION['login_user']."'";
		$resultado4 = mysqli_query( $conexion, $consulta4 );
		$columna4 = mysqli_fetch_array( $resultado4 );
		$turnoActual = intval($columna4['id_turno']);

			//SELECT PARA CONOCER EL ÚLTMO Y EL PRIMER TURNO
		$consulta5 = "select (case when min(id_turno) = 0 then 1 else min(id_turno) end) as minimo, max(id_turno) as maximo from login";
		$resultado5 = mysqli_query( $conexion, $consulta5 );
		$columna5 = mysqli_fetch_array( $resultado5 );
		$turnoMaximo = intval($columna5['maximo']);
		$turnoMinimo = intval($columna5['minimo']);
			//COMPARAR TURNO ACTUAL CON EL MÁXIMO TURNO
		if($turnoMaximo == $turnoActual) {
			$siguienteTurno = $turnoMinimo;
		}
		else {
			$siguienteTurno = $turnoActual + 1;
		}
		$consulta6 = "update login set turno = 1 where id_turno = '".$siguienteTurno."'";
		$resultado6 = mysqli_query( $conexion, $consulta6 );
		echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove-sign"></span><strong> ¡No respondiste! </strong></div>';
			// echo '<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span><strong> Respuesta Correcta: </strong>'.utf8_encode($correcta).'</div>';
	}
	Vacia();
}
//Obtener la respuesta Correcta

//llenar modal nombre categoria para editar
if (isset($_POST['id_categoria'])) {
	function llenarEdit_cat(){
		include('db.php');

		$id_categoria = $_POST['id_categoria'];
		$consulta = "select * from categoria where id_categoria = ".$id_categoria;
		$resultado = mysqli_query( $conexion, $consulta );
		
		while ($columna = mysqli_fetch_array( $resultado ))
		{
			echo '<input type="text" class="form-control" id="nombrec" name="nombrec" required="required" placeholder="Nombre Categoria" value="'.$columna['categoria'].'">';
			echo '<input type="hidden" id="id_cat_edt" name="id_cat_edt" value="'.$columna['id_categoria'].'">';
		}
	}
	llenarEdit_cat();
}
//llenar modal nombre categoria para editar

//Editar nombre categoria
if (isset($_POST['id_cat_edit'])) {
	function Editar_cat(){
		include('db.php');

		$id_categoria = $_POST['id_cat_edit'];
		$nombre_categoria = $_POST['nombre_cat'];
		$consulta = "update categoria set categoria = '".$nombre_categoria."' where id_categoria = ".$id_categoria;
		$resultado = mysqli_query( $conexion, $consulta );
		
		if ($resultado==1){
			echo "<script>
			swal('Hecho.','Registro actualizado correctamente!','success')
			</script>";
			echo "<script>ListCat();</script>";
		}
		else {
			echo "<script>swal('Error','Ooops! Algo ha salido mal','error')</script>";
		}
	}
	if (empty($_POST['nombre_cat'])){
		echo "<script>swal('Error','Ooops! No se admiten campos vacios','error')</script>";
	}
	else {
		Editar_cat();
	}
}
//Editar nombre categoria

//Eliminar categoria
if (isset($_POST['id_cat_del'])) {
	
	function EliminarCat() {
		include('db.php');

		$id_categoria = $_POST['id_cat_del'];
		$consulta = "delete from categoria where id_categoria = ".$id_categoria;
		$resultado = mysqli_query( $conexion, $consulta );
		
		if ($resultado==1){
			echo "<script>
			swal('Hecho.','Categoria eliminada correctamente!','success')
			</script>";
			echo "<script>ListCat();</script>";
		}
		else {
			echo "<script>swal('Error','Ooops! Algo ha salido mal','error')</script>";
		}
		mysqli_close( $conexion );
	}
	
	include('db.php');
	$consulta2 = "select count(*) as lista from reg_categorias where id_cat = ".$_POST['id_cat_del'];
	$resultado2 = mysqli_query( $conexion, $consulta2 );
	$columna = mysqli_fetch_array( $resultado2);
	
	if($columna['lista']==0){
		EliminarCat();
	}
	else {
		echo "<script>swal('Error','La categoria no esta vacia!','error')</script>";
	}
	mysqli_close( $conexion );
}
//Eliminar categoria

//Agregar categoria
if (isset($_POST['add_cat'])) {
	function AgregarCat() {
		include('db.php');

		$new_cat = $_POST['add_cat'];
		$consulta = "insert into categoria (categoria) values ('".$new_cat."');";
		$resultado = mysqli_query( $conexion, $consulta );
		
		if ($resultado==1){
			echo'<input type="text" class="form-control" id="new_nombrec" name="new_nombrec" required="required" placeholder="Nombre Categoria" value="">';
			echo "<script>
			swal('Hecho.','Categoria agregada correctamente!','success')
			</script>";
			echo "<script>ListCat();</script>";
		}
		else {
			echo "<script>swal('Error','Ooops! Algo ha salido mal','error')</script>";
		}
		
	}
	if (empty($_POST['add_cat'])){
		echo'<input type="text" class="form-control" id="new_nombrec" name="new_nombrec" required="required" placeholder="Nombre Categoria" value="">';
		echo "<script>swal('Error','Ooops! No se admiten campos vacios','error')</script>";
	}
	else {
		AgregarCat();
	}
}

//Agregar categoria

//Listar categoria
function listarCat(){
	include('db.php');

	$consulta = "select * from categoria";
	$resultado = mysqli_query( $conexion, $consulta );

	echo '
	<label for="etd_preg">Categoria:</label>
	<select name="preg_cat" id="preg_cat" class="form-control">
	';
	while ($columna = mysqli_fetch_array( $resultado ))
	{
		echo '<option value='.$columna['id_cattegoria'].'>'.$columna['categoria'].'</option>';
	}
	echo '</select>';
}
//Listar categoria

//llenar modal pregunta para editar
if (isset($_POST['id_pregunta_edit'])){
	function llenarEdit_preg(){
		include('db.php');

		$id_pregunta = $_POST['id_pregunta_edit'];
		$consulta = "select * from vista_respuestas where id_pregunta = ".$id_pregunta.' order by correcta DESC limit 3';
		$resultado = mysqli_query( $conexion, $consulta );
		$preg = mysqli_fetch_array( $resultado );
		//listarCat();

		include('sel_categorias.php');
		echo '
		<p></p>
		<label for="etd_preg">Pregunta:</label>
		<input type="text" class="form-control" id="edt_preg" name="etd_preg" required="required" placeholder="Editar Pregunta" value="'.utf8_encode($preg['pregunta']).'">
		<p></p>
		<label for="diff">Dificultad:</label>
		<select class="form-control" id="edt_diff" name="edt_diff" style="width:100%;">
		<option value="0">Facil</option>
		<option value="1">Intermedio</option>
		<option value="2">Dificil</option>
		</select>
		<p></p>
		';
		echo '<input type="hidden" id="id_etd_preg" name="id_etd_preg" value="'.$preg['id_pregunta'].'">';
		echo '
		<label for="etd_preg">Respuesta:</label>
		<input type="text" class="form-control" id="edt_resp_preg" name="edt_resp_preg" required="required" placeholder="Respuesta" value="'.$preg['respuesta'].'">
		<p></p>';
		echo '<input type="hidden" id="id_edt_resp_preg" name="id_edt_resp_preg" value="'.$preg['id_respuesta'].'">';
		
		$num = 1;
		
		while ($columna = mysqli_fetch_array( $resultado )) {
			$num++;
			echo '
			<label for="etd_preg">Opcion '.$num.':</label>
			<input type="text" class="form-control" id="edt_resp'.$num.'" name="edt_resp'.$num.'" required="required" placeholder="Opciones" value="'.$columna['respuesta'].'">';
			echo '<input type="hidden" id="id_edt_resp_opc'.$num.'" name="id_edt_resp_opc'.$num.'" value="'.$columna['id_respuesta'].'">';
		}
		
	}
	llenarEdit_preg();
}
//llenar modal nombre categoria para editar

//Editar preguna
if (isset($_POST['id_preg_edit'])) {
	function Editar_pregunta() {
		include('db.php');
		
		$id_cat =  $_POST['id_edt_cat'];
		$id_pregunta = $_POST['id_preg_edit'];
		$pregunta = $_POST['nombre_preg'];
		$id_respuesta  =  $_POST['id_edt_resp'];
		$respuesta =  $_POST['nombre_resp'];
		$id_op2 =  $_POST['id_edt_op2'];
		$opcion2 =  $_POST['nombre_op2'];
		$id_op3 =  $_POST['id_edt_op3'];
		$opcion3 =  $_POST['nombre_op3'];
		$dificultad = $_POST['dificultad'];
		
		$consulta = "CALL EditPregunta(".$id_cat.",".$dificultad.",".$id_pregunta.",'".utf8_decode($pregunta)."',".$id_respuesta.",'".utf8_decode($respuesta)."',".$id_op2.",'".utf8_decode($opcion2)."',".$id_op3.",'".utf8_decode($opcion3)."');";
		
		$resultado = mysqli_query($conexion, $consulta);
		printf("Errormessage: %s\n", mysqli_error($conexion));
		
		if ($resultado==1) {
			echo "<script>
			swal('Hecho.','Registro actualizado correctamente!','success')
			</script>";
			echo "<script>loadTabla();</script>";
		}
		else {
			echo "<script>swal('Error','Ooops! Algo ha salido mal :(','error')</script>";
			echo "<script>".$consulta."</script>";
		}
		
	}
	if (empty($_POST['nombre_preg'])||empty($_POST['nombre_resp'])||empty($_POST['nombre_op2'])||empty($_POST['nombre_op3'])) {
		echo "<script>swal('Error','Ooops! No se admiten campos vacios :(','error')</script>";
	}
	else {
		Editar_pregunta();
	}
}
//Editar pregunta

//NUeva pregunta
if (isset($_POST['add_categoria'])) {
	
	function guardarPregunta() {
		
		if (empty($_POST['add_categoria'])||empty($_POST['add_pregunta'])||empty($_POST['add_respuesta'])||empty($_POST['add_op1'])||empty($_POST['add_op2'])) {
			echo "<script>swal('Error','Ooops! No se admiten campos vacios :(','error')</script>";
		}
		
		else {
			include('db.php');

			$id_cat =  $_POST['add_categoria'];
			$pregunta = $_POST['add_pregunta'];
			$respuesta =  $_POST['add_respuesta'];
			$opcion1 =  $_POST['add_op1'];
			$opcion2 =  $_POST['add_op2'];
			
			$consulta = "insert into preguntas (id_categoria, pregunta, img) values (".$id_cat.", '".$pregunta."', 'preg.jpg')";
			$resultado = mysqli_query( $conexion, $consulta );
			
			$consulta2 = "insert into respuestas (respuesta, correcta, id_pregunta) values('".$respuesta."', 1, (select max(id_pregunta) from preguntas));";
			$resultado2 = mysqli_query( $conexion, $consulta2 );
			
			$consulta3 = "insert into respuestas (respuesta, correcta, id_pregunta) values('".$opcion1."', 0, (select max(id_pregunta) from preguntas));";
			$resultado3 = mysqli_query( $conexion, $consulta3 );
			
			$consulta4 = "insert into respuestas (respuesta, correcta, id_pregunta) values('".$opcion2."', 0, (select max(id_pregunta) from preguntas));";
			$resultado4 = mysqli_query( $conexion, $consulta4 );
			
			echo "<script>//loadTabla();
			window.location.href = 'preguntas.php';
			</script>";
		}
	}
	guardarPregunta();
}

//llenar modal premio para editar
if (isset($_POST['id_premio_edit'])) {
	function llenarEdit_prem(){
		include('db.php');

		$id_premio = $_POST['id_premio_edit'];
		$consulta = "select * from premios where id_premio = ".$id_premio;
		$resultado = mysqli_query( $conexion, $consulta );
		$preg = mysqli_fetch_array( $resultado );
		//listarCat();

		echo '
		<p></p>
		<label for="etd_prem">Premio:</label>
		<input type="text" class="form-control" id="edt_prem" name="etd_preg" required="required" placeholder="Editar Premio" value="'.utf8_encode($preg['premio']).'">
		<p></p>
		<label for="diff">Dificultad:</label>
		<select class="form-control" id="edt_diff" name="edt_diff" style="width:100%;">
		<option value="0">Facil</option>
		<option value="1">Intermedio</option>
		<option value="2">Dificil</option>
		</select>
		<p></p>';
		echo '
		<label for="etd_preg">Stock:</label>
		<input type="text" class="form-control" id="edt_stock" name="edt_stock" required="required" placeholder="Cantidad en Stock" value="'.utf8_encode($preg['stock']).'">
		<p></p>';
		echo '<input type="hidden" id="id_edt_prem" name="id_edt_prem" value="'.utf8_encode($preg['id_premio']).'">';
	}
	llenarEdit_prem();
}

//Editar preguna
if (isset($_POST['id_edt_prem'])) {
	function Editar_premio(){
		include('db.php');
		
		$id_premio =  $_POST['id_edt_prem'];
		$premio = $_POST['prem_edit'];
		$stock = $_POST['stock_edt'];
		$dificultad = $_POST['dificultad'];		
		$consulta = "update premios set premio = '".utf8_decode($premio)."' ,stock = ".$stock.", dificultad =".$dificultad." where id_premio = ".$id_premio;
		$resultado = mysqli_query( $conexion, $consulta );
		printf("Errormessage: %s\n", mysqli_error($conexion));
		
		if ($resultado==1) {
			echo "<script>
			swal('Hecho.','Registro actualizado correctamente!','success')
			</script>";
			echo "<script> 
			loadTabla();</script>";
		}
		else {
			echo "<script>swal('Error','Ooops! Algo ha salido mal :(','error')</script>";
			echo "<script>".$consulta."</script>";
		}
	}
	if (empty($_POST['id_edt_prem'])||empty($_POST['prem_edit'])||empty($_POST['stock_edt'])) {
		echo "<script>swal('Error','Ooops! No se admiten campos vacios :(','error')</script>";
	}
	else {
		Editar_premio();
	}
}
//Editar pregunta

//nuevo premio 

if ( isset($_POST['add_premio']) || isset($_POST['add_stock']) ){
	
	include('db.php');

	$premio = $_POST['add_premio'];
	$stock = $_POST['add_stock'];
	$dificultad = $_POST['add_dificultad'];
	
	if (empty($_POST['add_premio']) || empty($_POST['add_stock'])) {
		echo "<script>swal('Error','Ooops! No se admiten campos vacios :(','error')</script>";
	}
	else{
		
		$consulta = "insert into premios(premio, dificultad, stock) values('".utf8_decode($premio)."', ".$dificultad.", ".$stock.")";
		$resultado = mysqli_query( $conexion, $consulta );
		printf("Errormessage: %s\n", mysqli_error($conexion));
		
		if ($resultado==1){
			echo "<script>
			swal('Hecho.','Registro actualizado correctamente!','success')
			</script>";
			echo "<script>//loadTabla();
			window.location.href = 'premios.php';
			</script>";
		}
		else {
			echo "<script>swal('Error','Ooops! Algo ha salido mal :(','error')</script>";
			echo "<script>".$consulta."</script>";
		}
	}
}

//Eliminar premio
if (isset($_POST['id_prem_del'])) {
	
	function EliminarPrem() {
		include('db.php');

		$id_premio = $_POST['id_prem_del'];
		$consulta = "delete from premios where id_premio = ".$id_premio;
		$resultado = mysqli_query( $conexion, $consulta );
		
		if ($resultado==1){
			echo "<script>
			swal('Hecho.','Premio eliminado correctamente!','success')
			</script>";
			echo "<script>loadTabla();</script>";
		}
		else {
			echo "<script>swal('Error','Ooops! Algo ha salido mal :(','error')</script>";
		}
		mysqli_close( $conexion );
	}
	EliminarPrem();
}
//Eliminar premio


//Eliminar pregunta
if (isset($_POST['id_preg_del'])) {
	
	function EliminarPreg(){
		include('db.php');

		$id_pregunta = $_POST['id_preg_del'];
		$consulta = "delete from respuestas where id_pregunta = ".$id_pregunta;
		$resultado = mysqli_query( $conexion, $consulta );
		
		$consulta2 = "delete from preguntas where id_pregunta = ".$id_pregunta;
		$resultado2 = mysqli_query( $conexion, $consulta2 );
		
		if ($resultado==1 && $resultado2==1) {
			echo "<script>
			swal('Hecho.','Pregunta eliminada correctamente!','success')
			</script>";
			echo "<script>loadTabla();</script>";
		}
		else {
			echo "<script>swal('Error','Ooops! Algo ha salido mal :(','error')</script>";
		}
		mysqli_close( $conexion );
	}
	EliminarPreg();	
}

// Puntaje
if (isset($_POST['Puntaje'])) {
	
	function Puntaje() {
		include('db.php');
		session_start();

		$resultado = mysqli_query($conexion,"SELECT * FROM batallas WHERE id_batalla = ".$_POST['idBat']);
		$result = mysqli_fetch_assoc($resultado);

		// echo $result['id_batalla'].'<br>';
		// echo $result['id_desafio'].'<br>';
		// echo $result['jugador1'].'<br>';
		// echo $result['preguntas_vistas_j1'].'<br>';
		// echo $result['puntos_j1'].'<br>';
		// echo $result['jugador2'].'<br>';
		// echo $result['preguntas_vistas_j2'].'<br>';
		// echo $result['puntos_j2'].'<br>';
		// echo $result['limite_preguntas'].'<br>';
		// echo $result['jugadorGanador'].'<br>';
		// echo $result['id_estatusbatalla'].'<br>';

		$resJ1 = mysqli_query( $conexion, "SELECT * FROM login WHERE id_login = ".$result['jugador1'] );
		$nomJ1 = mysqli_fetch_assoc($resJ1);
		$nomJ1 = $nomJ1['nombre'];

		$resJ2 = mysqli_query( $conexion, "SELECT * FROM login WHERE id_login = ".$result['jugador2'] );
		$nomJ2 = mysqli_fetch_assoc($resJ2);
		$nomJ2 = $nomJ2['nombre'];

		$total_turnos = $result['limite_preguntas'];
		
		if ( $result['preguntas_vistas_j1'] ) {
			$turnos_j1 = count(json_decode($result['preguntas_vistas_j1']));
		}else{
			$turnos_j1 = 0;
		}
		if ( $result['preguntas_vistas_j2'] ) {
			$turnos_j2 = count(json_decode($result['preguntas_vistas_j2']));
		}else{
			$turnos_j2 = 0;
		}

		echo '<table  id="tabla" class="tablaRC">';
        echo    '<tr>
                    <td class="tablaRCtitu">Jugador</td>
                    <td class="tablaRCtitu">Puntos</td>
                    <td class="tablaRCtitu">Total de turnos: '.$total_turnos.'</td>
                </tr>
                <tr>
                    <td class="tablaRCcont">'.$nomJ1.'</td>
                    <td class="tablaRCcont text-center">'.$result['puntos_j1'].'</td>
                    <td class="tablaRCcont text-center">'.$turnos_j1.'</td>
                </tr>
                <tr>
                    <td class="tablaRCcont">'.$nomJ2.'</td>
                    <td class="tablaRCcont text-center">'.$result['puntos_j2'].'</td>
                    <td class="tablaRCcont text-center">'.$turnos_j2.'</td>
                </tr>';
		echo '</table>';


		// $resultado =mysqli_query($conexion,"select Puntaje from login where username = '".$_SESSION['login_user']."' ");
		// $result = mysqli_fetch_assoc($resultado);
		
		// $resultado2 =mysqli_query($conexion,"select * from login where Puntaje = 5");
		// $result2 = mysqli_fetch_assoc($resultado2);
		
		// $consulta4 = "select * from login where turno = 1";
		// $resultado4 = mysqli_query( $conexion, $consulta4 );
		// $columna4 = mysqli_fetch_array( $resultado4 );
		
		// $ses_sql2 = mysqli_query($conexion,"select status from login where username = '".$_SESSION['login_user']."'");
		// $ses_sql3 = mysqli_query($conexion,"select count(status) from login where status = 1");
		
		// $row_status = mysqli_fetch_array($ses_sql2,MYSQLI_ASSOC);
		// $row_count = mysqli_fetch_array($ses_sql3,MYSQLI_ASSOC);
		
		// $status = $row_status['status'];
		// $count = $row_count['count(status)'];
		
		// $consulta4 = "select turno from login where username = '".$_SESSION['login_user']."'";
		// $resultado4 = mysqli_query( $conexion, $consulta4 );
		// $columna5 = mysqli_fetch_array( $resultado4 );
		// $turnoActual = intval($columna5['turno']);
		
		// $consulta6 = mysqli_query($conexion, "select *, Puntaje from login where status = 1");
		
		// echo '<table  id="tabla" style="float:right; margin-top:-35%;" align="center" >
		// <tr><th>Turno: ' .$columna4['nombre']. '</th></tr>
		// <tr>
		// <th> Activo </th>
		// <th> Puntos </th>
		// </tr>
		// ';
		
		// while ($tabla = mysqli_fetch_array($consulta6)){ 
		// 	echo
		// 	'
		// 	<br>
		// 	<br>
		// 	<br>
			
		// 	<tr>
		// 	<td>'.$tabla['nombre'].'</td> 
		// 	<td>' .$tabla['Puntaje'].'</td> 
		// 	</tr>
		// 	';
		// }

		
		// if($count <'2' || $status == '0') {
	 //     	echo '<h1>Espera.....</h1>';	
		// }
		// else {
		// 	if($result2['username'] != "") {
		// 		if($result2['username'] == $_SESSION['login_user']) {
		// 			echo '<h1>Ganaste</h1>';
		// 			echo '<script type="text/javascript">$("#Cortina").hide();</script>';
		// 			// echo '<input type="button" onclick="Resetear();"  class="btn btn-primary" value="resetear" />';
		// 		}
		// 		else {
		// 			echo '<h1>Perdiste</h1>';
		// 		}
		// 	} else{
		// 		echo '<h1>¡Sigue jugando!</h1>';

		// 		if($turnoActual =='1'){
					
		// 			echo '<script type="text/javascript">$("#Cortina").hide();</script>';
					
		// 		} else{
					
		// 			echo '<script type="text/javascript">$("#Cortina").show();</script>';
		// 		}
		// 	}
		// }
		
	}
	Puntaje();
}

if (isset($_POST['Puntaje_1'])) {
	
	function Puntaje_1() {

		include('db.php');
		session_start();

		$resultado =mysqli_query($conexion,"select Puntaje from login where username = '".$_SESSION['login_user']."' ");
		$result = mysqli_fetch_assoc($resultado);
		
		$ses_sql2 = mysqli_query($conexion,"select status from login where username = '".$_SESSION['login_user']."'");
		
		$row_status = mysqli_fetch_array($ses_sql2,MYSQLI_ASSOC);
		
		$status = $row_status['status'];
		
		$consulta6 = mysqli_query($conexion, "select * from login where status = 0");
		
		echo 'Puntos: '.$result['Puntaje'].'</br>';
		
	}
	Puntaje_1();
}

if(isset($_POST['resetear'])) {
	$consulta = mysqli_query($conexion, "update login set Puntaje=0, status=0, id_turno=0, turno=0");
	mysqli_fetch_array($consulta);
	
	header("Location: index.php");
}

if(isset($_POST['reinicio_u'])) {
	$consulta = mysqli_query($conexion, "update login set Puntaje=0, status=0, id_turno=0, turno=0, tiempo=0");
	mysqli_fetch_array($consulta);
	
	header("Location:../admin/usuarios.php");
}
if(isset($_POST['reinicio_p'])) {

	$consulta = mysqli_query($conexion, "UPDATE preguntas SET vio = '[0]'");
	mysqli_fetch_array($consulta);
	
	header("Location:../admin/preguntas.php");
}

if (isset($_POST['tabla'])) {
	
	function Tabla() {
		include('db.php');
		session_start();

		$resultado =mysqli_query($conexion,"select Puntaje, tiempo from login where username = '".$_SESSION['login_user']."' ");
		$result = mysqli_fetch_assoc($resultado);
		
		$resultado2 =mysqli_query($conexion,"select username from login where Puntaje = 100");
		$result2 = mysqli_fetch_assoc($resultado2);
		
		$consulta4 = "select username from login";
		$resultado4 = mysqli_query( $conexion, $consulta4 );
		$columna4 = mysqli_fetch_array( $resultado4 );
		
		$ses_sql2 = mysqli_query($conexion,"select status from login where username = '".$_SESSION['login_user']."'");
		$ses_sql3 = mysqli_query($conexion,"select count(status) from login where status = 1");
		
		$row_status = mysqli_fetch_array($ses_sql2,MYSQLI_ASSOC);
		$row_count = mysqli_fetch_array($ses_sql3,MYSQLI_ASSOC);
		
		$status = $row_status['status'];
		$count = $row_count['count(status)'];
		
		$consulta4 = "select turno from login where username = '".$_SESSION['login_user']."'";
		$resultado4 = mysqli_query( $conexion, $consulta4 );
		$columna5 = mysqli_fetch_array( $resultado4 );
		$turnoActual = intval($columna5['turno']);
		
		$consulta6 = mysqli_query($conexion, "select username, Puntaje, tiempo from login ORDER BY Puntaje DESC");
		

		$cont=0;
		while ($tabla = mysqli_fetch_array($consulta6)){ 
			$cont++;
				echo
			'
			<tr>
    			<td>'.$cont.'</td> 
    			<td>'.$tabla['username'].'</td> 
    			<td>' .$tabla['Puntaje'].'</td> 
    			<th> ' .intval($tabla['tiempo']).' Seg </th>
			</tr>
			';
			
			

		}
		
	}
	Tabla();
}

if (isset($_POST['vs'])) {

	function Multiple(){
		include('db.php');
		session_start();
		$user_check = $_SESSION['login_user'];
		$idDesafio = $_POST['idDesafio'];

		$resultado =mysqli_query($conexion,"SELECT * from batallas WHERE id_desafio = ".$idDesafio);
		$result = mysqli_fetch_assoc($resultado);

		$resultadoJ2 =mysqli_query($conexion,"SELECT * from desafios WHERE id = ".$idDesafio);
		$resultJ2 = mysqli_fetch_assoc($resultadoJ2);

		$jugador1 = $resultJ2['id_jugador1'];
		$jugador2 = $resultJ2['id_jugador2'];


		if ( $result ) {
			// Checar si los particiapantes ya terminar sus preguntas
			// $result['preguntas_vistas_j1'];
			// $checJ1 = json_decode( $result['preguntas_vistas_j1'] );
			// $countChecJ1 = count( $checJ1 );
			// $checJ2 = json_decode( $result['preguntas_vistas_j2'] );
			// $countChecJ2 = count( $checJ2 );

			// $result['limite_preguntas'];

			// if ( $result['limite_preguntas'] == $countChecJ1 && $result['limite_preguntas'] == $countChecJ2 ) {
			// 	echo 'Ya se terminó el reto';
			// }

			// echo 'El desafio existe, continuar con la batalla';
			echo '2__'.$result['id_batalla'];
		}else{
			// echo 'El desafio no existe, crear la batalla.';
			// Crear un array para llenarlo con las preguntas aleeatorias.
			$numPreguntas = array();
			$numPreguntasJSON = '"'.json_encode($numPreguntas).'"';

			// Crear un registro con id_desafío, id de jugador 1 y dos, crear un array con las preguntas para jugador 1 y 2, establecer un límite de preguntas, jugador ganador en 0 y estatus de batalla en 0.
			$consultaIns = 'INSERT INTO batallas (id_desafio, jugador1, preguntas_vistas_j1, jugador2, preguntas_vistas_j2, limite_preguntas, jugadorGanador, id_estatusbatalla) VALUES ('.$idDesafio.', '.$jugador1.', '.$numPreguntasJSON.', '.$jugador2.', '.$numPreguntasJSON.', 6, 0, 0)';
			$Insertar = mysqli_query( $conexion, $consultaIns );

			$resultado =mysqli_query($conexion,"SELECT * from batallas WHERE id_desafio = ".$idDesafio);
			$result = mysqli_fetch_assoc($resultado);

			if ( $Insertar ) {
				$consultaUpd = "UPDATE desafios SET status = 'en progreso' WHERE id = '".$idDesafio."' ";
				$resultadoUpd = mysqli_query( $conexion, $consultaUpd );
				echo '1__'.$result['id_batalla'];
			}else{
				echo '0__-';
			}
		}



		// $qry = 'SELECT MAX(id_login) AS max from login';
		// $resultado =mysqli_query($conexion, $qry);



// //MÁXIMO DE TURNO
// 		$resultado =mysqli_query($conexion,"select MAX(id_turno) AS max from login");
// 		$result = mysqli_fetch_assoc($resultado);
// 		$maximoTurno = intval($result['max']) + 1;
// //REVISAR SI EXISTE O NO TURNO == 1
// 		$resultado2 =mysqli_query($conexion,"select username from login where turno = 1");
// 		$result2 = mysqli_fetch_assoc($resultado2);
// 		$turno = $result2['username'] != '' ? 0 : 1;

// 		$ses_sql = mysqli_query($conexion,"select username from login where username = '$user_check' ");
// 		$ses_sql1 = mysqli_query($conexion,"update login as lg 
// 			inner join ((select count(l.status) as aux from login AS l where l.status = 1)) AS ls 
// 			on ls.aux < 2 
// 			set lg.status = 1, lg.id_turno = '$maximoTurno', lg.turno = '$turno'
// 			where lg.username = '$user_check'");
// 		$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
// 		$login_session = $row['username'];
	}
	Multiple();

}

if (isset($_POST['salir'])) {

	function Salir(){
		include('db.php');
		session_start();
		$user_check = $_SESSION['login_user'];
		$idLogin = $_SESSION['id_login'];
		$idTurno = $_SESSION['id_turno'];
//MÁXIMO USUARIO
		$resultado =mysqli_query($conexion,"select MAX(id_login) AS max from login");
		$result = mysqli_fetch_assoc($resultado);
		$maximoUsuario = intval($result['max']);
//REVISAR SI SOY EL ULTIMO TURNO
		$siguienteTurno = intval($_SESSION['id_login']) == $maximoUsuario ? 1 : intval($_SESSION['id_login']) + 1;
		print($siguienteTurno);

		$ses_sql1 = mysqli_query($conexion,"update login as lg 
			set lg.status = 0, lg.id_turno = 0, lg.turno = 0
			where lg.id_login = '$idLogin'");
		$ses_sql2 = mysqli_query($conexion,"update login as lg 
			set lg.status = 1, lg.id_turno = $idTurno, lg.turno = 1
			where lg.id_login = '$siguienteTurno'");
	}
	Salir();

}
