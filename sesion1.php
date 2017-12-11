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
								<li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Inicio</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Citas</span></a></li>
								<li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-user">Mi perfil</span></a></li>
								<li><a href="#notas" id="notas-link" class="skel-layers-ignoreHref"><span class="icon fa-pencil ">Notas</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Contacto</span></a></li>
								<li><a href="cerrar_sesion.php" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-sign-out">Cerrar Sesion</span></a></li>
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

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2 class="alt">Bienvenido <strong><?php echo $fila1['nombre'];?></strong>, aqui podras dar seguimiento a <br />
								tus sesiones y consultar algunas dudas que tengas,
								<p>y ademas podras agendar tus citas muy facilmente.</p><br /></h2>

								


							</header>
						</div>
					</section>

				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">

							<header>
								<h2>Citas</h2>
							</header>

							<article>
							
								<a class="agregar" href="agregar_cita.php">Agregar Citas</a>	
									<table class="tabla">
										<tr>
											<th>#</th>
											<th>Fecha</th>
											<th>Hora</th>
											<th>Paciente</th>
											
											<th>Consultorio</th>
											<th>Estado</th>
											<th colspan="2">Opciones</th>
										</tr>											
										<?php while ($fila2 = mysql_fetch_array($busqueda_citas)){?>
										<tr>
											<td class="mayusculas"><?php echo $fila2['id_cita']?></td>
											<td class="mayusculas"><?php echo $fila2['fecha_cita']?></td>
											<td class="mayusculas"><?php echo $fila2['hora']?></td>
											<td class="mayusculas"><?php echo $fila1['nombre'] . " " . $fila1['apellidos'];?></td>
											
											<td class="mayusculas">Coatepec</td>
											<td class="mayusculas"><?php echo $fila2['estado']?></td>
											<td class='centrar'><a href="eliminar_cita.php" class="eliminar">Eliminar</a></td>
										</tr>
										<?php }?>
									</table>
							</article>
						</div>
					</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

							<header>
								<h2>Mi Perfil</h2>
							</header>

							<article>	
									<table class="tabla">
										<tr>
											<th>#</th>
											<th>Usuario</th>
											<th>Nombre</th>
											<th>Correo</th>
											<th>Edad</th>
											<th>Sexo</th>
											<th>Direccion</th>
											<th>Fecha de Ingreso</th>
											<th colspan="2">Opciones</th>
										</tr>											
										<tr>
											<td class="mayusculas"><?php echo $fila1['id_usuario'];?></td>
											<td class="mayusculas"><?php echo $fila1['usuario'];?></td>
											<td class="mayusculas"><?php echo $fila1['nombre'] . " " . $fila1['apellidos'];?></td>
											<td class="mayusculas"><?php echo $fila1['correo'];?></td>
											<td class="mayusculas"><?php echo $fila1['edad'];?></td>
											<td class="mayusculas"><?php 
																		if ($fila1['sexo'] == 'F'){
																			echo "Femenino";
																		}else{
																			echo "Masculino";
																		}
																	;?></td>
											<td class="mayusculas"><?php echo $fila1['direccion'];?></td></td>
											<td class="mayusculas"><?php echo $fila1['fecha_ingreso'];?></td></td>
											<td class='centrar'><a href="actualizar.php" class="eliminar">Actualizar</a></td>
										</tr>
									</table>
							</article>

						</div>
					</section>

				<!-- NOTAS -->
					<section id="notas" class="four">
						<div class="container">

							<header>
								<h2>NOTAS</h2>
							</header>

							<article>	
								<div class="col-sm-4">
	                        		<div class="fluid-video">
	                           			<iframe width="854" height="480" src="https://www.youtube.com/embed/cUuHG7kV1wk" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> 
			                        </div>
        			            </div>
							</article>

						</div>
					</section>

				<!-- Contact -->
					<section id="contact" class="five">
						<div class="container">

							<header>
								<h2>Contacto</h2>
							</header>

							<p>Puedes contactarnos mandando un mensaje con la razon del mensaje y una breve explicacion de la razon
							del contacto y se te respondera a la brevedad posible.</p>

							<form method="post" action="registrar_mensaje.php">
								<div class="row">
									<div class="6u 12u$(mobile"><input type="text" name="asunto" placeholder="Razon/Asunto" /></div>
									<div class="12u$">
										<textarea name="mensaje" placeholder="Mensaje"></textarea>
									</div>
									<div class="12u$">
										<input type="submit" value="Enviar Mensaje" />
									</div>
								</div>
							</form>
						</div>
					</section>
			</div>

		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; Todos los derechos reservados.</li><li>Diseño: Acupuntura Catal</li>
					</ul>

			</div>
	</body>
</html>