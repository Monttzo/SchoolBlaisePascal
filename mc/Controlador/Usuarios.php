<?php
 class Usuario //Crea clase Usuario
 {
 	protected $User; //Declara variable protegida User
 	protected $nombreUsuario; //Declara variable protegida nombreUsuario
	protected $claveUsuario; //Declara variable protegida claveUsuario
 	protected $ApellidoUsuario; //Declara variable protegida ApellidoUsuario
 	protected $TipoDocumentoUsuario; //Declara varialbe protegida TipoDocumentoUsuario
 	protected $DocumentoUsuario; //Declara variable protegida DocumentoUsuario
 	protected $EstadoUsuario; //Declara variable protegida EstadoUsuario
 	protected $TipoUsuario; //Declara variable protegida tipoUsuario
 	protected $EspecialidadUsuario; //Declara variable protegida EspecialidadUsuario
 	protected $idUsuario; //Declara variable protegida idUsuario
 	

 	public function __construct(){ // Crea el constructor de la clase 
 		/**
 		 *	Constructor vacio 
 		 **/
 	}
 	public function crearUsuario($User,$nombreUsuario,$claveUsuario,$ApellidoUsuario,$TipoDocumentoUsuario,$DocumentoUsuario,$TipoUsuario,$EspecialidadUsuario){ //Crea funcion crearUsuario el cual recibe 9 variables
 		
 		require("../../mc/Modelo/Conexion.php"); //Llama al archivo que contiene la variable de conexion
 		global $enlace; //Llama la variable global conexion
 		
 		$this->User = $User;
 		$this->nombreUsuario = $nombreUsuario;
 		$this->claveUsuario = $claveUsuario;
 		$this->ApellidoUsuario=$ApellidoUsuario; 
 		$this->TipoDocumentoUsuario=$TipoDocumentoUsuario;
 		$this->DocumentoUsuario=$DocumentoUsuario;
 		$this->TipoUsuario = $TipoUsuario;
 		$this->EspecialidadUsuario=$EspecialidadUsuario;
 		
 		$resultado = mysqli_query($enlace,"select * from usuario") or die(mysqli_error($enlace)); /*Declara la variable 
 		resultado como un query de mysql */
 		$query = "Insert into usuario (User, Password, nombreUsuario, apellidoUsuario, tipoDocUsuario, docUsuario, estadoUsuario, tipoUsuario, especialidadUsuario) values ('$this->User', '$this->claveUsuario', '$this->nombreUsuario', '$this->ApellidoUsuario', '$this->TipoDocumentoUsuario', $this->DocumentoUsuario, 1, '$this->TipoUsuario', '$this->EspecialidadUsuario');"; //Establece la variable (query) como un query que registra
 		
 		if(mysqli_query($enlace, $query)){ //Determina si el query da true, es decir se registra correctamente
 			print("<script>alert('Usuario creado correctamente');;window.location.href='../../Inicio.php';</script>"); //Alerta en JavaScript que anunca que se creo
 		} else {			
 			echo mysqli_error($enlace); //Muestra el error de sql 
 		}

 	}
 	public function  verUsuario($DocumentoUsuario){ //Crea función verUsuario que recibe 1 variable

 		require("../../mc/Modelo/Conexion.php"); //Llama al archivo que contiene la variable de conexion
 		global $enlace; //Llama la variable global conexion

 		$this->DocumentoUsuario=$DocumentoUsuario; //Establece esta ($this) variable con la que ingreso el usuario
 		$resultado = mysqli_query($enlace, "select * from usuario where docUsuario = $this->DocumentoUsuario;");
 		//^^ Establece la variable resultado como un query en sql el cual es el select

		if($resultado -> num_rows > 0){ //Revisa si la cantidad de filas del resultado es mayor a 0
			

			while($row = $resultado -> fetch_assoc()){ //Crea un mientras que convierte el resultado en un arreglo y lo pone en row
				//Establece estas variables ($this) con las que se obtuvo en el arreglo
				$this->User= $row['User'];
				$this->claveUsuario = $row['Password'];
				$this->nombreUsuario= $row['nombreUsuario'];
				$this->ApellidoUsuario=$row['apellidoUsuario'];
				$this->TipoDocumentoUsuario=$row['tipoDocUsuario'];
				$this->DocumentoUsuario=$row['docUsuario'];
				$this->EstadoUsuario=$row['estadoUsuario'];
				$this->TipoUsuario=$row['tipoUsuario'];
				$this->EspecialidadUsuario=$row['especialidadUsuario'];
				$this->idUsuario=$row['idUsuario'];
				if ($this->EstadoUsuario == 1){
					$Estado = "Activo";
				} else {
					$Estado = "Desactivo";
				}
				/**
				 * 
				 * Crea un arreglo con lo consultado
				 * se espera un $ArregloDatos = $user->verUsuario(0000000000); para recibirlo
				 * y un print($Usuario[0]); para escribir cada uno de los valores
				 * 
				 **/
				$Usuario = array($this->User,$this->nombreUsuario, $this->ApellidoUsuario,$this->TipoDocumentoUsuario, $this->DocumentoUsuario,$Estado,$this->TipoUsuario,$this->EspecialidadUsuario,$this->idUsuario);
				return $Usuario; //Retorna el arreglo
		 			
		 		
			}
		} else {
			print("<script>alert('Datos incorrectos, o usuario inexistente')</script>");//alerta con JavaScript de datos incorrectos o inexistentes
		}
		
 	}
 	public function actUsuario($ArregloDatos){ //Crea la funcion actUsuario para actualizar un usuario que recibe un arreglo
 		require("../../mc/Modelo/Conexion.php"); //Llama al archivo que contiene la variable de conexion
 		global $enlace; //Llama la variable global conexion

 		//Establece estas variables ($this) con las que se obtuvo en el arreglo
 		$this->User=$ArregloDatos[0];
 		$this->nombreUsuario=$ArregloDatos[1];
 		$this->ApellidoUsuario=$ArregloDatos[2];
 		$this->TipoDocumentoUsuario=$ArregloDatos[3];
 		$this->DocumentoUsuario=$ArregloDatos[4];
 		$this->EspecialidadUsuario=$ArregloDatos[5];
 		$this->idUsuario=$ArregloDatos[6];
 		$query = "update usuario set `User` = '$this->User', nombreUsuario = '$this->nombreUsuario', apellidoUsuario = '$this->ApellidoUsuario', tipoDocUsuario = '$this->TipoDocumentoUsuario', docUsuario = $this->DocumentoUsuario, especialidadUsuario = '$this->EspecialidadUsuario' WHERE (`idUsuario` = $this->idUsuario)"; //Establece la variable (query) como un query que actualiza
 		if(mysqli_query($enlace, $query)){ //Determina si el query da true, es decir se ejecuta el query satisfactoriamente
 			print("<script>alert('Usuario modificado correctamente');;window.location.href='../../Inicio.php';</script>"); //Alerta que redirige y anuncia que se modifico
 		} else {
 			echo mysqli_error($enlace); //Muestra el error de sql
 		}

 	}
 	public function desacUsuario($DocumentoUsuario,$EstadoUsuario){ //Crea funcion desacUsuario para desactivar o activar un usuario
 		require("../../mc/Modelo/Conexion.php");//Llama al archivo que contiene la variable de conexion 
 		global $enlace; //Llama la variable global conexion
 		$this->estadoUsuario=$EstadoUsuario;
 		$this->DocumentoUsuario=$DocumentoUsuario;//Establece esta ($this) variable con la ingresada por el ususario
 		$query = "update usuario set estadoUsuario = '$this->estadoUsuario' where docUsuario = $this->DocumentoUsuario"; //Establece la variable (query) como un query que actualiza usuarios
 		if(mysqli_query($enlace, $query)){//Determina si el query da true, es decir se ejecuta el query satisfactoriamente
 			if($this->estadoUsuario== 1){
 				print("<script>alert('Usuario activado satisfactoriamente');;window.location.href='../../Inicio.php';</script>"); //Alerta que anuncia que el usuario se activo 
 			} else {
 				print("<script>alert('Usuario desactivado satisfactoriamente');;window.location.href='../../Inicio.php';</script>"); //Alerta que anuncia que el usuario se desactivo 
 			}	
 		} else {
 			echo mysqli_error($enlace); //Muestra el error de sql
 		}
 	}
 	public function existeUsuario($DocumentoUsuario){
 		require("../../mc/Modelo/Conexion.php");//Llama al archivo que contiene la variable de conexion 
 		global $enlace; //Llama la variable global conexion
 		$this->DocumentoUsuario=$DocumentoUsuario;
 		$query = mysqli_query($enlace, "select * from Usuario where docUsuario = $this->DocumentoUsuario");
 		if($query-> num_rows == 0){
 			$siono = 'No Existe';
 			return $siono;
 		} else {
 			$siono = 'Existe';
 			return $siono;
 		}
 	}
 } 
?>