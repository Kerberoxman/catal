<?php
			require_once ("conexion.php");
			$busqueda_usuario = mysql_query("SELECT * FROM usuarios",$conexion);
			echo $busqueda_usuario;
?>