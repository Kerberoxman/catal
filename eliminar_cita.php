<?php
			session_start();
			if(!isset($_SESSION["usuario"])){
				header("location:login.php");
			}
			require_once ("conexion.php");
			$usuario = $_SESSION["usuario"];
			
			$busqueda_citas = mysql_query("DELETE FROM citas WHERE usuario = '$usuario'",$conexion);
			 header("location:sesion1.php");

			

?>