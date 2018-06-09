//FUNCIÓN QUE ACTIVA O PARA LA MÚSICA
function musica(x){
  if(x=="1"){
    document.getElementById('demo').play(); //ACTIVA LA MÚSICA
  }else{
    document.getElementById('demo').pause();//PARA LA MÚSICA
  }
}
//FUNCIÓN QUE IMPRIME LA NOTICIA
//depende del parametro enviado imprimirá una u otra noticia
function noticias(x){
  if(x=="1"){
    document.getElementById('not').innerHTML="/ <a href=# id=not>AFYDE</a>";
    document.getElementById('noticias').innerHTML='  <div class="row featurette">'
    +'    <div class="col-md-7 mt-3">'
    +'      <h2 class="featurette-heading">Lo nuevo de Animales fantásticos y donde encontrarlos</h2>'
    +'      <p class="textnew">'
    +'      J.K. Rowling ha confirmado según su cuenta de twitter nuevas noticias sobre Animales Fantásticos y donde encontrarlos. Entre ellas que la saga constará de un total de 5 peliculas llamadas "Animales fantásticos Y..", La fecha del rodaje de la siguiente película y la finalización de el nuevo guión. </p>'
    +'    </div>'
    +'    <div class="col-md-5 mt-3">'
    +'      <img class="featurette-image img-fluid mx-auto" src="./img/photoan.jpg" alt=" fotonoticia">'
    +'    </div>'
    +'  </div>'
    +'  <div class="row segundonew"> <div class="col-md-12">'
    +'  Según el director David Yates el rodaje comenzará en Agosto de 2017, para el cual J.K. Según su cuenta de Twitter afirmó que ya tenía terminado el guión, el cual se desarrollará en Europa dejando de lado Nueva York como en la anterior película Aunque sí ha aclarado que el guion está terminado, J.K. Rowling no ha querido desvelar nada más al respecto. David Yates reveló en noviembre que la continuación transcurrirá en París y que explorará la magia en el país galo. Callam Turner (Guerra y Paz) dará vida a Theseus Scamander, hermano de Newt (Eddie Redmayne), mientras que Zoë Kravitz y Jude Law harán de Leta Lestrange y Albus Dumbledore.'
    +' </div></div>'
  }else if(x=="2"){
    document.getElementById('not').innerHTML="/ <a href=# id=not>nuevodumbledore</a>";
    document.getElementById('noticias').innerHTML='  <div class="row featurette">'
    +'    <div class="col-md-7 mt-3">'
    +'      <h2 class="featurette-heading">Jude Law, El nuevo Dumbledore</h2>'
    +'      <p class="textnew">'
    +'     Dumbledore, El famoso director de hogwarts en Harry Potter volverá en Animales fantásticos, en su versión más joven Interpretado por Jude Law según el director de la película David Yates.</p>'
    +'    "Jude Law es un actor con mucho talento y sé que será capaz de conjugar a la perfección todas las facetas de Dumbledore", ha asegurado el director David Yates.'
    +'  </div>'
    +'    <div class="col-md-5 mt-3">'
    +'      <img class="featurette-image img-fluid mx-auto" src="./img/judedumb.jpg" alt=" fotonoticia">'
    +'    </div>'
    +'  </div>'
    +'  <div class="row segundonew"> <div class="col-md-12">'
    +'   La Warner Bros ha anunciado que Dumbledore será interpretado por Jude Law, el personaje en esta película tendrá 45 años de edad, tomando en cuenta que Fantastic Beasts se desarrolla en el año 1926. Es posible que en esta película también veamos un lado más personal e íntimo de Dumbledore, recordando que J.K. Rowling hace pocos años confirmó que es gay. Fantastic Beasts 2 llegará a cartelera en el año 2018, protagonizada por Eddie Redmayne, Katherine Watersona, Johnny Depp, Zoë Kravitz y Jude Law'
    +' </div></div>'
  }else{
    document.getElementById('not').innerHTML="/ <a href=# id=not>pelivoldemort</a>";
    document.getElementById('noticias').innerHTML='  <div class="row featurette">'
    +'    <div class="col-md-6 mt-3">'
    +'      <h2 class="featurette-heading">Voldemort Origins of the heir</h2>'
    +'      <p class="textnew">'
    +'    La red está loca por el estreno de la nueva película de los origenes de Voldemort</p>'
    +'    "Este primer adelanto lleva más de 30 millones de reproducciones en menos de 24 horas, la mayor parte de ellos provenientes de la cuenta oficial de la película en Facebook.<br>'
    +'  "Voldemort: Origins of the Heir" contará la historia de la desaparición de Tom Riddle y sus experimentos con la magia negra hasta conseguir ser como se le conoce en "Harry Potter". El proyecto se lleva gestando desde el año 2015 y busca financiación a través de Kickstarter. Veremos si la cinta llega a estrenarse, ya que se encuentra en plena disputa por los derechos de copyright de la saga Harry Potter.</div>'
    +'    <div class="col-md-6 mt-3">'
    +'      <iframe width="100%" height="315" src="https://www.youtube.com/embed/EVDwpbbaZ5Q" frameborder="0" allowfullscreen></iframe>'
    +'    </div>'
    +'  </div>'
    +'  <div class="row segundonew"> <div class="col-md-12">'
    +'  Esta nueva cinta no es oficial, ya que no viene desde Warner Bros. ni de J.K. Rowling, sino de las productoras Freshscream y Tryangle. Esta película independiente está hecha, según explican sus creadores, para los fans.'
    +' </div></div>'
  }
}

//FUNCION QUE COMPRUEBA QUE SEA UN EMAIL VALIDO
function isValidEmail(mail) {
  return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail);
}
//FUNCIÓN QUE COMPRUEBA QUE LOS CAMPOS CUMPLEN LOS REQUISITOS NECESARIOS
function comprobar(x){
  if(x.name=="email"){ //SI EL CAMPO ES EMAIL
    var email=isValidEmail(x.value) //LLAMA A LA FUNCIÓN PARA VALIDAR EL EMAIL
    if(email){
      x.className="sign-up-input user ok";//SI ESTA BIEN LE ASIGNA LA CLASE OK
      comprobarbdd(x);
    }else{
      x.className="sign-up-input user err"; //SI NO ESTA BIEN LE ASIGNA LA CLASE ERROR
    }
  }else if(x.name=="pass"||x.name=="pass2"||x.name=="pas"){
    if(x.value==""){
      x.className="sign-up-input pass err";
    }else{
      x.className="sign-up-input pass ok";
    }
  }else{
    if(x.value==""){
      x.className="sign-up-input user err";
    }else{
      x.className="sign-up-input user ok";
      comprobarbdd(x);
    }
  }
}
//CREA OBJETO AJAX
function createaAjaxObject(){
  var xmlhttp;
  var respuesta = "vacio";
  xmlhttp = new XMLHttpRequest();

  return xmlhttp;
}

//FUNCIÓN QUE COMPRUEBA QUE LOS CAMPOS ESTEN BIEN Y MANDA LOS DATOS MEDIANTE AJAX
function comprobarbdd(x) {
    xmlhttp = createaAjaxObject();
    var nombre = document.getElementById('nombre');
    var email = document.getElementById('email');

    xmlhttp.open("POST","BDD.php");

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            respuesta = xmlhttp.responseText;
            text.innerHTML = respuesta;
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
if(x.name=="nombre"){
    xmlhttp.send("nombre="+x.value);
}else{
  xmlhttp.send("&email="+x.value);


}
}
