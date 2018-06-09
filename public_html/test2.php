  <?php
  require_once("clases/puntos.php");
    require_once("clases/tests.php");
    $nombretest='historia';
    $puntoscasas=new Puntos();
    $test=new Tests();
    $cont=0;
    $hecho2=$test->gettesthecho($_SESSION['email'],$nombretest);

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
  <form class="registro" action="index.php?p=test2" method="POST">
<div class="sign-up-title">
  Historia de la magia
</div>
<?php if($hecho2==0){ ?>
    <?php if(!isset($_POST['enviartest'])){ ?>
¿Quién escribió el libro de Historia de la magia?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-1" name="p1" value="ok">
 <label for="radio1-1">Bathilda Bagshot</label>

 <input type="radio" id="radio2-1" name="p1" value="err">
 <label for="radio2-1">Albus Dumbledore</label>

 <input type="radio" id="radio3-1" name="p1" value="err">
 <label for="radio3-1">Nicolas Flamel</label>

 <input type="radio" id="radio4-1" name="p1" value="err">
 <label for="radio4-1">Dudley Dursley</label>
</div>

¿Quién Descubrió los 12 Usos de la sangre de dragón?<br>
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-2" name="p2" value="err" >
 <label for="radio1-2">Lord Voldemort</label>

 <input type="radio" id="radio2-2" name="p2" value="ok">
 <label for="radio2-2">Albus Dumbledore</label>

 <input type="radio" id="radio3-2" name="p2" value="err">
 <label for="radio3-2">Severus Snape</label>

 <input type="radio" id="radio4-2" name="p2" value="err">
 <label for="radio4-2">Salazar Slytherin</label>
</div>
¿Quién es el fundador de la casa Ravenclaw?<br>
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-3" name="p3" value="err" >
 <label for="radio1-3">Lorena Ravenclaw</label>

 <input type="radio" id="radio2-3" name="p3" value="ok">
 <label for="radio2-3">Rowena Ravenclaw</label>

 <input type="radio" id="radio3-3" name="p3" value="err">
 <label for="radio3-3">Helga Ravenclaw</label>

 <input type="radio" id="radio4-3" name="p3" value="err">
 <label for="radio4-3">Rupert Ravenclaw</label>
</div>
¿Quién es el descubridor de la piedra filosofal?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-4" name="p4" value="err" >
 <label for="radio1-4">Albus Dumbledore</label>

 <input type="radio" id="radio2-4" name="p4" value="err">
 <label for="radio2-4">Elphias Doge</label>

 <input type="radio" id="radio3-4" name="p4" value="ok">
 <label for="radio3-4">Nicolas Flamel</label>

 <input type="radio" id="radio4-4" name="p4" value="err">
 <label for="radio4-4">Cedric Diggory</label>
</div>
Año de la famosa batalla de Albus Dumbledore contra Gellert Grindelwald
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-5" name="p5" value="err" >
 <label for="radio1-5">1923</label>

 <input type="radio" id="radio2-5" name="p5" value="ok">
 <label for="radio2-5">1945</label>

 <input type="radio" id="radio3-5" name="p5" value="err">
 <label for="radio3-5">1944</label>

 <input type="radio" id="radio4-5" name="p5" value="err">
 <label for="radio4-5">1935</label>
</div>

<div class="botoncentrado">
<input type="submit" value="Enviar" name="enviartest" class="button-naranja">
</div>
<?php }else{  ?>
  <div class="centrado">
  Preguntas contestadas tu puntuación es de <?php echo " " . $cont . " " ?> /5 <br>
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
