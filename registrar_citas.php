<?php
			session_start();
			if(!isset($_SESSION["usuario"])){
				header("location:login.php");
			}
			require_once ("conexion.php");
			$usuario = $_SESSION["usuario"];
			$fecha = $_POST['fecha'];
			$hora = $_POST['hora'];
			
			$nueva_citas = mysql_query("INSERT INTO citas VALUES ('','$usuario','$fecha','$hora','Pendiente')",$conexion);

			if($nueva_citas){
				header("location:sesion1.php");	
			}else{
				echo "Hubo un error". mysql_error();
			}
			

			

?>