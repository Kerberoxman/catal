<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Inicio Sesión</title>
<link rel="stylesheet" type="text/css" href="login.css">
</head>


<body>
	<div id="form">
		<form name="login" action="valida_login.php" method="post" autocomplete="off">
			<h1>Login</h1>
			<input type="text" maxlength="10" placeholder="&#9812; Usuario" name="usuario" required autocomplete="off">
			<input type="password" maxlength="10" placeholder="&#128273; Contraseña" name="contra" required autocomplete="off">
			<input type="submit" value="Acceder" name="acceder">
			<h3>Registrate <a href="registro.php">Aqui</a></h3>
		</form>
    </div>
    <div id="logo">
    	<img src="logo1.png">
    </div>

</body>
</html>