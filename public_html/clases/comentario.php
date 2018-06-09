<?php
require_once("conexion.php");
Class Comentario{
	private $autor;
	private $email;
	private $fecha;
	private $texto;
	private $avatar;

	public function __Construct($autor="",$email="",$fecha="",$texto="",$avatar=""){
		$this->autor=$autor;
		$this->email=$email;
		$this->fecha=$fecha;
		$this->texto=$texto;
		$this->avatar=$avatar;
	}
	public function set_autor($autor){
		$this->autor=$autor;
	}
	public function set_email($email){
		$this->email=$email;
	}
	public function set_fecha($fecha){
		$this->fecha=$fecha;
	}
	public function set_texto($texto){
			$this->texto=$texto;
	}
	public function set_avatar($avatar){
			$this->avatar=$avatar;
	}
	public function get_autor(){
		return $this->autor;
	}
	public function get_email(){
		return $this->email;
	}
	public function get_fecha(){
		return $this->fecha;
	}
	public function get_texto(){
		return $this->texto;
	}
	public function get_avatar(){
		return $this->avatar;
	}

	public function to_string(){
		$mailto="<a href=\"mailto:$this->email\">$this->email</a>";
		$avatarimg="<img src=\"$this->avatar\" class='avatarimg'>";
		$cadena="<div class='comentario'><div class='titulocoment'><b>$this->autor</b> ($mailto) escribió en <i>$this->fecha</i>:</div> <div class='zonatext'> $avatarimg <p> $this->texto </p></div></div>";
		return $cadena;
	}

	public function guardar_en_BD(){
		$fecha=date("Y-m-d",strtotime($this->fecha));
		$sql="insert into comentarios(email,fecha,texto,avatar) values('$this->email','$fecha','$this->texto','$this->avatar')";
		//echo $sql;
		$mysqli=Conexion::conectar();
		$mysqli->query($sql);
		$mysqli->close();

	}
	public static function muestra_comentarios(){
		$sql="select comentarios.*, usuarios.nombre  from comentarios,usuarios where comentarios.email=usuarios.email order by id_comentario DESC";
		//echo $sql;
		$mysqli=Conexion::conectar();
		$res=$mysqli->query($sql);
		while($fila = $res->fetch_assoc()){
			$comentario=new Comentario($fila['nombre'],$fila['email'],$fila['fecha'],$fila['texto'],$fila['avatar']);
			echo $comentario->to_string();
		}
		$res->free();
		$mysqli->close();

	}

	public function cambiaravatarencoments($email,$avatar){
		$sql="update comentarios set avatar='$avatar' where email='$email'"  ;
		$mysqli=Conexion::conectar();
		$mysqli->query($sql);
		$mysqli->close();
	}
}

?>
