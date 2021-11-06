<?php
global $enlace; //Crea la variable global enlace, con la que se hara la conexión con mysql

$enlace = mysqli_connect("localhost", "root", "", "colegio"); //Crea la conexión con la base de datos colegio

if (!$enlace) { //Evalua si falla la conexion a mysql
	die ("Fallo la conexión a Mysql"); //Error de fallo en mysql
} 
?>