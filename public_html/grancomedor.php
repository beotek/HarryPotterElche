<?php
require_once("clases/puntos.php");
require_once("clases/usuarios.php");
require_once("clases/comentario.php");
$acc=new Acceso();
if(isset($_GET['inicio']))
    $inicio=$_GET['inicio'];
    if(isset($_SESSION['nombre'])){ //estoy conectado
      $autor=$_SESSION['nombre'];
      if(isset($_SESSION['email']))
      $email=$_SESSION['email'];
      $avatar=$acc->buscaavatar($_SESSION['nombre']);
}
$puntoscasas=new Puntos();
$usuarios=new Usuarios();
$texto="";
    if (isset($_POST['publicar'])){
      $texto = htmlspecialchars(stripslashes($_POST['texto']));
      $puntoscasas->sumarpuntos(1,$_SESSION['nombre']);
      if($msgErr==""){
        $fecha=date("m/d/Y",time()); //devuelve la fecha de hoy
        $comentario= new Comentario($autor,$email,$fecha,$texto,$avatar);
        //echo $comentario->to_string();
        $comentario->guardar_en_BD();
      }
      else{ //errores
      echo "$msgErr";
      }
    }

?>
<div>
  <section id=cabecerahg>
  <h1>Gran Comedor</h1>
  </section>
  <nav class="arbol">Usted está en: <a href="index.php">Inicio</a> / <a href="<?php echo $_SERVER['PHP_SELF'] ?>?p=grancomedor" <?php if($cssMenu=="grancomedor"){?>class="current"<?php } ?>> Gran comedor</a></li> </nav>
<div>
  <div class="container pt-3">
      <div class="jumbotron">
        <div class="row">
          <div class="col-lg-12 relojarenacont">
            <img src="./img/reloj.png" alt="relojarena" class=relojarena>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 pt-3">
            <div class="contcasa contgry">
              <div class="black-capa">
                <h1>Gryffindor</h1>
                  <h2>
                  <?php echo " ". $puntoscasas->getpuntosgry() . " puntos " ?>

                </h2>
                <h3>
                  <?php echo " ". $usuarios->getusrgry() . " usuario/s " ?>
                </h3>

              </div>
            </div>
            </div>
          <div class="col-lg-6 pt-3">
            <div class="contcasa contsly">
                <div class="black-capa">
                  <h1>Slytherin</h1>
                    <h2>
                    <?php echo " ". $puntoscasas->getpuntossly() . " puntos " ?>

                  </h2>
                  <h3>
                    <?php echo " ". $usuarios->getusrsly() . " usuario/s " ?>
                  </h3>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 pt-3">
            <div class="contcasa contrav">
              <div class="black-capa">
                <h1>Ravenclaw</h1>
                  <h2>
                  <?php echo " ". $puntoscasas->getpuntosrav() . " puntos " ?>

                </h2>
                <h3>
                  <?php echo " ". $usuarios->getusrrav() . " usuario/s " ?>
                </h3>

              </div>
            </div>
          </div>
          <div class="col-lg-6 pt-3">
            <div class="contcasa conthuf">
              <div class="black-capa">

                <h1>Hufflepuff</h1>
                  <h2>
                  <?php echo " ". $puntoscasas->getpuntoshuf() . " puntos " ?>

                </h2>
                <h2>
                  <?php echo " ". $usuarios->getusrhuf() . " usuario/s " ?>
                </h2>

              </div>
            </div>
          </div>
        </div>
    </div>



  <div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main chat">
          <div class="jumbotron">
            <div class="comentarea">

          <h2>COMENTARIOS</h2>
          <form action="index.php?p=grancomedor" method="post">
          Tu comentario:<br>
          <textarea cols="55" rows="4" name="texto" <?php if(!isset($_SESSION['nombre'])) echo "readonly='readonly'" ?>><?php echo $texto ?></textarea><br>
          <?php  if(isset($_SESSION['nombre'])){ ?>
          	<input class=button-naranja type="submit" value="Publicar" name="publicar">
          <?php } ?>
          </form>

        </div>

          <?php
          	if(isset($_SESSION['nombre']))
          		Comentario::muestra_comentarios();
          ?>

          </div>

        </div><!-- /.blog-main -->

        <div class="col-sm-4 blog-sidebar toppuntos">
          <div class="sidebar-module sidebar-module-inset jumbotron">
            <h5>TOP 10</h5>
            <?php echo " ". $usuarios->top10() . " " ?>
          </div>

        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div>

</div>
</div>
