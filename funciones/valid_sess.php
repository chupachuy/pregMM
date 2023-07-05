<?php
error_reporting(0);
if ( !$_SESSION['id_login'] ) {
	header("location: login.php");
}
?>