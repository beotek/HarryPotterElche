<?php
require_once("clases/usuarios.php");
require_once("clases/usuario.php");
$msgError="";
$msg="";
$inicio=0;
$cuantos=5;
if(isset($_GET['inicio']))
    $inicio=$_GET['inicio'];

$alumnos=new Usuarios();
$nfilasTotales=$alumnos->get_cuantos_usuarioss();
$datos=$alumnos->get_usuarioss_paginado($inicio,$cuantos);
if (isset($_SESSION['email'])&& $_SESSION['usuario']=='pre'){
?>

<div>
  <section id=cabecerapre>
  <h1>Sala de Prefectos</h1>
  </section>
  <nav class="arbol">Usted está en: <a href="index.php">Inicio</a> / <a href="<?php echo $_SERVER['PHP_SELF'] ?>?p=salapre" <?php if($cssMenu=="salapre"){?>class="current"<?php } ?>>Administración</a></li> </nav>
<div>
  <div class="container p-3 admin">

      <div class="row">

        <div class="col-sm-8 blog-div">

  <?php

$nfilas = sizeof($datos);
if ($nfilas > 0){
         echo '<div class=jumbotron>';
         echo '<table class=" tablalista">';
         echo '<tr class="tittablausr">';
         echo '<th> <span class="orangetitle">NOMBRE</span></th>';
         echo '<th><span class="orangetitle">CASA</span></th>';
         echo '<th><span class="orangetitle">PUNTOS</span></th>';
         echo '<th><span class="orangetitle"></span></th>';
         echo '<th><span class="orangetitle"></span></th>';
         echo '</tr>';
         for ($i=0; $i<$nfilas; $i++)
         {
            echo '<tr>';
            echo '<td><span class="contentText">' . $datos[$i]['nombre'] . '</span></td>';
            echo '<td><span class="contentText">' . $datos[$i]['tipoUsr'] . '</span></td>';
            echo '<td><span class="contentText">' . $datos[$i]['puntos'] . '</span></td>';
            echo '<td><span class="contentText"><a class=naranja href="index.php?p=modiuser&a='.$datos[$i]['email'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span></td>';
            echo '<td><span class="contentText"><a class=naranja href="index.php?p=borraruser&a='.$datos[$i]['email'].'"><i class="fa fa-trash" aria-hidden="true"></i></a></span></td>';
			echo '</tr>';

        }

        echo '</table>';

        if(($inicio-$cuantos)>=0){
            echo '<a class=naranja href="index.php?p=salapre&inicio='.($inicio-$cuantos).'"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> </a>';
        }
        if(($inicio+$cuantos)<$nfilasTotales){
            echo '<a class=naranja href="index.php?p=salapre&inicio='.($inicio+$cuantos).'" alt="siguiente"> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a>';
        }
        echo   '  <br> <a href="listapdf.php" class="botoncentrado naranja" ><button class=button-naranja>LISTA PDF</button></a>';
        echo '</div>';
}


?>
</div>
<div class="col-sm-4 blog-sidebar">
  <div class="sidebar-module sidebar-module-inset jumbotron">
    <?php


    if(isset($_POST['enviarnewusr'])){
    	$usuario=new usuario();
    	$usuario->llena_usuario($_POST['nombre'],$_POST['tipoUsr'],$_POST['pas'],$_POST['email'],$_POST['avatar'],$_POST['puntos']);
        if($usuario->datos_correctos()){
            $usuario->setBd_usuario();
            echo "USUARIO DADO DE ALTA";
        }
        else
            echo "DATOS USUARIOS NO VALIDOS";
    }
    else{
    ?>

    <form action="index.php?p=salapre" method="POST" enctype="multipart/form-data" name="formAltausuario">
        <h5>Alta usuario</h5>
        <table class="tabla">
            <tr>
                <td class="tabla"><label>Nombre:</label></td>

            </tr>
            <tr>
              <td><input type="text" class="sign-up-input" onblur="comprobar(this);" name="nombre" maxlength="10" size="40" <?php if(isset($usuario)){ echo "value='$usuario->getNombre()'"; } ?> /></td>
            </tr>
            <tr>
                <td class="tabla"><label>Tipo Usuario</label></td>
            </tr>
            <tr>
              <td>
              <select name=tipoUsr>
                <option value="gry">Gryffindor</option>
                <option value="huf">Hufflepuff</option>
                <option value="rav">Ravenclaw</option>
                <option value="sly">Slytherin</option>
                <option value="pre">Prefecto</option>
              </select>
              </td>
            </tr>
            <tr>
                <td class="tabla"><label>Avatar:</label></td>
            </tr>
            <tr>
              <td>
                <select name=avatar>
                  <option value="./img/avatar/gryavatar.png">Gryffindor</option>
                  <option value="./img/avatar/hufavatar.png">Hufflepuff</option>
                  <option value="./img/avatar/ravavatar.png">Ravenclaw</option>
                  <option value="./img/avatar/slyavatar.png">Slytherin</option>
                  <option value="./img/avatar/prefavatar.png">Prefecto</option>
                </select>
              </td>
            </tr>
            <tr>
                <td class="tabla"><label>e-mail:</label></td>
            </tr>
            <tr>
              <td><input type="email" class="sign-up-input" onblur="comprobar(this);" name="email" size="40" maxlength="40" <?php if(isset($usuario)){ echo "value='$usuario->getEmail()'"; } ?> /></td>

            </tr>
    				<tr>
    						<td class="tabla"><label>Contraseña:</label></td>
    				</tr>
            <tr>
              <td><input type="password" class="sign-up-input" onblur="comprobar(this);" name="pas" size="40" maxlength="40" <?php if(isset($usuario)){ echo "value='$usuario->getpas()'"; } ?> /></td>

            </tr>
    				<tr>
    						<td class="tabla"><label>Puntos:</label></td>
    				</tr>
            <tr>
              <td><input type="number" class="sign-up-input" onblur="comprobar(this);" name="puntos" size="40" maxlength="40" <?php if(isset($usuario)){ echo "value='$usuario->getpuntos()'"; } ?> /></td>

            </tr>
            <tr>

    		</tr>
    	</table>
      <div class="centrado m-3 m-r-1">

      <input type="submit" class=button-naranja value="Alta" name="enviarnewusr" />

    </div>
    </form>
    <?php
    }

    ?>

  </div>

</div>

</div>
<?php
  }else{
    ?>
    <div class="notpass">
    <section class="passpre">

    <h1>¿Contraseña?</h1>

    <p>No tienes permiso para entrar aqui</p>
    <a href="index.php?p=grancomedor"> <button type="button" name="button" class=button-naranja>Volver</button></a>
    </section>
    </div>

<?php
  }
?>
