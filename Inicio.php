<?php
session_start();
$_SESSION['TipoUser'];
	if ($_SESSION['TipoUser'] == "Administrador"){
		require_once('C:\xampp\htdocs\Prueba\Vista\Top\TopAdmin.php');
	} if ($_SESSION['TipoUser'] == "Profesor"){
		require_once('C:\xampp\htdocs\Prueba\Vista\Top\TopProfesor.php');
	} if ($_SESSION['TipoUser'] == "Estudiante"){
		require_once('C:\xampp\htdocs\Prueba\Vista\Top\TopEstudiantes.php');
	} if (!isset($_SESSION['TipoUser'])){
		print("<script>alert('Debe iniciar sesión');;window.location.href='Index.php';</script>");
	}
?>
	<div class="cuerpo">
		<div id="container">
			<p align="center"><img class="imagen1" src="imagenes/niños.jpeg"></p>
	 		<h2>Nuestra Historia</h2>
	 		<article>
	 			<p>El Colegio Blaise Pascal, fue fundado el 16 de Octubre de 1.993 por su actual rectora, Mary
	               Guerrero Ballén, quien con amor y dedicación por su profesión de docente, decidió abrir un
	               espacio propio para educar y formar grandes seres humanos.</p>
	 			<p>
	 				 En 1.994 se la inicio al primer año escolar para los niños en edades tempranas, Preescolar.
	 			</p>
	 			<p>
	 				A inicios de 1.997 se inicia la prestación del servicio educativo para los grados de Primero a Cuarto.
	 			</p>
	 			<p>
	 				Finalmente, en el año 2.005 se dio apertura al grado quinto.
	 			</p>
	 			<p>
	 				A lo largo de la historia del Colegio se han vivido momentos especiales de alegría y satisfacción, los
	                cuales han dejado huella en cada uno de los miembros de la comunidad educativa que conforman
	                la familia del Colegio Blaise Pascal.
	 			</p>
	 			<p>
	 				El nombre del Colegio se da en honor al matemático, físico, teólogo y filósofo francés quien con
	                sus aportes a la matemática estableció las bases de lo que posteriormente sería la calculadora.
	 			</p>
	 		</article>
 		</div>
 	</div>
<?php
	require_once("Vista/Below.php") 
?>