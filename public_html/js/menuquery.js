var contadormarcas={}; //ARRAY BOOLEANS MARCAS PARA SABER SI ESTA ABIERTO O CERRADO  EL DESPLEGABLE
for (i=0;i<6;i++) {
    contadormarcas['contador' + i] = true;  //INICIALIZO TODAS EN TRUE
}
var contadoropciones={}; //ARRAY BOOLEANS OPCIONES PARA SABER SI ESTA ABIERTO O CERRADO EL DESPLEGABLE
for (i=0;i<50;i++) {
    contadoropciones['contador' + i] = true;  //INICIALIZO TODAS EN TRUE
}

    $(document).click(function(e){ //SI SE HACE CLICK EN ALGUNA PARTE DE LA PAGINA
    var li = e.target; //GUARDO EN LA VARIABLE LI DONDE SE HACE CLICK
//   alert(li.id + " " + li.name);

  for(var i=1;i<=60;i++){

    if(li.name=="marca"){ //si el nombre de la variable es lo comprobante entra en la función
    if(li.id==li.name+i){ //Si el id es igual al nombre+i
      if(!contadormarcas['contador' + i]){
        $("#opciones"+i).slideUp();
        contadormarcas['contador' + i]=true;
        $("#descripcionopcion"+i).slideUp();
        contadoropciones['contador' + i]=true;
      }else{
        //se oculta
        $("#opciones"+i).slideDown();
        contadormarcas['contador' + i]=false;
      }
    }else{
      $("#opciones"+i).slideUp();
      contadormarcas['contador' + i]=true;
      $("#descripcionopcion"+i).slideUp();
      contadoropciones['contador' + i]=true;
    }
  }else if(li.name=="opcion"){
  if(li.id==li.name+i){
    if(!contadoropciones['contador' + i]){
      $("#descripcionopcion"+i).slideUp();
      contadoropciones['contador' + i]=true;
    }else{
      //se oculta
      $("#descripcionopcion"+i).slideDown();
      contadoropciones['contador' + i]=false;
    }
  }else{
    $("#descripcionopcion"+i).slideUp();
    contadoropciones['contador' + i]=true;
  }
}

  }
});
