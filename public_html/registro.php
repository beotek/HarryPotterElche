<div id=registro>
  <?php  if(isset($_POST['enviarRegistro'])){
      $nombre=$_POST['nombre'];
      $mail=$_POST['email'];
      $pass=$_POST['pass'];
      $pass2=$_POST['pass2'];
      $tipoUsr=$_POST['casa'];
      $acceso=new Acceso();
      $msgErr=$acceso->registrarUsr($nombre,$mail,$pass,$pass2,$tipoUsr);
      if($msgErr==""){ //el usuario se ha registrado correctamente
        $pagina="inicio";
      }
    }
      ?>
  <form class="registro" action="<?php echo $_SERVER['PHP_SELF'] ?>?p=registro" method="POST">
<div class="sign-up-title">
<?php  if(isset($_POST['enviarRegistro']) && $msgErr==""){ ?>
Registro Completado
 <?php }else{ ?>
Registro
<?php } ?>

</div>
<?php if(isset($_POST['enviarRegistro']) && $msgErr==""){ ?>
  <div class="centrado">
    <?php if($_POST['casa']=='sly'){ ?>
  <h2>  Tu casa es Slytherin </h2>
    <?php } ?>
  <?php if($_POST['casa']=='rav'){ ?>
    <h2>  Tu casa es Ravenclaw </h2>
    <?php } ?>
    <?php if($_POST['casa']=='huf'){ ?>
  <h2>  Tu casa es Hufflepuff </h2>
    <?php } ?>
  <?php if($_POST['casa']=='gry'){ ?>
    <h2>  Tu casa es Gryffindor </h2>
    <?php } ?>

<a href="index.php?p=iniciarsesion"><button class="button-naranja" type="button" name="button">Acceder</button></a>
  </div>
    <?php  }else{ ?>
<input class="sign-up-input user" type="text" name="nombre" onblur="comprobar(this)" maxlength="20" value="" placeholder="Nombre usuario">
<input class="sign-up-input user" type="email" name="email" onblur="comprobar(this)" maxlength="40" value="" placeholder="E-mail">
<input class="sign-up-input pass" type="password" name="pass" onblur="comprobar(this)" maxlength="20" value="" placeholder="Contraseña">
<input class="sign-up-input pass" type="password" name="pass2" onblur="comprobar(this)" maxlength="20" value="" placeholder="Repetir Contraseña">

  <span id="text" class=msgErr ></span>
  <?php if ($msgErr!="")
      echo'<div id="msgErr" class=msgErr >'. $msgErr. '</div>'?>
<h5>¿Qué cualidad Valoras más?</h5>

 <div class="elegircasashogwarts">
  <input type="radio" id="radio1" name="casa" value="huf" checked>
  <label for="radio1">Bondad</label>

  <input type="radio" id="radio2" name="casa" value="gry">
  <label for="radio2">Valentia</label>

  <input type="radio" id="radio3" name="casa" value="rav">
  <label for="radio3">Inteligencia</label>

  <input type="radio" id="radio4" name="casa" value="sly">
  <label for="radio4">Astucia</label>
</div>

    <a class="naranja" href="index.php?p=iniciarsesion">¿Ya estás registrado? Iniciar Sesión</a>

<div class="botoncentrado">
<input type="submit" name="enviarRegistro" value="Enviar" class="button-naranja">
</div>
  </form>
<?php } ?>
</div>
