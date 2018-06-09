  <?php
  require_once("clases/puntos.php");
    require_once("clases/tests.php");
    $nombretest='quidditch';
    $puntoscasas=new Puntos();
    $test=new Tests();
    $cont=0;
    $hecho4=$test->gettesthecho($_SESSION['email'],$nombretest);

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
  <form class="registro" action="index.php?p=test4" method="POST">
<div class="sign-up-title">
Quidditch
</div>
<?php if($hecho4==0){ ?>
    <?php if(!isset($_POST['enviartest'])){ ?>
¿Cuántos jugadores tiene un equipo de Quidditch?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-1" name="p1" value="err">
 <label for="radio1-1">11</label>

 <input type="radio" id="radio2-1" name="p1" value="err">
 <label for="radio2-1">5</label>

 <input type="radio" id="radio3-1" name="p1" value="ok">
 <label for="radio3-1">7</label>

 <input type="radio" id="radio4-1" name="p1" value="err">
 <label for="radio4-1">9</label>
</div>

¿Cuánto tiempo duró el partido más largo de la historia?<br>
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-2" name="p2" value="err" >
 <label for="radio1-2">1 semana</label>

 <input type="radio" id="radio2-2" name="p2" value="ok">
 <label for="radio2-2">3 meses</label>

 <input type="radio" id="radio3-2" name="p2" value="err">
 <label for="radio3-2">2 meses</label>

 <input type="radio" id="radio4-2" name="p2" value="err">
 <label for="radio4-2">3 semanas</label>
</div>
¿Cuántos puntos se ganan al atrapar la snitch dorada?<br>
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-3" name="p3" value="err" >
 <label for="radio1-3">200</label>

 <input type="radio" id="radio2-3" name="p3" value="err">
 <label for="radio2-3">125</label>

 <input type="radio" id="radio3-3" name="p3" value="ok">
 <label for="radio3-3">150</label>

 <input type="radio" id="radio4-3" name="p3" value="err">
 <label for="radio4-3">250</label>
</div>
¿Cada cuántos años se celebra la copa de quidditch?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-4" name="p4" value="err" >
 <label for="radio1-4">2 años</label>

 <input type="radio" id="radio2-4" name="p4" value="err">
 <label for="radio2-4">6 años</label>

 <input type="radio" id="radio3-4" name="p4" value="err">
 <label for="radio3-4">Cada año</label>

 <input type="radio" id="radio4-4" name="p4" value="ok">
 <label for="radio4-4">4 años</label>
</div>
¿Cuándo termina el juego?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-5" name="p5" value="err" >
 <label for="radio1-5">Al anotar 300 puntos</label>

 <input type="radio" id="radio2-5" name="p5" value="ok">
 <label for="radio2-5">Al atrapar la snitch</label>

 <input type="radio" id="radio3-5" name="p5" value="err">
 <label for="radio3-5">A los 90 minutos</label>

 <input type="radio" id="radio4-5" name="p5" value="err">
 <label for="radio4-5">Al anotar 150 puntos</label>
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
