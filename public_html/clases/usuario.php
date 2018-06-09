<?php
require_once("conexion.php");

class Usuario{
	private $alu; // array asociativo
	private $nombre,$tipoUsr,$pas,$email,$avatar,$puntos;

	public function __construct(){
		$this->alu=array();
	}

		public function getpuntos(){
			return $this->puntos;
		}

		public function getNombre(){
			return $this->nombre;
		}
		public function gettipoUsr(){
			return $this->tipoUsr;
		}
		public function getavatar(){
			return $this->avatar;
		}
		public function getpas(){
			return $this->pas;
		}
		public function getEmail(){
			return $this->email;
		}
	public function llena_usuario($nombre,$tipoUsr,$pas,$email,$avatar,$puntos){ //guardar datos en los atributos del usuario
		$this->nombre=$nombre;
		$this->tipoUsr=$tipoUsr;
		$this->pas=$pas;
		$this->email=$email;
		$this->avatar=$avatar;
		$this->puntos=$puntos;
	}
	public function datos_correctos(){
		$corr=true;
		if(trim($this->nombre)=="" or trim($this->email)=="" ){
			$corr=false;
		}
		else{ //comprobar que el nombre y el apellido no esten en la base de datos
			if($this->existeNombreEmail())
				$corr=false;
		}
		return $corr;
	}
	public function existeNombreEmail(){
		$existe=false;
		$sql="select * from usuarios where nombre='$this->nombre' and email='$this->email'";
		$conexion=Conexion::conectar();
		$res=$conexion->query($sql);
		if($res->fetch_assoc())
			$existe=true;
		Conexion::desconectar($conexion);
		return $existe;
	}

	public function getBD_usuario($email){
		$sql="select * from usuarios where email='$email'";
		$conexion=Conexion::conectar();
		$res=$conexion->query($sql);
		$linea=$res->fetch_assoc();
		Conexion::desconectar($conexion);
		$this->alu=$linea;
		return $this->alu;
	}


	public function setBd_usuario(){ //inserta al usuario en la bd
		$sql="insert into usuarios(nombre,tipoUsr,pas,email,avatar,puntos)
		  values('$this->nombre','$this->tipoUsr','$this->pas','$this->email','$this->avatar','$this->puntos')";
		$conexion=Conexion::conectar();
		$conexion->query($sql);
		Conexion::desconectar($conexion);
	}

	public function modifBD_usuario($email){

		$sql="update usuarios set nombre = '$this->nombre', avatar='$this->avatar', pas='$this->pas',tipoUsr='$this->tipoUsr' where email='$email'";

		$conexion=Conexion::conectar();
		$conexion->query($sql);
		Conexion::desconectar($conexion);
	}
	public function borrarBD_usuario($email){
		$sql="delete from comentarios where email='$email'";
		$conexion=Conexion::conectar();
		$conexion->query($sql);
		$sql="delete from usuarios where email='$email'";
		$conexion->query($sql);
		Conexion::desconectar($conexion);

	}
}
?>
