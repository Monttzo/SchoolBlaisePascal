<?php
require("Usuarios.php"); //Llama al archivo contenedor de la clase Usuarios
switch ($_POST['tipo']) { //Realiza un switch case
	case '1': //En el caso de que sea 1
		$_User = $_POST['User']; 
		$_nombreUsuario = $_POST['nombre'];
		$_ApellidoUsuario = $_POST['apellido'];
		$_TipoDocumentoUsuario = $_POST['tiDocumento'];
		$_DocumentoUsuario = $_POST['documento'];
		$_TipoUsuario = $_POST['tipoUser'];
		$_EspecialidadUsuario = $_POST['especialidad'];
		$_claveUsuario = $_POST['clave'];
		if((is_numeric($_User)) || (is_numeric($_nombreUsuario)) || (is_numeric($_ApellidoUsuario)) || (is_numeric($TipoDocumentoUsuario)) || ($_DocumentoUsuario <= 0) || (is_numeric($_EspecialidadUsuario))){
			print("<script>alert('Datos incorrectos');;window.location.href='../../Inicio.php';</script>");
		} else {
			$user = new Usuario(); //Crea una Instancia de la clase Usuario
			$user->crearUsuario($_User,$_nombreUsuario,$_claveUsuario,$_ApellidoUsuario,$_TipoDocumentoUsuario,$_DocumentoUsuario,$_TipoUsuario,$_EspecialidadUsuario); //Llama la función crearUsuario
		}
		
		break;
	case '2':
		$ArregloDatos = array( //Inicializa un Array 
			$_User = $_POST['user'],
			$_nombreUsuario = $_POST['nombre'],
			$_ApellidoUsuario = $_POST['apellido'],
			$_TipoDocumentoUsuario = $_POST['tiDocumento'],
			$_DocumentoUsuario = $_POST['documento'],
			$_EspecialidadUsuario = $_POST['especialidad'],
			$_idUsuario = $_POST['idUsuario']);
		if((is_numeric($_User)) || (is_numeric($_nombreUsuario)) || (is_numeric($_ApellidoUsuario)) || (is_numeric($TipoDocumentoUsuario)) || ($_DocumentoUsuario <= 0) || (is_numeric($_EspecialidadUsuario))){
			print("<script>alert('Datos incorrectos');;window.location.href='../../Inicio.php';</script>");
		} else {
			$user = new Usuario(); //Crea una Instancia de la clase Usuario
			$user->actUsuario($ArregloDatos); //Llama a la función actUsuario
		}
		break;
	case '3':
		$_DocumentoUsuario=$_POST['documento'];
		$_EstadoUsuario=$_POST['estado'];
		if ($_EstadoUsuario == "Activo"){ 
			$Estado = 1;
		} else {
			$Estado = 0;
		}
		$user = new Usuario(); //Crea una Instancia de la clase Usuario
		$user->desacUsuario($_DocumentoUsuario,$Estado); //Llama a la función desacUsuario
		break;
}
	
?>