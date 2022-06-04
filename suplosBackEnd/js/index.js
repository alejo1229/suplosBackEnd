/*
  Creación de una función personalizada para jQuery que detecta cuando se detiene el scroll en la página
*/
$.fn.scrollEnd = function(callback, timeout) {
  $(this).scroll(function(){
    var $this = $(this);
    if ($this.data('scrollTimeout')) {
      clearTimeout($this.data('scrollTimeout'));
    }
    $this.data('scrollTimeout', setTimeout(callback,timeout));
  });
};
/*
  Función que inicializa el elemento Slider
*/

function inicializarSlider(){
  $("#rangoPrecio").ionRangeSlider({
    type: "double",
    grid: false,
    min: 0,
    max: 100000,
    from: 200,
    to: 80000,
    prefix: "$"
  });
}
/*
  Función que reproduce el video de fondo al hacer scroll, y deteiene la reproducción al detener el scroll
*/
function playVideoOnScroll(){
  var ultimoScroll = 0,
      intervalRewind;
  var video = document.getElementById('vidFondo');
  $(window)
    .scroll((event)=>{
      var scrollActual = $(window).scrollTop();
      if (scrollActual > ultimoScroll){
       
     } else {
        //this.rewind(1.0, video, intervalRewind);
        video.play();
     }
     ultimoScroll = scrollActual;
    })
    .scrollEnd(()=>{
      video.pause();
    }, 10)
}

// Obtención de ciudaddes desde json

const obtenerCiudades = ()=>{

    $.getJSON("data-1.json", function(json) {
      let lenghtData = 0;
      let ciudades = [];
      json.forEach( e => {
        lenghtData += 1;        
        ciudades.push(e.Ciudad);        
      });
      var ciudadesNoRep = new Set(ciudades);
      let ciudadesSelect = Array.from(ciudadesNoRep);

      for(var i in ciudadesSelect){
        document.getElementById("selectCiudad").innerHTML += "<option value='" + ciudadesSelect[i]+"'>"+ciudadesSelect[i]+"</option>"; 
        document.getElementById("selectCiudad2").innerHTML += "<option value='" + ciudadesSelect[i]+"'>"+ciudadesSelect[i]+"</option>"; 
      }
  });
}

// Obtencion de tipo desde json

const obtenerTipo = ()=>{

  $.getJSON("data-1.json", function(json) {
    let lenghtData = 0;
    let tipos = [];
    json.forEach( e => {
      lenghtData += 1;        
      tipos.push(e.Tipo);        
    });
    var tipoNoRep = new Set(tipos);
    let tipoSelect = Array.from(tipoNoRep);

    for(var i in tipoSelect){
      document.getElementById("selectTipo").innerHTML += "<option value='" + tipoSelect[i]+"'>"+ tipoSelect[i]+"</option>"; 
      document.getElementById("selectTipo2").innerHTML += "<option value='" + tipoSelect[i]+"'>"+ tipoSelect[i]+"</option>"; 

    }
});
}



obtenerCiudades();
obtenerTipo();
inicializarSlider();
playVideoOnScroll();
