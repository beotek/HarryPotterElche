<?php

Class Conexion{

	public static function conectarBD(){
		$server="mysql.hostinger.es";
		$usr="u492219972_root";
		$pass="harrypotter";
		$bd="u492219972_harry";
		$mysqli = new mysqli($server, $usr, $pass, $bd);
		if ($mysqli->connect_errno) {
			echo "Error: Fallo al conectarse a MySQL debido a: \n";
			echo "Errno: " . $mysqli->connect_errno . "\n";
			echo "Error: " . $mysqli->connect_error . "\n";
			exit;
		}
		return $mysqli;
	}
}

if (isset($_POST['nombre'])) {
$nombre=$_POST['nombre'];

$sql="SELECT * FROM usuarios WHERE nombre='$nombre'";
$mysqli=conexion::conectarBD();
$res=$mysqli->query($sql);
if($res->num_rows>0){
echo "El nombre ".$_POST['nombre'] . " no esta disponible <br>";
}
}

if (isset($_POST['email'])) {

$email=$_POST['email'];
$sql1="SELECT * FROM usuarios WHERE email='$email'";
$mysqli=conexion::conectarBD();
$res=$mysqli->query($sql1);
if($res->num_rows>0){
echo "Email usado";
}
}


 ?>
