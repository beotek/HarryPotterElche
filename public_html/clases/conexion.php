<?php
class Conexion{
	public static function conectar(){
		$servidor = 'mysql.hostinger.es'; // puesto que se est� trabajando en modo local
		$usuario = 'u492219972_root'; // el usuario que se puso en un principio
		$clave = 'harrypotter'; // contrase�a de la base de datos
		$base_de_datos = 'u492219972_harry'; // nombre de la base de datos
		$con = new mysqli($servidor, $usuario, $clave, $base_de_datos);


		if ($con==FALSE){
		 echo "<font color=red>Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
		  echo "</font>\n" ;
		  die ();
		}

		return $con;
	}

	public static function desconectar($con){
		$con->close();
	}

}

?>
