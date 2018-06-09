<?php
 session_start();
 require_once("./clases/acceso.php");
 Acceso::inicia_sesion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Harry Potter Elche</title>
  <meta name="description" content="Contenidos de la famosísima saga de Harry Potter todo dedicado para el publico de Elche " />
  <script src="./js/jquery-3.1.1.js"  type="text/javascript"> </script>
  <script src="./js/bootstrap.min.js" type="text/javascript"> </script>
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/estilo.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/png" href="./img/ico.png" />
  <script src="./js/menuquery.js" type="text/javascript"> </script>
  <script src="./js/jsbea.js" type="text/javascript"> </script>

</head>
<body>
  <header>

    <audio id="demo" src="./sonido/banda.mp3"></audio>


    <?php
$cssMenu="inicio";
if(isset($_GET['p']))
$cssMenu=$_GET['p'];
?>

      <div class="navbar navbar-inverse bg-black">
        <div class="container d-flex justify-content-between bord">
          <a href="index.php" class="navbar-brand"><img src="./img/logo.png" alt="logoharrypotterelche"></a>
        <div class="nav-right derecha">
          <nav>
              <div class="nav-profile dropdown">
                  <a href="#" class="dropdown-toggle" id="circuloblanco" data-toggle="dropdown"><i class="btn btn-info btn-circle sizecircle" ><i class="fa fa-user" style="margin-top:8px; font-size:18px;"></i></i></a>
                  <ul class="dropdown-menu">
                    <?php if($_SESSION['usuario']!=""){ ?>
                        <a href="index.php?p=sala<?php echo $_SESSION['usuario'] ?>" class="text-color" ><span> <?php echo "Hola ". $_SESSION['nombre']." " ?></span></a>
                      <?php }else{ ?>
                        <a href="index.php?p=iniciarsesion" class="text-color"><span>Iniciar Sesion</span></a>

                      <?php }
                       if($_SESSION['usuario']!=""){ ?>
                      <a href="index.php?p=usrDesc" class=text-color><span>desconectar</span></a>
                      <?php }else{ ?>
                      <a href="index.php?p=registro" class=text-color><span>Registrarse</span></a>
                      <?php } ?>
                  </ul>
              </div>
          </nav>
          <button class="navbar-toggler" id="desplegable" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
      </div>
      <div class="collapse bg-inverse" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 py-12">
          <nav>
            <ul class="menu2">
              <li><a href="index.php?p=librosharrypotter" class="text-color">Libros</a></li>
              <li><a href="index.php?p=noticias" class="text-color"  >Noticias</a></li>
              <li><a href="index.php?p=personajesharrypotter" class="text-color"  >Personajes</a></li>
              <li class=submenu><a href="#"  class="text-color dropdown-toggle" data-toggle="dropdown">Hogwarts</a>
              <ul class="dropdown">

                <li><a name="grancomedorharrypotterelche" href="<?php if($_SESSION['usuario']==""){ ?> index.php?p=iniciarsesion  <?php }else{ ?> index.php?p=grancomedor <?php } ?>">Gran Comedor</a></li>
                <li><a name="gryffindorharrypotterelche" href="<?php if($_SESSION['usuario']==""){ ?> index.php?p=iniciarsesion  <?php }else{?> index.php?p=salagry <?php }?>">Sala común Gryffindor</a></li>
                <li><a name="hufflepuffharrypotterelche" href="<?php if($_SESSION['usuario']==""){ ?> index.php?p=iniciarsesion  <?php }else{?> index.php?p=salahuf <?php }?>">Sala común Hufflepuff</a></li>
                <li><a name="slytherinharrypotterelche" href="<?php if($_SESSION['usuario']==""){ ?> index.php?p=iniciarsesion  <?php }else{?> index.php?p=salasly <?php }?>">Sala común Slytherin</a></li>
                <li><a name="ravenclawharrypotterelche" href="<?php if($_SESSION['usuario']==""){ ?> index.php?p=iniciarsesion  <?php }else{?> index.php?p=salarav <?php }?>">Sala común Ravenclaw</a></li>
                <li><a name="prefectosharrypotterelche" href="<?php if($_SESSION['usuario']==""){ ?> index.php?p=iniciarsesion  <?php }else{?> index.php?p=salapre <?php }?>">Sala de Prefectos</a></li>
            </ul>
            </li>
            <li><a href="index.php?p=hechizosharrypotter" class="text-color">Hechizos</a></li>
            <li><button onclick="musica(1);"><i class="fa fa-volume-up" aria-hidden="true"> </i></button>
                <button onclick="musica(2);"><i class="fa fa-volume-off" aria-hidden="true">  </i></button></li>

            </ul>
          </nav>
            </div>
          </div>
        </div>
      </div>
    <div class="navbar navbar-inverse bg-black hid">
      <nav id="menuhid">
      <ul class="menu1">
        <li><a href="index.php?p=librosharrypotter" class="text-color">Libros</a></li>
        <li><a href="index.php?p=noticias" class="text-color"  >Noticias</a></li>
        <li><a href="index.php?p=personajesharrypotter" class="text-color"  >Personajes</a></li>
        <li><a href="#"  class="text-color dropdown-toggle" data-toggle="dropdown">Hogwarts</a>
        <ul class="dropdown-menu">
          <li><a name="grancomedorharrypotterelche" href="<?php if($_SESSION['usuario']==""){ ?> index.php?p=iniciarsesion  <?php }else{ ?> index.php?p=grancomedor <?php } ?>">Gran Comedor</a></li>
          <li><a name="gryffindorharrypotterelche" href="<?php if($_SESSION['usuario']==""){ ?> index.php?p=iniciarsesion  <?php }else{?> index.php?p=salagry <?php }?>">Sala común Gryffindor</a></li>
          <li><a name="hufflepuffharrypotterelche" href="<?php if($_SESSION['usuario']==""){ ?> index.php?p=iniciarsesion  <?php }else{?> index.php?p=salahuf <?php }?>">Sala común Hufflepuff</a></li>
          <li><a name="slytherinharrypotterelche" href="<?php if($_SESSION['usuario']==""){ ?> index.php?p=iniciarsesion  <?php }else{?> index.php?p=salasly <?php }?>">Sala común Slytherin</a></li>
          <li><a name="ravenclawharrypotterelche" href="<?php if($_SESSION['usuario']==""){ ?> index.php?p=iniciarsesion  <?php }else{?> index.php?p=salarav <?php }?>">Sala común Ravenclaw</a></li>
          <li><a name="prefectosharrypotterelche" href="<?php if($_SESSION['usuario']==""){ ?> index.php?p=iniciarsesion  <?php }else{?> index.php?p=salapre <?php }?>">Sala de Prefectos</a></li>
      </ul>
      </li>
      <li><a href="index.php?p=hechizosharrypotter" class="text-color">Hechizos</a></li>
        <li><button onclick="musica(1);"><i class="fa fa-volume-up" aria-hidden="true"> </i></button>
            <button onclick="musica(2);"><i class="fa fa-volume-off" aria-hidden="true">  </i></button></li>



      </ul>
    </nav>
    </div>

  </header>
<script src="./js/menu.js"></script>
    <section class="fixed-header">

    </section>
