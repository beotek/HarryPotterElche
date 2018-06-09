
<div id=iniciarsesion>
  <?php
  if(isset($_POST['enviarAcceso'])){
    $mail=$_POST['email'];
    $pass=$_POST['pass'];
    $tipo="";
    $acceso=new Acceso();
    $msgErr=$acceso->validarUsr($mail,$pass,$tipo);

  }
  ?>
  <form class="registro" action="index.php?p=iniciarsesion" method="POST">
<div class="sign-up-title">
  <?php if(isset($_POST['enviarAcceso']) && $msgErr==""){ ?>
      Inicio Correcto
    <?php  }else{ ?>
      Iniciar Sesión <?php }  ?>
</div>
  <?php if(isset($_POST['enviarAcceso']) && $msgErr==""){ ?>
    <div class="centrado">
 <a href="index.php?p=grancomedor"><button class="button-naranja" type="button" name="button">Acceder</button></a>
    </div>
      <?php  }else{ ?>
<input class="sign-up-input user" type="email" maxlength="40" onblur="comprobar(this)" name="email" value="" placeholder="E-mail">
<input class="sign-up-input pass" type="password" maxlength="20" onblur="comprobar(this)" name="pass" value="" placeholder="Contraseña">
<?php if ($msgErr!="")
    echo'<div id="msgErr" class=msgErr >'. $msgErr. '</div>'?>
<a class="naranja" href="index.php?p=registro">¿No tienes usuario? Registrate</a>
<div class="botoncentrado">
<input type="submit" value="Enviar" name="enviarAcceso" class="button-naranja">
</div>
<?php }  ?>
  </form>

</div>
