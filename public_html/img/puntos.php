<?php
require_once("conexion.php");

class Puntos{
	private $puntos;

	public function getpuntosgry(){ //Devuelve cuantos puntos tiene gryffindor

			$sql="select SUM(puntos) as puntos from usuarios where tipoUsr='gry'";
		$cuenta=0;
		$con=Conexion::conectar();
		$res=$con->query($sql);
		if($res){
			$vec=$res->fetch_assoc();
			$cuenta=$vec["puntos"];
		}
		Conexion::desconectar($con);
		return $cuenta;
	}

	public function getpuntossly(){ //devuelve cuantos puntos tiene sly

			$sql="select SUM(puntos) as puntos from usuarios where tipoUsr='sly'";
		$cuenta=0;
		$con=Conexion::conectar();
		$res=$con->query($sql);
		if($res){
			$vec=$res->fetch_assoc();
			$cuenta=$vec["puntos"];
		}
		Conexion::desconectar($con);
		return $cuenta;
	}

	public function getpuntosrav(){ //devuelve cuantos puntos tiene rav

			$sql="select SUM(puntos) as puntos from usuarios where tipoUsr='rav'";
		$cuenta=0;
		$con=Conexion::conectar();
		$res=$con->query($sql);
		if($res){
			$vec=$res->fetch_assoc();
			$cuenta=$vec["puntos"];
		}
		Conexion::desconectar($con);
		return $cuenta;
	}

	public function getpuntoshuf(){ //devuelve cuantos puntos tiene huf

			$sql="select SUM(puntos) as puntos from usuarios where tipoUsr='huf'";
		$cuenta=0;
		$con=Conexion::conectar();
		$res=$con->query($sql);
		if($res){
			$vec=$res->fetch_assoc();
			$cuenta=$vec["puntos"];
		}
		Conexion::desconectar($con);
		return $cuenta;
	}

	public function sumarpuntos($puntos,$usuario){
		$sql="update usuarios set puntos=puntos+$puntos where nombre='$usuario'"  ;
		//echo $sql;
		$mysqli=Conexion::conectar();
		$mysqli->query($sql);
		$mysqli->close();
	}

	public function getpuntosusuario($email){

				$sql="select puntos as cuantos from Usuarios where email='$email' ";
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
}
?>
