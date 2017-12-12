<?php

$host ="sql12.freesqldatabase.com";
$user ="sql12210455";
$contra = "Hv7cUhnNTq";

$db = "sql12210455";
$conexion = mysql_connect($host,$user,$contra,$db) or die("No se conecta porque: ".mysql_error());

if(mysql_error())
{
	echo "Fallo al conectar";
	die ("No se conecta porque: ".mysql_error());
	exit();
}

mysql_select_db ($db,$conexion);

?>