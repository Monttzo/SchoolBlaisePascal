<?php
session_start(); //Inicializa una sesión
$_SESSION['TipoUser']; //Trae la variable de sesión 

	if ($_SESSION['TipoUser'] == "Administrador"){
		require_once('C:\xampp\htdocs\Prueba\Vista\Top\TopAdminVista.php');
	} if ($_SESSION['TipoUser'] == "Profesor"){
		require_once('C:\xampp\htdocs\Prueba\Vista\Top\TopProfesorVista.php');
	} if ($_SESSION['TipoUser'] == "Estudiante"){
		print("<script>alert('No puede realizar esta acción');;window.location.href='../../Inicio.php';</script>");
	} if (!isset($_SESSION['TipoUser'])){
		print("<script>alert('Debe iniciar sesión');;window.location.href='../../Index.php';</script>");
	}
?>
	<div class="cuerpo" style="height: 60%;">
		<div id="container" >
			<div class="Gestion">
				<h1>Consultar</h1>
				<form method="POST" action="CrudUserhtml.php" class="Consultar">
					<h3>Digite el numero de documento:</h3><br>
					<input type="number" name="documento" required>
					<input type="number" name="tipo" value="2" hidden>
					<input type="submit" value="Buscar" class='submit'>
				</form>
			</div>
		</div>
	</div>
<?php
	require_once("../Below.php"); 
?>