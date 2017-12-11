<!DOCTYPE HTML>
<html>
	<head>
		<title>Prologue by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/jquery.scrollzer.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
	</head>

	<body>
		<?php
			session_start();
			if(!isset($_SESSION["usuario"])){
				header("location:login.php");
			}
			require_once ("conexion.php");
			$usuario = $_SESSION["usuario"];
			
			$busqueda_usuario = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario'",$conexion);
			$fila1 = mysql_fetch_array($busqueda_usuario);
			$busqueda_citas = mysql_query("SELECT * FROM citas WHERE usuario = '$usuario'",$conexion);
			$busqueda_citas1 = mysql_query("SELECT * FROM citas WHERE usuario = '$usuario'",$conexion);
			$buscar = mysql_fetch_row($busqueda_citas1);
			if($buscar > 0){
				echo "<style type='text/css'>
					.agregar{
					visibility: hidden;
					display: none;
					}
					</style>";
			}
?>

		<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							
							<h1 id="title"><?php echo $fila1['nombre'] . " " . $fila1['apellidos'];?></h1>
							<p>Hyperspace Engineer</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="sesion1.php" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Inicio</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Citas</span></a></li>
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>

				</div>

			</div>

		<!-- Main -->
			<div id="main">
				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">

							<header>
								<h2>Mi información</h2>
							</header>

							<article>
								<form method="post" action="actualizar_usuario.php">
								<div class="row">
									<div><label>Correo: </label></label><input type="email" maxlength="30" name="correo" required value="<?php echo $fila1['correo'];?>"/></div>
									<div><label>Nombre: </label></label><input type="text" maxlength="20" name="nombre" required value="<?php echo $fila1['nombre'];?>"/></div>
									<div><label>Apellidos: </label></label><input type="text" maxlength="40" name="apellidos" required value="<?php echo $fila1['apellidos'];?>"/></div>
									<div><label>Edad: </label></label><input type="number" maxlength="3" name="edad" required value="<?php echo $fila1['edad'];?>"/></div>
									<div><label>Sexo: </label></label><input type="text" maxlength="9" name="sexo" required value="<?php if ($fila1['sexo'] == 'M'){
																																			echo "Masculino";
																																		}else{
																																			echo "Femenino";
																																			}?>"/></div>

									<div><label>Direccion: </label></label><input type="text" name="direccion" required value="<?php echo $fila1['direccion'];?>"/></div>
									<div class="12u$">
										<input type="submit" value="Actualizar" />
										<a href="sesion1.php"><input type="button" value="Cancelar"/></a>
									</div>
								</div>
							</form>							
							</article>
						</div>
					</section>


		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; Todos los derechos reservados.</li><li>Diseño: Acupuntura Catal</li>
					</ul>

			</div>
	</body>
</html>