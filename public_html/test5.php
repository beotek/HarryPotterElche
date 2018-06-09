  <?php
  require_once("clases/puntos.php");
    require_once("clases/tests.php");
    $nombretest='encantamientos';
    $puntoscasas=new Puntos();
    $test=new Tests();
    $cont=0;
    $hecho5=$test->gettesthecho($_SESSION['email'],$nombretest);

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
  <form class="registro" action="index.php?p=test5" method="POST">
<div class="sign-up-title">
  Encantamientos
</div>
<?php if($hecho5==0){ ?>
    <?php if(!isset($_POST['enviartest'])){ ?>
¿Cuál es el encantamiento convocador?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-1" name="p1" value="err">
 <label for="radio1-1">Convocator</label>

 <input type="radio" id="radio2-1" name="p1" value="ok">
 <label for="radio2-1">Accio</label>

 <input type="radio" id="radio3-1" name="p1" value="err">
 <label for="radio3-1">Wingardium Leviosa</label>

 <input type="radio" id="radio4-1" name="p1" value="err">
 <label for="radio4-1">Depulso</label>
</div>

¿Qué hechizo elegirias para invocar un chorro de agua?<br>
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-2" name="p2" value="ok" >
 <label for="radio1-2">Aguamenti</label>

 <input type="radio" id="radio2-2" name="p2" value="err">
 <label for="radio2-2">Aquafors</label>

 <input type="radio" id="radio3-2" name="p2" value="err">
 <label for="radio3-2">Aguiferus</label>

 <input type="radio" id="radio4-2" name="p2" value="err">
 <label for="radio4-2">Waterprof</label>
</div>
¿Cuál es el hechizo levitatorio?<br>
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-3" name="p3" value="ok" >
 <label for="radio1-3">Wingardium leviosa</label>

 <input type="radio" id="radio2-3" name="p3" value="err">
 <label for="radio2-3">Incendio</label>

 <input type="radio" id="radio3-3" name="p3" value="err">
 <label for="radio3-3">Levitator</label>

 <input type="radio" id="radio4-3" name="p3" value="err">
 <label for="radio4-3">Accio</label>
</div>
¿Cual es el mejor hechizo para crear fuego?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-4" name="p4" value="err" >
 <label for="radio1-4">Lacarnum inflamarae</label>

 <input type="radio" id="radio2-4" name="p4" value="err">
 <label for="radio2-4">Fermaportus</label>

 <input type="radio" id="radio3-4" name="p4" value="err">
 <label for="radio3-4">Fuego fatuo</label>

 <input type="radio" id="radio4-4" name="p4" value="ok">
 <label for="radio4-4">Incendio</label>
</div>
¿Cuál es el contrario al encantamiento convocador?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-5" name="p5" value="err" >
 <label for="radio1-5">Accio</label>

 <input type="radio" id="radio2-5" name="p5" value="ok">
 <label for="radio2-5">Depulso</label>

 <input type="radio" id="radio3-5" name="p5" value="err">
 <label for="radio3-5">Desmaius</label>

 <input type="radio" id="radio4-5" name="p5" value="err">
 <label for="radio4-5">Imperio</label>
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
