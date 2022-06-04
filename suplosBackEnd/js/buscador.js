// Buscador por filtro
$("#submitButton").click(function(e){
    e.preventDefault();
    const ciudad = $("#selectCiudad").val();
    const tipo = $("#selectTipo").val();

    $.getJSON("data-1.json", function(json) {
          let ciudadesFiltradas = json.filter(city => city.Ciudad === ciudad && city.Tipo === tipo);
          ciudadesFiltradas.forEach(element => {
              console.log(element);
              $("#tabs-1 .cards").append('<div class="elemento" style="margin-top: 50px;display:flex;justify-content:center"><img src="./img/home.jpg" style="width:160px;"><div class="content" style="margin-left:10px;"><p class="home-direccion">Dirección: ' + element.Direccion + '</p><p class="home-ciudad">Ciudad:'+ element.Ciudad + '</p><p>Telefono: '+ element.Telefono +'</p><p>Codigo postal: '+ element.Codigo_Postal +'</p><p>Tipo: '+ element.Tipo +'</p><p>Precio: '+ element.Precio +'</p><button class="btn-guardar" data-id="'+ element.Id + '" data-direccion="'+ element.Direccion +'" data-ciudad="'+ element.Ciudad +'" data-telefono="'+ element.Telefono +'" data-codigo="'+ element.Codigo_Postal +'" data-tipo="'+ element.Tipo +'" data-precio="'+ element.Precio +'">Guardar</button></div></div>');   
            });
            $(".btn-guardar").click(function(){
                let id = $(this).attr("data-id");
                let direccion = $(this).attr("data-direccion");
                let ciudad = $(this).attr("data-ciudad");
                let telefono = $(this).attr("data-telefono");
                let codigoPostal = $(this).attr("data-codigo");
                let tipo = $(this).attr("data-tipo");
                let precio = $(this).attr("data-precio");

                //console.log(id,direccion,ciudad,telefono,codigoPostal, tipo, precio);
                $.ajax({
                    type: "POST",
                    url: 'home.php',
                    data: {
                        "id" : id,
                        "direccion":direccion,
                        "ciudad":ciudad,
                        "telefono":telefono,
                        "codigoPostal":codigoPostal,
                        "tipo":tipo,
                        "precio":precio
                    },
                    success: function(response)
                    {
                        alert("Guardado con exito");
                        window.location.reload();
                   }
               });
            });
    });
});

$(".btn-eliminar").click(function(){
    let id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        type: "POST",
        url: 'delete.php',
        data: {
            "id" : id,
        },
        success: function(response)
        {
            alert("Eliminado con exito");
            window.location.reload();
       }
   });

});








