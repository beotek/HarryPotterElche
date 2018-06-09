  <?php
  require_once("clases/puntos.php");
    require_once("clases/tests.php");
    $nombretest='criaturas';
    $puntoscasas=new Puntos();
    $test=new Tests();
    $cont=0;
    $hecho1=$test->gettesthecho($_SESSION['email'],$nombretest);

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
  <form class="registro" action="index.php?p=test1" method="POST">
<div class="sign-up-title">
  Cuidado de criaturas mágicas
</div>
<?php if($hecho1==0){ ?>
    <?php if(!isset($_POST['enviartest'])){ ?>
¿Qué suele buscar un Escarbato?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-1" name="p1" value="ok">
 <label for="radio1-1">Cosas brillantes</label>

 <input type="radio" id="radio2-1" name="p1" value="err">
 <label for="radio2-1">Comida</label>

 <input type="radio" id="radio3-1" name="p1" value="err">
 <label for="radio3-1">Mandragoras</label>

 <input type="radio" id="radio4-1" name="p1" value="err">
 <label for="radio4-1">Golosinas</label>
</div>

¿Cual es el arma más mortifera del Basilisco?<br>
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-2" name="p2" value="err" >
 <label for="radio1-2">Su veneno</label>

 <input type="radio" id="radio2-2" name="p2" value="err">
 <label for="radio2-2">Su mandibula</label>

 <input type="radio" id="radio3-2" name="p2" value="ok">
 <label for="radio3-2">Su mirada</label>

 <input type="radio" id="radio4-2" name="p2" value="err">
 <label for="radio4-2">Su fuerza</label>
</div>
¿Cuantos usos tiene la sangre de dragón?<br>
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-3" name="p3" value="err" >
 <label for="radio1-3">10</label>

 <input type="radio" id="radio2-3" name="p3" value="ok">
 <label for="radio2-3">12</label>

 <input type="radio" id="radio3-3" name="p3" value="err">
 <label for="radio3-3">24</label>

 <input type="radio" id="radio4-3" name="p3" value="err">
 <label for="radio4-3">32</label>
</div>
¿Qué se obtiene al beber sangre de unicornio?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-4" name="p4" value="err" >
 <label for="radio1-4">Poder</label>

 <input type="radio" id="radio2-4" name="p4" value="err">
 <label for="radio2-4">Un cuerno mágico</label>

 <input type="radio" id="radio3-4" name="p4" value="ok">
 <label for="radio3-4">Prolongación de la vida</label>

 <input type="radio" id="radio4-4" name="p4" value="err">
 <label for="radio4-4">Crecimiento de pelo</label>
</div>
¿Qué propiedades tiene las lagrimas de fénix?
<div class="elegircasashogwarts">
 <input type="radio" id="radio1-5" name="p5" value="err" >
 <label for="radio1-5">Destructivas</label>

 <input type="radio" id="radio2-5" name="p5" value="ok">
 <label for="radio2-5">Curativas</label>

 <input type="radio" id="radio3-5" name="p5" value="err">
 <label for="radio3-5">Nutritivas</label>

 <input type="radio" id="radio4-5" name="p5" value="err">
 <label for="radio4-5">Culinarias</label>
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
