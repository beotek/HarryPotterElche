<?php
require_once("conexion.php");

class Usuarios{
	private $usuarios;

	public function __construct(){
		$this->usuarioss=array();
	}

	public function getusrgry(){ //Devuelve cuantos usuarios hay

			$sql="select count(*) as usuarios from usuarios where tipoUsr='gry'";
		$cuenta=0;
		$con=Conexion::conectar();
		$res=$con->query($sql);
		if($res){
			$vec=$res->fetch_assoc();
			$cuenta=$vec["usuarios"];
		}
		Conexion::desconectar($con);
		return $cuenta;
	}

	public function getusrsly(){ //Devuelve cuantos usuarios hay

			$sql="select count(*) as usuarios from usuarios where tipoUsr='sly'";
		$cuenta=0;
		$con=Conexion::conectar();
		$res=$con->query($sql);
		if($res){
			$vec=$res->fetch_assoc();
			$cuenta=$vec["usuarios"];
		}
		Conexion::desconectar($con);
		return $cuenta;
	}
	public function getusrhuf(){ //Devuelve cuantos usuarios hay

			$sql="select count(*) as usuarios from usuarios where tipoUsr='huf'";
		$cuenta=0;
		$con=Conexion::conectar();
		$res=$con->query($sql);
		if($res){
			$vec=$res->fetch_assoc();
			$cuenta=$vec["usuarios"];
		}
		Conexion::desconectar($con);
		return $cuenta;
	}
	public function getusrrav(){ //Devuelve cuantos usuarios hay

			$sql="select count(*) as usuarios from usuarios where tipoUsr='rav'";
		$cuenta=0;
		$con=Conexion::conectar();
		$res=$con->query($sql);
		if($res){
			$vec=$res->fetch_assoc();
			$cuenta=$vec["usuarios"];
		}
		Conexion::desconectar($con);
		return $cuenta;
	}

	public function top10(){

		$sql="SELECT * FROM usuarios ORDER BY puntos DESC LIMIT 0, 10";
		//echo $sql;
		$mysqli=Conexion::conectar();
		$res=$mysqli->query($sql);
		$cont=1;
		while($fila = $res->fetch_assoc()){
			$nombre=$fila['nombre'];
			$puntos=$fila['puntos'];
			$avatar=$fila['avatar'];
			$avatarimg="<img src=\"$avatar\" class='avatarimg'>";
			echo "<div class=titulocoment><h6>" .$cont. " º PUESTO </h6></div><div class='topusr'>" . $avatarimg . "<div class='nombrepuntos'> <h4>" . $nombre . "</h4> ". $puntos . " puntos </div> </div>";
			$cont++;
	}
}
public function top3gry(){

	$sql="SELECT * FROM usuarios WHERE tipoUsr='gry' ORDER BY puntos DESC LIMIT 0, 3";
	//echo $sql;
	$mysqli=Conexion::conectar();
	$res=$mysqli->query($sql);
	$cont=1;
	while($fila = $res->fetch_assoc()){
		$nombre=$fila['nombre'];
		$puntos=$fila['puntos'];
		$avatar=$fila['avatar'];
		$avatarimg="<img src=\"$avatar\" class='avatarimg'>";
		echo "<div class=titulocoment><h6>" .$cont. " º PUESTO </h6></div><div class='topusr'>" . $avatarimg . "<div class='nombrepuntos'> <h4>" . $nombre . "</h4> ". $puntos . " puntos </div> </div>";
		$cont++;
}
}
public function top3huf(){

	$sql="SELECT * FROM usuarios WHERE tipoUsr='huf' ORDER BY puntos DESC LIMIT 0, 3";
	//echo $sql;
	$mysqli=Conexion::conectar();
	$res=$mysqli->query($sql);
	$cont=1;
	while($fila = $res->fetch_assoc()){
		$nombre=$fila['nombre'];
		$puntos=$fila['puntos'];
		$avatar=$fila['avatar'];
		$avatarimg="<img src=\"$avatar\" class='avatarimg'>";
		echo "<div class=titulocoment><h6>" .$cont. " º PUESTO </h6></div><div class='topusr'>" . $avatarimg . "<div class='nombrepuntos'> <h4>" . $nombre . "</h4> ". $puntos . " puntos </div> </div>";
		$cont++;
}
}
public function top3sly(){

	$sql="SELECT * FROM usuarios WHERE tipoUsr='sly' ORDER BY puntos DESC LIMIT 0, 3";
	//echo $sql;
	$mysqli=Conexion::conectar();
	$res=$mysqli->query($sql);
	$cont=1;
	while($fila = $res->fetch_assoc()){
		$nombre=$fila['nombre'];
		$puntos=$fila['puntos'];
		$avatar=$fila['avatar'];
		$avatarimg="<img src=\"$avatar\" class='avatarimg'>";
		echo "<div class=titulocoment><h6>" .$cont. " º PUESTO </h6></div><div class='topusr'>" . $avatarimg . "<div class='nombrepuntos'> <h4>" . $nombre . "</h4> ". $puntos . " puntos </div> </div>";
		$cont++;
}
}
public function top3rav(){

	$sql="SELECT * FROM usuarios WHERE tipoUsr='rav' ORDER BY puntos DESC LIMIT 0, 3";
	//echo $sql;
	$mysqli=Conexion::conectar();
	$res=$mysqli->query($sql);
	$cont=1;
	while($fila = $res->fetch_assoc()){
		$nombre=$fila['nombre'];
		$puntos=$fila['puntos'];
		$avatar=$fila['avatar'];
		$avatarimg="<img src=\"$avatar\" class='avatarimg'>";
		echo "<div class=titulocoment><h6>" .$cont. " º PUESTO </h6></div><div class='topusr'>" . $avatarimg . "<div class='nombrepuntos'> <h4>" . $nombre . "</h4> ". $puntos . " puntos </div> </div>";
		$cont++;
}
}


public function get_cuantos_usuarioss(){ //devuelve cuantos usuarios hay en la base de datos
	$sql="select count(*)  as cuenta from usuarios";
	$cuenta=0;
	$con=Conexion::conectar();
	$res=$con->query($sql);
	if($res){
		$vec=$res->fetch_assoc();
		$cuenta=$vec["cuenta"];
	}
	Conexion::desconectar($con);
	return $cuenta;
}

public function getBD_usuarioss(){ //todos los usuarios de la base de datos
	$sql="select * from usuarios";
	$con=Conexion::conectar();
	$res=$con->query($sql);
	$cont=0;
	$vec=array();
	while($linea=$res->fetch_assoc()){
		$vec[$cont]=$linea; //seria como $vec[]=$linea
		$cont++;
	}
	Conexion::desconectar($con);
	$this->usuarioss=$vec;
	return $this->usuarioss;
}

public function get_usuarioss_paginado($inicio,$cuantos){ //usuarios de una página
	$sql="select * from usuarios limit $inicio,$cuantos";
	$con=Conexion::conectar();
	$res=$con->query($sql);
	$cont=0;
	$vec=array();
	while($linea=$res->fetch_assoc()){
		$vec[$cont]=$linea; //seria como $vec[]=$linea
		$cont++;
	}
	Conexion::desconectar($con);
	$this->usuarioss=$vec;
	return $this->usuarioss;
}


}
?>
