<?php
require("../../mc/Controlador/Usuarios.php");//Llama al archivo contenedor de la clase Usuario

session_start(); //Inicializa una sesión
$_SESSION['TipoUser']; //Llama la variable de sesión
$_SESSION['DocumentoEstudiante']; //Llama la variable de sesión

	if ($_SESSION['TipoUser'] == "Administrador"){ //Evalua la variable de sesión
		print("<script>alert('No puede realizar esta acción');;window.location.href='../../Inicio.php';</script>"); //Envia una alerta con JavaScript
	} if ($_SESSION['TipoUser'] == "Profesor"){
		print("<script>alert('No puede realizar esta acción');;window.location.href='../../Inicio.php';</script>"); //Envia una alerta con JavaScript
	} if ($_SESSION['TipoUser'] == "Estudiante"){
		require_once('C:\xampp\htdocs\Prueba\Vista\Top\TopEstudiantesVista.php'); //Trae el archivo top que contiene el header
	} if (!isset($_SESSION['TipoUser'])){ //Evalua si la variable de sesión esta vacia
		print("<script>alert('Debe iniciar sesión');;window.location.href='Index.php';</script>");
	}
?>
	<div class ="cuerpo">
		<div id="container">
			<?php
				$_DocumentoUsuario = $_SESSION['DocumentoEstudiante']; //Declara la variable igual a la de sesión
				$user = new Usuario(); //Crea una instancia de la clase Usuario
				$siono = $user -> existeUsuario($_DocumentoUsuario); //Llama a la funcion existeUsuario
				if($siono == "No Existe"){ //Evalua si no existe
					print("<script>alert('El Usuario no existe');;window.location.href='../../Inicio.php';</script>");
				}
				$ArregloDatos = $user -> verUsuario($_DocumentoUsuario); //Llama a la función verUsuario que retorna un arreglo
				/*Muestra un formulario con los datos*/
					print("	<form method='POST' action='../../mc/Controlador/CrudUser.php'>
								<label>Username</label>
								<br><br>
								<input type='text' value='$ArregloDatos[0]' name='user' required>
								<br><br>
								<label>Nombre</label>
								<br><br>
								<input type='text' value='$ArregloDatos[1]' name='nombre' required>
								<br><br>
								<label>Apellido</label>
								<br><br>
								<input type='text' value='$ArregloDatos[2]' name='apellido' required>
								<br><br>
								<label>Tipo de Documento</label>
								<br><br>
								<input type='text' value='$ArregloDatos[3]' name='tiDocumento' required>
								<br><br>
								<label>Número de Documento</label>
								<br><br>
								<input type='number' value='$ArregloDatos[4]' name='documento' required>
								<br><br>
								<label>Estado</label>
								<br><br>
								<input type='text' value='$ArregloDatos[5]' name='estadoUsuario'disabled>
								<br><br>
								<label>Tipo de Usuario</label>
								<br><br>
								<input type='text' value='$ArregloDatos[6]' name='tipoUser' disabled>
								<br><br>
								<label>Especialidad</label>
								<br><br>
								<input type='text' value='$ArregloDatos[7]' name='especialidad' required>
								<br><br>
								<label>idUsuario</label>
								<br><br>
								<input type='number' value='$ArregloDatos[8]' name='idUsuario' readonly>
								<br><br>
								<input type='number' value='2' name='tipo' hidden>
								<input type='submit' value='Modificar' class='submit'>
							</form>");
			?>
		</div>
	</div>
<?php
require_once("../Below.php");//Llama al archivo que contiene el footer
?>