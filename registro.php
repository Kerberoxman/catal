<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Inicio Sesión</title>
<link rel="stylesheet" type="text/css" href="registro.css">
</head>


<body>
	<div id="form">
		<form name="login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			<h1>Registro</h1>
			<input type="text" maxlength="25" placeholder="Usuario" name="usuario" required autocomplete="off">
			<input type="password" minlength="8" maxlength="16" placeholder="Contraseña (min. 8 caracteres)" name="contra" required autocomplete="off">
			<input type="text" maxlength="20" placeholder="Nombre" name="nombre" required autocomplete="off">
			<input type="text" maxlength="40" placeholder="Apellidos" name="apellidos" required autocomplete="off">
			<input type="number" maxlength="3" placeholder="Edad" name="edad" required autocomplete="off">
			<input type="text" maxlength="1" placeholder="Sexo (M/F)" name="sexo" required autocomplete="off">
			<input type="email" maxlength="30" placeholder="Correo" name="correo" required autocomplete="off">
			<input type="text" placeholder="Direccion" name="direccion" required autocomplete="off">
			<input type="submit" value="Registrar" name="acceder">
			<h3><a href="login.php">Ya tienes cuenta?</a></h3>
		</form>
    </div>

    <div id="logo">
    	<img src="logo1.png">
    </div>

<?php
	include ("conexion.php");
	if(isset($_POST['acceder'])){

		$usuario = $_POST['usuario'];
		$contra = $_POST['contra'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$edad = $_POST['edad'];
		$sexo = $_POST['sexo'];
		$correo = $_POST['correo'];
		$direccion = $_POST['direccion'];

		$sql = mysql_query("SELECT * FROM usuarios WHERE usuario ='$usuario'",$conexion);
	    $resultado = mysql_num_rows($sql);

	    if($resultado > 0){
	    	echo '<script language="javascript">
                        alert ("Ya hay un usuario registrado con este nombre. Por favor escoja otro");
                    </script>';
            
	    }else{
			$sql1 = mysql_query("INSERT INTO usuarios VALUES ('','$usuario','$contra','$correo','$nombre','$apellidos','$edad','$sexo','$direccion',now())");
			mysql_num_rows($sql1) or die ("Error: " . mysql_error());
			header("location:login.php");
		}	
	}
?>
</body>
</html>
