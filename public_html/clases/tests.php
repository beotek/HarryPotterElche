<?php
require_once("conexion.php");

class Tests{
	private $test;

	public function gettesthecho($email,$test){ //Devuelve cuantos puntos tiene gryffindor

			$sql="select count(email) as cuantos from Tests where Test='$test' and email='$email'";
		$cuenta=0;
		$con=Conexion::conectar();
		$res=$con->query($sql);
		if($res){
			$vec=$res->fetch_assoc();
			$cuenta=$vec["cuantos"];
		}
		Conexion::desconectar($con);
		return $cuenta;
	}


		public function set_testhecho($test,$email){ //inserta al usuario en la bd
			$sql="insert into Tests(Test,email)
			  values('$test','$email')";
			$conexion=Conexion::conectar();
			$conexion->query($sql);
			Conexion::desconectar($conexion);
		}

	
}
?>
