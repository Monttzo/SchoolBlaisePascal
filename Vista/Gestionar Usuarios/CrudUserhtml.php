<?php
session_start();
$_SESSION['TipoUser'];
	if ($_SESSION['TipoUser'] == "Administrador"){
		require_once('C:\xampp\htdocs\Prueba\Vista\Top\TopAdminVista.php');
	} if ($_SESSION['TipoUser'] == "Profesor"){
		require_once('C:\xampp\htdocs\Prueba\Vista\Top\TopProfesorVista.php');
	} if ($_SESSION['TipoUser'] == "Estudiante"){
		print("<script>alert('No puede realizar esta acción');;window.location.href='../../Inicio.php';</script>");
	} if (!isset($_SESSION['TipoUser'])){
		print("<script>alert('Debe iniciar sesión');;window.location.href='Index.php';</script>");
	}
?>
	<div class="cuerpo">
		<div id="container">
			<?php
			require("../../mc/Controlador/Usuarios.php");

			switch ($_POST['tipo']) {
				case '1':
					$_DocumentoUsuario = $_POST['documento'];
					$user = new Usuario();
					$siono = $user -> existeUsuario($_DocumentoUsuario);
					if($siono == "Existe"){
						print("<script>alert('El usuario ya existe');;window.location.href='../../Inicio.php';</script>");
					}
					print("	<form method='POST' action='../../mc/Controlador/CrudUser.php'>
								<label>Username</label>
								<br><br>
								<input type='text' placeholder='Username' name='User'required>
								<br><br>
								<label>Nombre</label>
								<br><br>	
								<input type='text' placeholder='Nombre' name='nombre' required>
								<br><br>
								<label>Apellido</label>
								<br><br>
								<input type='text' placeholder='Apellido' name='apellido' required>
								<br><br>
								<label>Tipo de documento</label>
								<br><br>
								<input type='text' placeholder='Tipo de documento' name='tiDocumento' required>
								<br><br>
								<label>Número de documento</label>
								<br><br>
								<input type='number' value='$_DocumentoUsuario' name='documento' readonly>
								<br><br>
								<label>Estado</label>
								<br><br>
								<input type='text' value='Activo' name='estado' readonly>
								<br><br>
								<label>Tipo de usuario</label>
								<br><br>
								<select name='tipoUser' required>
									<option value='Administrador'>Administrador</option>
									<option value='Profesor'>Profesor</option>
									<option value='Estudiante'>Estudiante</option>
								</select> 
								<br><br>
								<label>Especialidad</label>
								<br><br>
								<input type='text' placeholder='Especialidad' name='especialidad' required>
								<br><br>
								<label>Contraseña</label>
								<br><br>
								La contraseña no puede tener mas de 8 caracteres.
								<br><br>
								<input type='password' placeholder='Clave'name='clave' required>
								<br><br>
								<input type='number' value='1' name='tipo'hidden>
								<br><br>
								<input type='submit' value='Registrar' class='submit'>
							</form>");
					break;
				case '2':
					$_DocumentoUsuario = $_POST['documento'];
					$user = new Usuario();
					$siono = $user -> existeUsuario($_DocumentoUsuario);
					if($siono == "No Existe"){
						print("<script>alert('El Usuario no existe');;window.location.href='../../Inicio.php';</script>");
					}
					$ArregloDatos = $user -> verUsuario($_DocumentoUsuario);
					print("<form method='POST' action='/Inicio.php'>
								<label>Username</label>
								<br><br>
								<input type='text' value='$ArregloDatos[0]' name='user' disabled>
								<br><br>
								<label>Nombre</label>
								<br><br>
								<input type='text' value='$ArregloDatos[1]' name='nombre' disabled>
								<br><br>
								<label>Apellido</label>
								<br><br>
								<input type='text' value='$ArregloDatos[2]' name='apellido' disabled>
								<br><br>
								<label>Tipo de documento</label>
								<br><br>
								<input type='text' value='$ArregloDatos[3]' name='tiDocumento' disabled>
								<br><br>
								<label>Número de documento</label>
								<br><br>
								<input type='number' value='$ArregloDatos[4]' name='documento' disabled>
								<br><br>
								<label>Estado</label>
								<br><br>
								<input type='text' value='$ArregloDatos[5]' disabled>
								<br><br>
								<label>Tipo de Usuario</label>
								<br><br>
								<input type='text' value='$ArregloDatos[6]' name='tipoUser' disabled>
								<br><br>
								<label>Especialidad</label>
								<br><br>
								<input type='text' value='$ArregloDatos[7]' name='especialidad' disabled>
								<br><br>
								<label>idUsuario</label>
								<br><br>
								<input type='number' value='$ArregloDatos[8]' name='idUsuario' disabled>
								<br><br>
								<input type='submit' value='Volver' class='submit'>
							</form>");
					break;
				case '3':
					$_DocumentoUsuario = $_POST['documento'];
					$user = new Usuario();
					$siono = $user -> existeUsuario($_DocumentoUsuario);
					if($siono == "No Existe"){
						print("<script>alert('El usuario no existe');;window.location.href='../../Inicio.php';</script>");
					}
					$ArregloDatos = $user -> verUsuario($_DocumentoUsuario);
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
					break;
				case '4':
					$_DocumentoUsuario = $_POST['documento'];
					$user = new Usuario();
					$siono = $user -> existeUsuario($_DocumentoUsuario);
					if($siono == "No Existe"){
						print("<script>alert('El usuario no existe');;window.location.href='../../Index.php';</script>");
					}
					print("	<form method='POST' action='../../mc/Controlador/CrudUser.php'>
								<label>Número de Documento</label>
								<br><br>
								<input type='number' value='$_DocumentoUsuario'name='documento' readonly>
								<br><br>
								<label>Estado</label>
								<br><br>
								<select name='estado' required>
									<option value='Activo'>Activo</option>
									<option value='Desactivo'>Desactivo</option>
								</select>
								<br><br>
								<input type='number' value='3' name='tipo' hidden>
								<br><br>
								<input type='submit' value='Desactivar o Activar' class='submit'>
							</form>");
					break;
			}
			?>
		</div>	
	</div>
<?php
require_once("../Below.php");
?>