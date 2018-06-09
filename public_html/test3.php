  <?php
  require_once("clases/puntos.php");
    require_once("clases/tests.php");
    $nombretest='transformaciones';
    $puntoscasas=new Puntos();
    $test=new Tests();
    $cont=0;
    $hecho3=$test->gettesthecho($_SESSION['email'],$nombretest);

   if(isset($_POST['enviartest'])){
     if(isset($_POST['p1']))
      if($_POST['p1']=='ok'){
      $cont=$cont+1;
      }
     if(isset($_POST['p2']))
      if($_POST['p2']=='ok'){
      $cont=$cont+1;
      }

    if(isset($_POST['p3']))
      if($_POST['p3']=='ok'){
        $cont=$cont+1;
      }
    if(isset($_POST['p4']))
      if($_POST['p4']=='ok'){
        $cont=$cont+1;
        }
    if(isset($_POST['p5']))
      if($_POST['p5']=='ok'){
        $cont=$cont+1;
        }
      $test->set_testhecho($nombretest,$_SESSION['email']);
      $puntoscasas->sumarpuntos($cont,$_SESSION['nombre']);
  }

    ?>

<div id=iniciarsesion>
  <form class="registro" action="index.php?p=test3" method="POST">
<div class="sign-up-title">
Transformaciones
</div>
<?php if($hecho3==0){ ?>
    <?php if(!isset($_POST['enviartest'])){ ?>
¿Cómo se le llama a un mago que se transforma en animal?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-1" name="p1" value="err">
 <label for="radio1-1">Hombre lobo</label>

 <input type="radio" id="radio2-1" name="p1" value="err">
 <label for="radio2-1">Humanimal</label>

 <input type="radio" id="radio3-1" name="p1" value="err">
 <label for="radio3-1">Metamorfomago</label>

 <input type="radio" id="radio4-1" name="p1" value="ok">
 <label for="radio4-1">Animago</label>
</div>

¿Qué hechizo transforma pequeños objetos en pájaros?<br>
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-2" name="p2" value="err" >
 <label for="radio1-2">Dededne</label>

 <input type="radio" id="radio2-2" name="p2" value="ok">
 <label for="radio2-2">Avifors</label>

 <input type="radio" id="radio3-2" name="p2" value="err">
 <label for="radio3-2">Birdfers</label>

 <input type="radio" id="radio4-2" name="p2" value="err">
 <label for="radio4-2">Accio</label>
</div>
¿Qué hace el hechizo Portus?<br>
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-3" name="p3" value="err" >
 <label for="radio1-3">Tranforma un objeto en una puerta</label>

 <input type="radio" id="radio2-3" name="p3" value="err">
 <label for="radio2-3">Abre una puerta imposible de abrir</label>

 <input type="radio" id="radio3-3" name="p3" value="ok">
 <label for="radio3-3">Transforma un objeto en un traslador</label>

 <input type="radio" id="radio4-3" name="p3" value="err">
 <label for="radio4-3">Transforma una puerta en un objeto</label>
</div>

Hechizo que transforma animales en copas
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-5" name="p5" value="err" >
 <label for="radio1-5">Animafors</label>

 <input type="radio" id="radio2-5" name="p5" value="ok">
 <label for="radio2-5">Fera verto</label>

 <input type="radio" id="radio3-5" name="p5" value="err">
 <label for="radio3-5">Copanimal </label>

 <input type="radio" id="radio4-5" name="p5" value="err">
 <label for="radio4-5">Serpensortia</label>
</div>

<div class="botoncentrado">
<input type="submit" value="Enviar" name="enviartest" class="button-naranja">
</div>
<?php }else{  ?>
  <div class="centrado">
  Preguntas contestadas tu puntuación es de <?php echo " " . $cont . " " ?> /4 <br>
  <a href="index.php?p=sala<?php echo $_SESSION['usuario'] ?>"><button class="button-naranja" type="button" name="button">Volver</button></a>
  </div>
<?php } ?>

<?php }else{ ?>
  <div class="centrado">
TEST COMPLETADO TUS PUNTOS YA HAN SIDO SUMADOS

  <a href="index.php?p=sala<?php echo $_SESSION['usuario'] ?>"><button class="button-naranja" type="button" name="button">Volver</button></a>
</div>
  <?php
}
?>
  </form>

</div>
