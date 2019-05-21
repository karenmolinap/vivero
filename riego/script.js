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
    console.log("hora" + hora.value + " boton " + boton);
    let valor = hora.value;

    if(true){
      //----------------------------------------------------------
      const xhr = new XMLHttpRequest();
      //abrir conexion
      //$("#"+boton).removeClass("btn btn-primary");
      //$("#"+boton).addClass("btn btn-warning");
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
                    console.log(datos[0].pasar + " " + datos[0].clave);
                      if(datos[0].pasar == 1){
                        document.getElementById(datos[0].clave).className = "btn btn-danger";
                        var texto = document.getElementById(datos[0].clave);
                        texto.innerText = valor + "min";
                      }else if(datos[0].pasar == 0){
                        document.getElementById(datos[0].clave).className = "btn btn-primary";
                        var texto = document.getElementById(datos[0].clave);
                        texto.innerText = valor + "min";
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
