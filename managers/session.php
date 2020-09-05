<?php 
	session_start();
	if (!isset($_SESSION['idutilizador'])){
		header('location:../index.php');
	}
	$id_session=$_SESSION['idutilizador'];
	$tipo_session=$_SESSION['tipo'];
	$username_session=$_SESSION['username'];
?>