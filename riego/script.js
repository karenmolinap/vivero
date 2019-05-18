var respuesta = '';

$(function() {
 $(document).on('click', 'button[type="button"]', function(event) {
    let id = this.id;
    var mpos= id;
    //const idMat = document.querySelector('#materiaID');
    //idMat.innerHTML = mpos;
   if(id){
    //llama a AJAX
    //crea objeto
    const xhr = new XMLHttpRequest();
    //abrir conexion
    xhr.open('GET',`servidor.php?id=${id}`,true);
    //recibe respuesta
    xhr.onload = function() {
        if(this.status===200){
            respuesta = '';

            let parte1 = "<thead>" +
            "<tr role=\"row\">" +
              "<th class=\"sorting\" tabindex=\"0\" aria-controls=\"example2\" rowspan=\"1\" colspan=\"1\" > Seleccionar </th>" +
              "<th class=\"sorting_asc\" tabindex=\"0\" aria-controls=\"example2\" rowspan=\"1\" colspan=\"1\" >Clave</th>" +
              "<th class=\"sorting\" tabindex=\"0\" aria-controls=\"example2\" rowspan=\"1\" colspan=\"1\" > Materia </th>" +
              "<th class=\"sorting\" tabindex=\"0\" aria-controls=\"example2\" rowspan=\"1\" colspan=\"1\" >  Maestro </th>" +
              "<th class=\"sorting\" tabindex=\"0\" aria-controls=\"example2\" rowspan=\"1\" colspan=\"1\" > Capacidad </th>" +
            "</tr>" +
            "</thead>";

            try {
                if(xhr.responseText){
                  respuesta = JSON.parse(xhr.responseText);
                  document.getElementById("example4").innerHTML = parte1 + "";
                    for(var i=0;i<respuesta.length;i++){
                       parte1 += "<tr>" +
                        "<td> <input type=\"radio\" name=\"tipo\" value="+ respuesta[i].id +"> </td>" +
                        "<td>" + respuesta[i].id + "</td>" +
                        "<td>" + respuesta[i].hora + "</td>" +
                        "<td>" + respuesta[i].dia + "</td>" +
                        "<td>" + respuesta[i].duracion + "</td>" +
                      "</tr>";
                    }
                  document.getElementById("example4").innerHTML = parte1
                 }else{
                   document.getElementById("example4").innerHTML = parte1 + "";
                 }
                
            } catch(error) {
              //console.log("error"+error);
              //document.getElementById("example4").innerHTML = parte1 + "";
                //div.innerHTML = mpos;
            }
        }
    };


      //enviamos peticion
      xhr.send();
    }
  });
});


$('#myFormSubmit').click(function(e){
    e.preventDefault();
    var seleccionado = $('input[name=tipo]:checked', '#myForm').val();
    
    if(seleccionado){
//      console.log(seleccionado);
      for(var i=0;i<respuesta.length;i++){
        if(respuesta[i].id == seleccionado){
          //console.log(respuesta[i].id + " " + respuesta[i].clave + " " + respuesta[i].id_materia);
          //----------------------------------------------------------
          const xhr = new XMLHttpRequest();
          //abrir conexion
          xhr.open('GET',`procesado.php?id=${respuesta[i].id}&clave=${respuesta[i].clave}&mat=${respuesta[i].id_materia}`,true);
          //recibe respuesta
          xhr.onload = function() {
              if(this.status===200){
                  var datos = '';
                  try {
                      if(xhr.responseText){
                        datos = JSON.parse(xhr.responseText); 
                        
                          if(datos[0].pasar == 1){
                            console.log(datos[0].pasar + datos[0].clave);
                            $("#"+datos[0].clave).removeClass("btn btn-primary");
                            $("#"+datos[0].clave).addClass("btn btn-warning");
                          }else if(datos[0].pasar == 0){
                            console.log(datos[0].pasar + datos[0].clave);
                            $("#"+datos[0].clave).removeClass("btn btn-warning");
                            $("#"+datos[0].clave).addClass("btn btn-primary");
                         }else if(datos[0].pasar == 2){
                           alert("Solo 7 materias!");
                         }
                       }
                  } catch(error) {
                    console.log("error"+error);
                  }
              }
          };
          //enviamos peticion
          xhr.send();
          
         
          //alert(datos[respuesta[i].clave+""]);
          //alert(datos["ITI 4567"] + respuesta[i].clave);
          //----------------------------------------------------------
            
         }
      }
    }
    
});
