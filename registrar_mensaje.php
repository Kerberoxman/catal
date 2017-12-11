<?php
			session_start();
			if(!isset($_SESSION["usuario"])){
				header("location:login.php");
			}
			require_once ("conexion.php");
			$usuario = $_SESSION["usuario"];
			$asunto = $_POST['asunto'];
			$mensaje = $_POST['mensaje'];
			
			$nuevos_mensajes = mysql_query("INSERT INTO mensajes VALUES ('','$usuario','$asunto','$mensaje',now())",$conexion);

			if($nuevos_mensajes){
				header("location:sesion1.php");	
			}else{
				echo "Hubo un error". mysql_error();
			}
			

			

?>