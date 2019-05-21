let boton = '';

$(function() {
 $(document).on('click', 'button[type="button"]', function(event) {
    let id = this.id;
    boton = id;
    });
});


$('#myFormSubmit').click(function(e){
    e.preventDefault();
    var hora = document.getElementById('duracion_se');
    console.log(hora.value);
    let valor = hora.value;
    if(hora.value != 0){
      //----------------------------------------------------------
      const xhr = new XMLHttpRequest();
      //abrir conexion
      xhr.open('GET',`procesado.php?id=${boton}&hora=${valor}`,true);
      //recibe respuesta
      xhr.onload = function() {
          console.log(this.status);
          if(this.status===200){
              var datos = '';
              try {
                  if(xhr.responseText){

                    datos = JSON.parse(xhr.responseText);

                    console.log(datos);

                      if(datos[0].pasar == 1){
                        console.log(datos[0].pasar + datos[0].clave);
                        $("#"+datos[0].clave).removeClass("btn btn-primary");
                        $("#"+datos[0].clave).addClass("btn btn-warning");
                      }else if(datos[0].pasar == 0){
                        console.log(datos[0].pasar + datos[0].clave);
                        $("#"+datos[0].clave).removeClass("btn btn-warning");
                        $("#"+datos[0].clave).addClass("btn btn-primary");
                     }
                   }
              } catch(error) {
                console.log("error"+error);
              }
          }
      };
      //enviamos peticion
      xhr.send();

    }


});
