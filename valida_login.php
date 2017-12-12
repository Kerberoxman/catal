<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<?php
try{
	$base = new PDO ("mysql:host=sql12.freesqldatabase.com; dbname=sql12210455", "sql12210455", "Hv7cUhnNTq");
	
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql="SELECT * from usuarios where usuario = :usuario and contrasena = :contra";
	
	$resultado = $base->prepare($sql);
	
	$usuario = htmlentities(addslashes($_POST["usuario"]));
	$contrasena = htmlentities(addslashes($_POST["contra"]));
	
	$resultado->bindValue(":usuario",$usuario);
	$resultado->bindValue(":contra",$contrasena);
	$resultado->execute();
	
	$numero_registro = $resultado->rowCount();
	
	if($numero_registro!= 0){
		
		session_start();
		$_SESSION["usuario"]=$_POST["usuario"];
		header("location:sesion1.php");
		
	}else{
		header("location:login.php");
	}
	
}catch (Exceptione $e){
	
}


?>
</body>
</html>
