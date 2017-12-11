<?php
	include ("conexion.php");

	$usuario = $_POST['usuario'];
	$contra = $_POST['contra'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$edad = $_POST['edad'];
	$sexo = $_POST['sexo'];
	$correo = $_POST['correo'];
	$direccion = $_POST['direccion'];

	$sql = mysql_query("SELECT * FROM usuarios WHERE usuario='$usuario'");
    $resultado = mysql_num_rows($sql);

    if($resultado > 0){
    	
    }

	$sql1 = mysql_query("INSERT INTO usuarios VALUES ('','$usuario','$contra','$correo','$nombre','$apellidos','$edad','$sexo','$direccion')");
	$resultado1 = mysql_num_rows($sql1);
?>