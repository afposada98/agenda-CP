<?php
session_start();
error_reporting(0);
include("../base_datos/conexion_users.php");

$login = $_REQUEST['login'];
$password = $_REQUEST['password'];
$consult = mysqli_query($link, "SELECT * FROM usuarios WHERE login='".$login."' ");
$select = mysqli_fetch_array($consult);
$pass = $select['pass'];
$ln = $select['login'];
$id = $select['id'];

	if(($ln == $login)&&($pass == $password)) {    
		$consult = mysqli_query($link, "SELECT * FROM permisos WHERE id='".$id."' AND cod_programa=9");
		$select = mysqli_fetch_array($consult);
		$tipo=$select['cod_perfil'];
		if($tipo==3) {
			header("Location: ../vista/inicio_externos.php");
			$_SESSION["agendalog"] = "SI";
			$_SESSION["iduser"] = $select['cedula'];
			
		} else if($tipo==1) {
			
			header("Location: ../vista/inicio_externos.php");
			$_SESSION["agendalog"] = "SI";
			$_SESSION["iduser2"] = $select['cedula'];
			
		} else {
			echo "<script> alert('Permisos insuficientes para ingresar'); document.location=(\"http://intranet/agenda/vista/login.php Telefonica\");</script>";
			$_SESSION["agendalog"] = "NO";
		}
	
	} else {
		echo "<script> alert('Login y/o Password Incorrectos'); document.location=(\"http://intranet/agenda/vista/login.php \");</script>";
		$_SESSION["agendalog"] = "NO";
	}
mysqli_close($link);
?>
