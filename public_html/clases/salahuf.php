<?php
require_once("clases/puntos.php");
require_once("clases/usuarios.php");
require_once("clases/usuario.php");
require_once("clases/comentario.php");

$puntoscasas=new Puntos();
$usuarios=new Usuarios();
$acc=new Acceso();
$comentario= new Comentario();
$usr=new Usuario();
$usuario=$usr->getBD_usuario($_SESSION['email']);
$puntosusuario=$usuario['puntos'];
if (isset($_SESSION['email'])&&$_SESSION['usuario']=='huf'){
?>

<div>
  <section id=cabecerahuf>
  <h1>Sala común Hufflepuff</h1>
  </section>
  <nav class="arbol">Usted está en: <a href="index.php">Inicio</a> / <a href="<?php echo $_SERVER['PHP_SELF'] ?>?p=salahuf" <?php if($cssMenu=="salahuf"){?>class="current"<?php } ?>>Hufflepuff</a></li> </nav>
<div>


  <div class="container p-3">

      <div class="row">

        <div class="col-sm-8 blog-main fichausr">
          <div class="jumbotron">
            <div class="fichauser">


              <div class='topusr'>
                <img src=" <?php echo "".  $acc->buscaavatar($_SESSION['nombre'])  ."" ?>" class='avatar'>
                 <div class='nombrepuntos'> <h2><spam class=text-color><?php echo "". $_SESSION['nombre'] .""  ?> </spam></h2>
                <p><?php echo "". $_SESSION['email'] .""  ?> <br><?php echo "". $puntosusuario .""  ?>  puntos</p> </div>
            </div>
          </div>
          </div>

      <div class="row">
            <div class="col-lg-4">
              <img class="rounded-circle" src="./img/fenix.jpeg" alt="Generic placeholder image" width="140" height="140">
              <h2>Cuidado de criaturas</h2>
              <p><a class="btn btn-secondary" href="index.php?p=test1" role="button">Hacer test »</a></p>
            </div>
            <div class="col-lg-4">
              <img class="rounded-circle" src="./img/historia.jpg" alt="Generic placeholder image" width="140" height="140">
              <h2>Historia de la magia.</h2>
              <p><a class="btn btn-secondary" href="index.php?p=test2" role="button">Hacer test »</a></p>
            </div>

        <div class="col-lg-4">
          <img class="rounded-circle" src="./img/transformaciones.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>Trans-<br>formaciones</h2>
          <p><a class="btn btn-secondary" href="index.php?p=test3" role="button">Hacer test »</a></p>
        </div>
      </div>
      <div class="row">
            <div class="col-lg-4">
              <img class="rounded-circle" src="./img/quidditch.jpeg" alt="Generic placeholder image" width="140" height="140">
              <h2>Quidditch</h2>
              <p><a class="btn btn-secondary" href="index.php?p=test4" role="button">Hacer test »</a></p>
            </div>
            <div class="col-lg-4">
          <img class="rounded-circle" src="./img/encantamientos.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>Encantamientos</h2>
          <p><a class="btn btn-secondary" href="index.php?p=test5" role="button">Hacer test »</a></p>
        </div>
        <div class="col-lg-4">
      <img class="rounded-circle" src="./img/pociones.jpg" alt="Generic placeholder image" width="140" height="140">
      <h2>Pociones</h2>
      <p><a class="btn btn-secondary" href="index.php?p=test6" role="button">Hacer test »</a></p>
    </div>
      </div>
        </div><!-- /.blog-main -->

        <div class="col-sm-4 blog-sidebar toppuntos">
          <div class="sidebar-module sidebar-module-inset jumbotron">
            <h5>TOP 3</h5>
            <?php echo " ". $usuarios->top3huf() . " " ?>
          </div>
          <div class="sidebar-module sidebar-module-inset jumbotron cambiaravatar">
            <h5>CAMBIAR AVATAR</h5>
            <hr class="featurette-divider">
            <?PHP
            if(isset($_POST['enviar'])){
            	if (is_uploaded_file ($_FILES['img']['tmp_name'])){
            		$tam=getimagesize($_FILES['img']['tmp_name']);
            		$tiposValidos=array("image/jpeg","image/png","image/gif");
            		if(in_array($_FILES['img']['type'],$tiposValidos)){
            			if($tam[0]<=600 and $tam[1]<=600){
                    $ruta="./img/avatar/avatarusers/".time().$_FILES['img']['name'];
            				move_uploaded_file ($_FILES['img']['tmp_name'],"./img/avatar/avatarusers/".time().$_FILES['img']['name']);
            				echo " <form> imagen: ".time().$_FILES['img']['name']. " de ".$tam[0]."x".$tam[1]."px subida correctamente </form>  <a href='index.php?p=salahuf'><div class='centrado'><button class='button-naranja' type='button' name='button'>Actualizar</button></a></div";
                    $acc->cambiaravatar($_SESSION['nombre'],$ruta);
                    $comentario->cambiaravatarencoments($_SESSION['email'],$ruta);
                  }
            			else
            				echo "No se puede subir, sobrepasa los 600x600 px";
            		}
            		else
            			echo "Tipo de fichero no valido";
            	}
            	else{
            		echo "<h1>ERROR AL SUBIR {$_FILES['img']['name']}/h1><br/>";
            	}
            }
            	else{
            ?>
            	<form action="index.php?p=salahuf" method="POST" enctype="multipart/form-data">
            		<p>
            			Fichero:<br> <input type="file" class="archivo" name="img" /><br/>
            			<div class="botoncentrado">
            			<input  class="button-naranja" type="submit" value="ENVIAR" name="enviar">
                  </div>
            		</p>
            	</form>
            <?php
            	}
            ?>
          </div>
          <div class="sidebar-module sidebar-module-inset jumbotron cambiaravatar">
            <h5>CAMBIAR CONTRASEÑA</h5>
            <hr class="featurette-divider">
            <?php if(isset($_POST['enviarpas'])){
              if($_POST['pas']){
              $acc->cambiarpass($_SESSION['nombre'],$_POST['pas']);
              echo "<form>Contraseña cambiada correctamente </form>";
            }else{
              echo "<form>Error</form>";
            }
          }else{?>
            <form action="index.php?p=salahuf" method="POST" enctype="multipart/form-data">
              <p>
                Nueva Contraseña:<br> <input type="password" name="pas" class="sign-up-input" onblur="comprobar(this);" maxlength="20" /><br/>
                <div class="botoncentrado">
                <input  class="button-naranja" type="submit" value="ENVIAR" name="enviarpas">
                </div>
              </p>
            </form>
            <?php } ?>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div>

</div>
<?php }else { ?>

  <div class="notpass">
  <section class="passhuf">

  <h1>¿Contraseña?</h1>
  <p>No tienes permiso para entrar aqui</p>
  <a href="index.php?p=grancomedor"> <button type="button" name="button" class=button-naranja>Volver</button></a>
  </section>
  </div>

<?php

} ?>
