<?php
require_once("conexion.php");
class Acceso{
	private $nombre;
	private $email;
	private $pass;
	private $tipoUsr;
	private $puntos;
	private $avatar;

	public function get_tipoUsr(){
		return $this->tipoUsr;
	}
	public static function inicia_sesion(){
		if(!isset($_SESSION['usuario']))
			$_SESSION['usuario']="";
	}

 	public function buscaMail($mail){
 		$enc=false;
 		$sql="select * from usuarios where email='$mail'";
 		$con=Conexion::conectar();
 		$res=$con->query($sql);
 		if($res->num_rows>0)
 			$enc=true;
 		Conexion::desconectar($con);
 		return $enc;
 	}
	public function buscanombre($nombre){
		$enc=false;
		$sql="select * from usuarios where nombre='$nombre'";
		$con=Conexion::conectar();
		$res=$con->query($sql);
		if($res->num_rows>0)
			$enc=true;
		Conexion::desconectar($con);
		return $enc;
	}

	private function datosCorrectos($nombre,$email,$pass,$pass2){
		$msgErr="";
		if(trim($pass)=="" or trim($email)=="" ){
			$msgErr="algun dato está vacio";
		}
		else{
			if($pass!=$pass2){
				$msgErr="Las contraseñas no coinciden";
			}
			if($this->buscaMail($email)||$this->buscanombre($nombre)){
				$msgErr=$msgErr." El email o nombre ya existe";
			}

		}
		return $msgErr;
	}

	public function registrarUsr($nombre,$mail,$pass,$pass2,$tipoUsr){

		$msgErr=$this->datosCorrectos($nombre,$mail,$pass,$pass2);
		if($msgErr==""){
			$puntos=5;
			$avatargry="./img/avatar/gryavatar.png";
			$avatarsly="./img/avatar/slyavatar.png";
			$avatarhuf="./img/avatar/hufavatar.png";
			$avatarrav="./img/avatar/ravavatar.png";
			$avatar="";
			if($tipoUsr=='gry'){
				$avatar=$avatargry;
			}else if($tipoUsr=='sly'){
				$avatar=$avatarsly;
			}else if($tipoUsr=='rav'){
				$avatar=$avatarrav;
			}else{
				$avatar=$avatarhuf;
			}

			$sql="insert into usuarios values('$nombre','$mail','$pass','$tipoUsr','$avatar','$puntos')";
 			$con=Conexion::conectar();
 			if(!$con->query($sql))
 				$msgErr=$msgErr."Error guardando el usuario";
 			else{ //el usuario se ha guardado, creamos el acceso
				$this->nombre=$nombre;
				$this->email=$mail;
 				$this->pass=$pass;
 				$this->tipoUsr=$tipoUsr;
				$this->puntos=$puntos;
				$this->avatar=$avatar;
 			}
 			Conexion::desconectar($con);

		}
		return $msgErr;
	}

	public function validarUsr($mail,$pass,$tipo){
		$msgErr="";
		$sql="select * from usuarios where email ='$mail' and pas ='$pass'";
		$con=Conexion::conectar();
		$res=$con->query($sql);
		if ($res->num_rows>0){
			$linea=$res->fetch_assoc();
			if($linea['pas']==$pass ){ //para distinguir entre mays y mas
				//conexion correcta
				$this->email=$linea['email'];
				$this->pass=$linea['pas'];
				$this->tipoUsr=$linea['tipoUsr'];
				$this->nombre=$linea['nombre'];
				$this->puntos=$linea['puntos'];
				$this->avatar=$linea['avatar'];
				$_SESSION['usuario']=$this->tipoUsr;
				$_SESSION['nombre']=$this->nombre;
				$_SESSION['puntosuser']=$this->puntos;
				$_SESSION['email']=$this->email;
				$_SESSION['avatar']=$this->avatar;
				}

			else{
				$msgErr="Error de Acceso";
			}
		}
		else{
			$msgErr="Error de Acceso";
		}
		Conexion::desconectar($con);
		return $msgErr;

	}

	public function cambiaravatar($nombre,$avatar){
		$sql="update usuarios set avatar='$avatar' where nombre='$nombre'"  ;
		$mysqli=Conexion::conectar();
		$mysqli->query($sql);
		$mysqli->close();
	}
	public function buscaavatar($nombre){

		$sql="select avatar as taka from usuarios where nombre='$nombre'";;
		$con=Conexion::conectar();
		$res=$con->query($sql);
		if($res){
		$vec=$res->fetch_assoc();
		$cuenta=$vec["taka"];
	}
	Conexion::desconectar($con);
	return $cuenta;
}
public function cambiarpass($nombre,$pas){
	$sql="update usuarios set pas='$pas' where nombre='$nombre'"  ;
	$mysqli=Conexion::conectar();
	$mysqli->query($sql);
	$mysqli->close();
}

}


?>
