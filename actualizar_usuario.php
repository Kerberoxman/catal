<?php
	session_start();
	if(!isset($_SESSION["usuario"])){
		header("location:login.php");
	}
	
	require_once ("conexion.php");
	$usuario = $_SESSION["usuario"];
	$correo = $_POST['correo'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$edad = $_POST['edad'];
	$sexo = $_POST['sexo'];
	$direccion = $_POST['direccion'];

	if ($sexo == 'Masculino'){
		$sexo == 'M';
	}else{
		$sexo == 'F';
	}
	
	$actualizar = mysql_query("UPDATE usuarios SET correo='$correo',nombre='$nombre',apellidos='$apellidos',edad='$edad',sexo='$sexo',direccion='$direccion' WHERE usuario = '$usuario'",$conexion);

	if($actualizar){
		header("location:sesion1.php");	
	}else{
		echo "Hubo un error". mysql_error();
	}
			

			

?>