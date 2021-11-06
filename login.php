<?php
	require_once('C:\xampp\htdocs\Prueba\Vista\Top\Toplogin.php');
?>
  <div class="cuerpo">
    <div id="board">
      <form method="POST" action="mc/Controlador/login.php">
        <div id="container">
          <h1>INICIAR SESIÓN</h1><h3>
          <label for="usuario">Nombre usuario</label>
          <br>
          <br>
          <input type="text" name="usuario" id="usuario" required>
          <br>
          <br>
          <label for="contrasenia">Contraseña</label>
          <br>
          <br>
          <input type="password" name="clave" id="contrasenia" required>
          <br>
          <br>
          <input type="submit" name="Login" value="Login" class="Login"></h3>
        </div>
      </form>
    </div>
  </div>