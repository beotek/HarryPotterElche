  <?php
  require_once("clases/puntos.php");
    require_once("clases/tests.php");
    $nombretest='pociones';
    $puntoscasas=new Puntos();
    $test=new Tests();
    $cont=0;
    $hecho6=$test->gettesthecho($_SESSION['email'],$nombretest);

   if(isset($_POST['enviartest'])){
     if(isset($_POST['p1'])){
      if($_POST['p1']=='ok'){
      $cont=$cont+1;
      }
    }
     if(isset($_POST['p2'])){
      if($_POST['p2']=='ok'){
      $cont=$cont+1;
      }
    }
    if(isset($_POST['p3'])){
      if($_POST['p3']=='ok'){
      $cont=$cont+1;
    }
  }

    if(isset($_POST['p4'])){
      if($_POST['p4']=='ok'){
        $cont=$cont+1;
        }
      }
    if(isset($_POST['p5'])){
      if($_POST['p5']=='ok'){
        $cont=$cont+1;
        }
      }

      $test->set_testhecho($nombretest,$_SESSION['email']);

      $puntoscasas->sumarpuntos($cont,$_SESSION['nombre']);
  }

    ?>

<div id=iniciarsesion>
  <form class="registro" action="index.php?p=test6" method="POST">
<div class="sign-up-title">
Pociones
</div>
<?php if($hecho6==0){ ?>
    <?php if(!isset($_POST['enviartest'])){ ?>
¿Qué diferencia hay entre Aconito y Luparia?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-1" name="p1" value="err">
 <label for="radio1-1">El tallo</label>

 <input type="radio" id="radio2-1" name="p1" value="err">
 <label for="radio2-1">La flor</label>

 <input type="radio" id="radio3-1" name="p1" value="err">
 <label for="radio3-1">El color</label>

 <input type="radio" id="radio4-1" name="p1" value="ok">
 <label for="radio4-1">Ninguna</label>
</div>

¿Con qué otro nombre es conocida el felix felicis?<br>
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-2" name="p2" value="err" >
 <label for="radio1-2">Felicidad Total</label>

 <input type="radio" id="radio2-2" name="p2" value="ok">
 <label for="radio2-2">Suerte líquida</label>

 <input type="radio" id="radio3-2" name="p2" value="err">
 <label for="radio3-2">Suerte feliz</label>

 <input type="radio" id="radio4-2" name="p2" value="err">
 <label for="radio4-2">Poción de la felicidad</label>
</div>
¿Donde se puede encontar un bezoar?<br>
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-3" name="p3" value="ok" >
 <label for="radio1-3">En el estomago de una cabra</label>

 <input type="radio" id="radio2-3" name="p3" value="err">
 <label for="radio2-3">En el estomago de una vaca</label>

 <input type="radio" id="radio3-3" name="p3" value="err">
 <label for="radio3-3">En el jardín</label>

 <input type="radio" id="radio4-3" name="p3" value="err">
 <label for="radio4-3">En un arbol</label>
</div>
¿Qué es lo más importante para crear una poción?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-4" name="p4" value="err" >
 <label for="radio1-4">La habilidad</label>

 <input type="radio" id="radio2-4" name="p4" value="err">
 <label for="radio2-4">La varita</label>

 <input type="radio" id="radio3-4" name="p4" value="err">
 <label for="radio3-4">La receta</label>

 <input type="radio" id="radio4-4" name="p4" value="ok">
 <label for="radio4-4">El caldero</label>
</div>
¿Cuánto tiempo se necesita para elaborar una poción multijugos?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-5" name="p5" value="err" >
 <label for="radio1-5">1 hora</label>

 <input type="radio" id="radio2-5" name="p5" value="err">
 <label for="radio2-5">1 dia</label>

 <input type="radio" id="radio3-5" name="p5" value="err">
 <label for="radio3-5">1 semana</label>

 <input type="radio" id="radio4-5" name="p5" value="ok">
 <label for="radio4-5">1 mes</label>
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
