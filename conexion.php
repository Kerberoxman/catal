<?php

$host ="localhost";
$user ="root";
$contra = "";

$db = "acupuntura";
$conexion = mysql_connect($host,$user,$contra,$db) or die("No se conecta porque: ".mysql_error());

if(mysql_error())
{
	echo "Fallo al conectar";
	die ("No se conecta porque: ".mysql_error());
	exit();
}

mysql_select_db ($db,$conexion);

?>