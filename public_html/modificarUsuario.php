<div id=iniciarsesion>

<?php
require("clases/usuario.php");
$msgError="";
$msg="";
$email = "";
$nombre = "";
$tipoUsr = "";
$pas = "";
$avatar = "";
$puntos ="";

$email=$_GET['a'];
$usuario=new Usuario();
$vecUsuario=$usuario->getBD_usuario($email);
$nombre = $vecUsuario["nombre"];
$tipoUsr = $vecUsuario["tipoUsr"];
$pas = $vecUsuario["pas"];
$puntos = $vecUsuario["puntos"];
$avatar = $vecUsuario['avatar'];

if(isset($_POST['enviar'])){ /*ya se a pulsado el boton de modificar*/

    $nombre = $_POST['nombre'];
    $tipoUsr = $_POST['tipoUsr'];
    $pas = $_POST['pas'];
    $puntos = $_POST['puntos'];
    $avatar = $_POST['avatar'];

	if(trim($nombre)!="" && trim($pas)!=""){
        $usuario->llena_usuario($nombre,$tipoUsr,$pas,$email,$avatar,$puntos);
        $usuario->modifBD_usuario($email);

		$msg="usuario MODIFICADO CORRECTAMENTE";
	}
	else
		$msgError="MODIFICAR usuarioS - FALTAN DATOS POR RELLENAR";
}

?>



<form  class=registro action="index.php?p=modiuser&a=<?php echo $email ?>" method="POST" enctype="multipart/form-data" name="formModifusuario">
<div class="sign-up-title">
  Detalles usuario a Modificar
</div>
<div class="msgErr">
  <?php echo "" . $msgErr . "" . $msg .""; ?>
</div>
<h5>Usuario <?php echo "" . $email . " "; ?></h5>
    <table class="tabla centrado">
        <tr>
            <td class="tabla"><label>Nombre:</label></td>
            <td><input class="sign-up-input" type="text" name="nombre" onblur="comprobar(this)" maxlength="20" <?php if(isset($nombre)){ echo "value='$nombre'"; } ?> /></td>
        </tr>
        <tr>
            <td class="tabla"><label>Casa:</label></td>
            <td><input class="sign-up-input" type="text" name="tipoUsr" onblur="comprobar(this)" maxlength="3" <?php if(isset($tipoUsr)){ echo "value='$tipoUsr'"; } ?> /></td>
        </tr>
        <tr>
            <td class="tabla"><label>Puntos:</label></td>
            <td><input class="sign-up-input" type="number" name="puntos" maxlength="9" size="40" onblur="comprobar(this)" <?php if(isset($puntos)){ echo "value='$puntos'"; } ?> /></td>
        </tr>
        <tr>
            <td class="tabla"><label>avatar:</label></td>
            <td><input class="sign-up-input" type="text" name="avatar" onblur="comprobar(this)" maxlength="200" <?php if(isset($avatar)){ echo "value='$avatar'"; } ?> /></td>
        </tr>
        <tr>
            <td class="tabla"><label>Contraseña:</label></td>
            <td><input class="sign-up-input" type="text" name="pas" onblur="comprobar(this)" maxlength="20" <?php if(isset($pas)){ echo "value='$pas'"; } ?> /></td>
        </tr>

		<tr>
			<td class="boton" colspan="2">
			<input type="submit" value="Modificar" class="button-naranja" name="enviar" />
			</td>
		</tr>
	</table>

  <a class="naranja" href="index.php?p=sala<?php echo $_SESSION['usuario'] ?>">Volver</a>



</form>

</div>
