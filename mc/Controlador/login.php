<?php
session_start(); // inicia una sesion
require("../Modelo/Conexion.php");//Llama al archivo de conexion
global $enlace;//Llama la variable global de conexion


$user = $_POST['usuario'];//Recibe la variable usuario del formulario
$pass = $_POST['clave'];//Recibe la variable clave del formulario

$query1 = "select * from usuario where `User` = '$user' and `Password` = '$pass'";//Define el query1 que consulta en la tabla usuarios la clave y el usuario
$resultadoQuery1 = mysqli_query($enlace, $query1) or die(mysqli_error($enlace)); //ejecuta el query y muestra el ellos si lo hay
$filasQuery1 = $resultadoQuery1-> num_rows; //Cuenta el numero de filas del resultado
$row = mysqli_fetch_array($resultadoQuery1); //Convierte el resultado en un arreglo
if($filasQuery1==0){ //Evalua si el numero de filas es 0
	print("<script>alert('Usuario o clave incorrectos');;window.location.href='../../Index.php';</script>");
} else {
	$Activo = $row['estadoUsuario'];
	if($Activo == 1){ //Valida si el usuario esta activo o nos
		print("<script>alert('Iniciando Sesión');;window.location.href='../../Inicio.php';</script>");
		$_SESSION['TipoUser'] = $row['tipoUsuario']; //Crea una variable de sesión
		$_SESSION['DocumentoEstudiante'] = $row['docUsuario']; //Crea una variable de sesión
	} else {
		print("<script>alert('Usuario Desactivado');;window.location.href='../../Index.php';</script>");
	}
	
}
?>