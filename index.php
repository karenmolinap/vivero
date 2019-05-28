<?php
  require 'abre_sesion.php';
  require 'conexion_bd.php';
?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>UPV | Vivero Inteligente</title>
    <!-- Favicon-->
    <link rel="icon" href="http://amestris.me/viverosrc/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="http://amestris.me/viverosrc/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="http://amestris.me/viverosrc/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="http://amestris.me/viverosrc/css/themes/all-themes.css" rel="stylesheet" />

    <link rel="stylesheet" href="librerias/dist/datepickk.min.css">
</head>

<body class="theme-green">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Por favor espere...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <input type="hidden" id="tempHidden" name="tempHidden" value="">
    <input type="hidden" id="humeHidden" name="humeHidden" value="">
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Vivero Inteligente - Dashboard</a>
                <div id="ana" name="ana"></div>
                <div id="karen" name="karen"></div>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="http://amestris.me/viverosrc/images/UPV.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sistemas Integrales</div>
                    <div class="email">Universidad Politecnica de Victoria</div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">Navegacion</li>
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="riego/riego.php">
                            <i class="material-icons">spa</i>
                            <span>Riego</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="cerrar_sesion.php">
                            <i class="material-icons">input</i>
                            <span>Salir</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Gauge Chart -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TEMPERATURA</h2>
                            <h2 id="lda" name="lda"></h2>
                        </div>
                        <div class="chartjs-wrapper">
                          <div id="temperatura-gauge" class="temperatura-gauge" height="150"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Gauge Chart -->

            <!-- Gauge Chart 2-->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>HUMEDAD</h2>
                            <h2 id="lda" name="lda"></h2>
                        </div>
                        <div class="chartjs-wrapper">
                          <!--<canvas class="humedad-gauge" height="150"></canvas>-->
                          <div id="humedad-gauge" class="temperatura-gauge" height="150"></div>
                        </div>
                    </div>
            </div>
            <!-- #END# Gauge Chart 2 -->
        </div>


        <!-- Line Chart -->
      <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="header">
              <div class="row clearfix">
                <div class="col-xs-12 col-sm-6">
                  <h2>Line Chart</h2>
                </div>
                <div class="col-xs-12 col-sm-6 align-right">
                  <div class="switch panel-switch-btn">
                    <span class="m-r-10 font-12">Visualizar por:</span>

                    <form>
                        <select class="click_option"  name="opciones">
                            <option value="">Selecciona una opción</option>
                            <option value="1">Día / Días</option>
                            <option value="2">Mes</option>
                            <option value="3">Año</option>
                        </select>
                    </form>

                  </div>
                  <?php include 'modalMes.php'; ?>
                  <?php include 'modalAnio.php'; ?>
                </div>
              </div>
            </div>

            <div class="body" id="body">

            </div>

            <div class="">

              <canvas id="chartjs-line"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!--#END# Line Chart -->

    </section>

    <!-- Jquery Core Js -->
    <script src="http://amestris.me/viverosrc/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="http://amestris.me/viverosrc/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="http://amestris.me/viverosrc/plugins/node-waves/waves.js"></script>

    <!-- ChartJs -->
    <script src="http://amestris.me/viverosrc/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Custom Js-->
    <script src="http://amestris.me/viverosrc/js/admin.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/globalize/0.1.1/globalize.min.js"></script>
    <script type="text/javascript" src="http://cdn3.devexpress.com/jslib/15.2.5/js/dx.chartjs.js"></script>

    <!-- Line Chart Functions -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>

    <script src="librerias/dist/datepickk.min.js"></script>
    <!-- Funciones para generar el Line Chart según los parámetros ingresados por el usuario -->
        <script type="text/javascript">

          //Funcion para clicks en el combobox---------------------------------------------------------------

          $('select.click_option').click(function() {
              if ( $(this).data('clicks') == 1 ) {
                  // Trigger here your function:
                  //console.log('Selected Option: ' + $(this).val() );
                  $(this).data('clicks', 0);

                  if ($(this).val() == 1) {

                      //Mostrar el calendario
                      abreCalendario();

                  } else if ($(this).val() == 2){

                      //Muestra el formulario de mes
                      $("#modal_mes").modal();

                  } else if ($(this).val() == 3){
                      $("#modal_anio").modal();
                  }

              } else {
                  console.log('first click');
                  $(this).data('clicks', 1);
              }
          });

          $('select.click_option').focusout( function() {
              $(this).data('clicks', 0);
          });

          //------------------------------------------------------------------------------------------------

          //Funcion para mostrar el calendario despues de seleccionar un valor del combobox-----------------

          function abreCalendario(){
            var datepicker = new Datepickk();
            datepicker.unselectAll();
            datepicker.range = true;

            //Cuando se cierra la venta del calendario
            datepicker.onClose = function(){

              //Sacamos las fechas
              var fechas = datepicker.selectedDates;

              pasarFecha(fechas);
              datepicker.onClose = null;
            }
            datepicker.show();
          }

          //------------------------------------------------------------------------------------------------

          /*Funcion para mandar los valores de la fecha mediante ajax a graficas.php para-------------------
            hacer consulta a la base de datos
          */

          function pasarFecha(fechas){
                  //console.log(fechas);
                  if (fechas.length > 1) {

                    var diccionario_fechas = {dia1: fixDigit(fechas[0].getDate()), mes1: fixDigit(fechas[0].getMonth()+1),
                        anio1: fechas[0].getFullYear(), dia2: fixDigit(fechas[1].getDate()), mes2: fixDigit(fechas[1].getMonth()+1),
                        anio2: fechas[1].getFullYear()
                    };

                  } else {

                    var diccionario_fechas = {dia1: fixDigit(fechas[0].getDate()), mes1: fixDigit(fechas[0].getMonth()+1),
                      anio1: fechas[0].getFullYear()
                    };

                  }

                  $.ajax({
                          data: {fecha: diccionario_fechas}, //datos que se envian a traves de ajax
                          url:   'graficaDia.php', //archivo que recibe la peticion
                          type:  'post', //método de envio
                          success:  function (data) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                  //alert(data);
                                  if (fechas.length > 1) {
                                    var inicio = diccionario_fechas["anio1"]+"-"+diccionario_fechas["mes1"]+"-"+diccionario_fechas["dia1"];
                                    var final = diccionario_fechas["anio2"]+"-"+diccionario_fechas["mes2"]+"-"+diccionario_fechas["dia2"];
                                    var lista_fecha = obtenerListaFechas(inicio, final);
                                    generarGraficaRangoDias(data, lista_fecha);
                                  } else {
                                    generarGraficaUnDia(data);
                                  }
                          },
                          dataType: "json"
                  });
          }

          //-------------------------------------------------------------------------------------------------

          //Funcion que pasa los valores del formulario de meses a php para hacer la consulta
          function pasarMes(){
              //Obtener año y mes para realizar la consulta
              var valor_anio = document.getElementById("anio").value;
              var valor_mes = document.getElementById("mes").value;

              var diccionario_mes = {anio: valor_anio, mes: valor_mes};

              $.ajax({
                          data: {mes: diccionario_mes}, //datos que se envian a traves de ajax
                          url:   'graficaMes.php', //archivo que recibe la peticion
                          type:  'post', //método de envio
                          success:  function (data) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                              var inicio = valor_anio+"-"+valor_mes+"-01";
                              var final = valor_anio+"-"+valor_mes+"-"+ultimoDia(valor_anio, valor_mes);
                              var lista_fecha = obtenerListaFechas(inicio, final);
                              generarGraficaMes(data, lista_fecha);
                          },
                          dataType: "json"
                  });
          }

          //-------------------------------------------------------------------------------------------------

          //Funcion que pasa los valores del formulario de meses a php para hacer la consulta
          function pasarAnio(){
              //Obtener año y mes para realizar la consulta
              var valor_anio = document.getElementById("anio").value;
              var valor_opcion = document.getElementById("opcion").value;

              var diccionario_anio = {anio: valor_anio, opcion: valor_opcion};

              $.ajax({
                          data: {anio: diccionario_anio}, //datos que se envian a traves de ajax
                          url:   'graficaAnio.php', //archivo que recibe la peticion
                          type:  'post', //método de envio
                          success:  function (data) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                              var etiqueta = [];
                              if (valor_opcion == 1) {
                                generarGraficaAnioPorMes(data, etiqueta);
                              } else {
                                var inicio = valor_anio+"-01-01";
                                var final = valor_anio+"-12-31";
                                var lista_fecha = obtenerListaFechas(inicio, final);
                                generarGraficaAnioPorDia(data, lista_fecha);
                              }
                          },
                          dataType: "json"
                  });
          }

          //-------------------------------------------------------------------------------------------------

          function generarGraficaUnDia(datos){

              //Etiqueta de la grafica
              var etiqueta_horas = ['0:00-1:00','1:00-2:00','2:00-3:00','3:00-4:00','4:00-5:00','5:00-6:00',
                            '6:00-7:00','7:00-8:00','8:00-9:00','9:00-10:00', '10:00-11:00', '11:00-12:00',
                            '12:00-13:00', '13:00-14:00', '14:00-15:00', '15:00-16:00', '16:00-17:00','17:00-18:00',
                            '18:00-19:00', '19:00-20:00', '20:00-21:00', '21:00-22:00', '22:00-23:00', '23:00-00:00'];

              //Valores retornado desde PHP
              var valores = new Array();
              valores = datos;

              var array_temperatura = new Array(24).fill(0);
              var array_humedad = new Array(24).fill(0);
              var array_cantidad = new Array(24).fill(0);
              var array_horas = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23];

              var hora = 0;

              //Recorrer todo el arreglo de valores de temperatura y humedad
              for (var i = 0; i<valores.length; i++) {

                  //Checar por horas
                  if (Number(valores[i]["hora"]) == hora) {

                      //Acumular los valore de la temperatura y humedad si son horas iguales
                      array_temperatura[hora] += Number(valores[i]["temperatura"]);
                      array_humedad[hora] += Number(valores[i]["humedad"]);
                      array_cantidad[hora] ++;

                  } else {
                      //Cuando hay un cambio en la hora hay que cuardar los valores en la siguiente posicion
                      if(array_horas[hora+1] == Number(valores[i]["hora"])){
                          array_temperatura[hora+1] += Number(valores[i]["temperatura"]);
                          array_humedad[hora+1] += Number(valores[i]["humedad"]);
                          array_cantidad[hora+1] ++;
                      }

                      //Se aumenta la hora
                      hora++;
                  }
              }

              //Calcular los promedios
              for (var i = 0; i<array_temperatura.length; i++) {
                  if (array_temperatura[i] != 0) {
                      array_temperatura[i] /= array_cantidad[i];
                      array_humedad[i] /= array_cantidad[i];
                  }
              }

              //Dibujar la grafica
              dibujarGrafica(etiqueta_horas, array_temperatura, array_humedad);

          }

          //-------------------------------------------------------------------------------------------------

          function generarGraficaRangoDias(datos, lista_fecha){

              //Valores retornado desde PHP
              var valores = new Array();
              valores = datos;

              //Cantidad de dias seleccionados
              var cant_dias = lista_fecha.length;

              var array_temperatura = new Array(cant_dias).fill(0);
              var array_humedad = new Array(cant_dias).fill(0);
              var array_cantidad = new Array(cant_dias).fill(0);

              var cont = 0;

              console.log(valores[0]["fecha"]);


              //Recorrer todo el arreglo de valores de temperatura y humedad
              for (var i = 0; i<valores.length; i++) {

                  //Checar por fecha
                  if (valores[i]["fecha"] == lista_fecha[cont]) {

                      //Acumular los valore de la temperatura y humedad si son horas iguales
                      array_temperatura[cont] += Number(valores[i]["temperatura"]);
                      array_humedad[cont] += Number(valores[i]["humedad"]);
                      array_cantidad[cont] ++;

                  } else {
                      //Cuando hay un cambio en la hora hay que cuardar los valores en la siguiente posicion
                      if(lista_fecha[cont+1] == valores[i]["fecha"]){
                          array_temperatura[cont+1] += Number(valores[i]["temperatura"]);
                          array_humedad[cont+1] += Number(valores[i]["humedad"]);
                          array_cantidad[cont+1] ++;
                      }

                      cont++;
                  }
              }

              //Calcular los promedios
              for (var i = 0; i<array_temperatura.length; i++) {
                  if (array_temperatura[i] != 0) {
                      array_temperatura[i] /= array_cantidad[i];
                      array_humedad[i] /= array_cantidad[i];
                  }
              }

              //Dibujar la grafica
              dibujarGrafica(lista_fecha, array_temperatura, array_humedad);

          }

          //-------------------------------------------------------------------------------------------------

          function generarGraficaMes(datos, lista_fecha){

              //Valores retornado desde PHP
              var valores = new Array();
              valores = datos;

              //Cantidad de dias seleccionados
              var cant_dias = lista_fecha.length;

              var array_temperatura = new Array(cant_dias).fill(0);
              var array_humedad = new Array(cant_dias).fill(0);
              var array_cantidad = new Array(cant_dias).fill(0);

              var cont = 0;

              //Recorrer todo el arreglo de valores de temperatura y humedad
              for (var i = 0; i<valores.length; i++) {

                  //Checar por fecha
                  if (valores[i]["fecha"] == lista_fecha[cont]) {

                      //Acumular los valore de la temperatura y humedad si son horas iguales
                      array_temperatura[cont] += Number(valores[i]["temperatura"]);
                      array_humedad[cont] += Number(valores[i]["humedad"]);
                      array_cantidad[cont] ++;

                  } else {
                      //Cuando hay un cambio en la hora hay que cuardar los valores en la siguiente posicion
                      if(lista_fecha[cont+1] == valores[i]["fecha"]){
                          array_temperatura[cont+1] += Number(valores[i]["temperatura"]);
                          array_humedad[cont+1] += Number(valores[i]["humedad"]);
                          array_cantidad[cont+1] ++;
                      }

                      cont++;
                  }
              }

              //Calcular los promedios
              for (var i = 0; i<array_temperatura.length; i++) {
                  if (array_temperatura[i] != 0) {
                      array_temperatura[i] /= array_cantidad[i];
                      array_humedad[i] /= array_cantidad[i];
                  }
              }

              //Dibujar la grafica
              dibujarGrafica(lista_fecha, array_temperatura, array_humedad);

          }

          //-------------------------------------------------------------------------------------------------

          function generarGraficaAnioPorMes(datos, lista_fecha){
              var etiqueta = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
              var etiqueta1 = [...Array(12).keys()].map(x => ++x);

              //Valores retornado desde PHP
              var valores = new Array();
              valores = datos;

              //Cantidad de dias seleccionados
              var cant = etiqueta.length;

              var array_temperatura = new Array(cant).fill(0);
              var array_humedad = new Array(cant).fill(0);
              var array_cantidad = new Array(cant).fill(0);

              var cont = 0;

              //Recorrer todo el arreglo de valores de temperatura y humedad
              for (var i = 0; i<valores.length; i++) {

                  //Checar por fecha
                  if (valores[i]["mes"] == etiqueta1[cont]) {

                      //Acumular los valore de la temperatura y humedad si son horas iguales
                      array_temperatura[cont] += Number(valores[i]["temperatura"]);
                      array_humedad[cont] += Number(valores[i]["humedad"]);
                      array_cantidad[cont] ++;

                  } else {
                      //Cuando hay un cambio en la hora hay que cuardar los valores en la siguiente posicion
                      if(lista_fecha[cont+1] == valores[i]["mes"]){
                          array_temperatura[cont+1] += Number(valores[i]["temperatura"]);
                          array_humedad[cont+1] += Number(valores[i]["humedad"]);
                          array_cantidad[cont+1] ++;
                      }

                      cont++;
                  }
              }

              //Calcular los promedios
              for (var i = 0; i<array_temperatura.length; i++) {
                  if (array_temperatura[i] != 0) {
                      array_temperatura[i] /= array_cantidad[i];
                      array_humedad[i] /= array_cantidad[i];
                  }
              }

              //Dibujar la grafica
              dibujarGrafica(etiqueta, array_temperatura, array_humedad);

          }

          //-------------------------------------------------------------------------------------------------

          function generarGraficaAnioPorDia(datos, lista_fecha){
              var etiqueta = [...Array(365).keys()].map(x => ++x);

              //Valores retornado desde PHP
              var valores = new Array();
              valores = datos;

              //Cantidad de dias seleccionados
              var cant = etiqueta.length;

              var array_temperatura = new Array(cant).fill(0);
              var array_humedad = new Array(cant).fill(0);
              var array_cantidad = new Array(cant).fill(0);

              var cont = 0;

              //Recorrer todo el arreglo de valores de temperatura y humedad
              for (var i = 0; i<valores.length; i++) {

                  //Checar por fecha
                  if (valores[i]["fecha"] == lista_fecha[cont]) {

                      //Acumular los valore de la temperatura y humedad si son horas iguales
                      array_temperatura[cont] += Number(valores[i]["temperatura"]);
                      array_humedad[cont] += Number(valores[i]["humedad"]);
                      array_cantidad[cont] ++;

                  } else {
                      //Cuando hay un cambio en la hora hay que cuardar los valores en la siguiente posicion
                      if(lista_fecha[cont+1] == valores[i]["fecha"]){
                          array_temperatura[cont+1] += Number(valores[i]["temperatura"]);
                          array_humedad[cont+1] += Number(valores[i]["humedad"]);
                          array_cantidad[cont+1] ++;
                      }

                      cont++;
                  }
              }

              //Calcular los promedios
              for (var i = 0; i<array_temperatura.length; i++) {
                  if (array_temperatura[i] != 0) {
                      array_temperatura[i] /= array_cantidad[i];
                      array_humedad[i] /= array_cantidad[i];
                  }
              }

              //Dibujar la grafica
              dibujarGrafica(etiqueta, array_temperatura, array_humedad);

          }

          //--------------------------------------------------------------------------------------------------

          //Funcion para agregar un 0 si el mes o dia es de un digito
          function fixDigit(val){
            return val.toString().length === 1 ? "0" + val : val;
          }

          //Funcion para obtener lista de fechas ingresando el inicio y final
          function obtenerListaFechas(inicio, final){
              var listDate = [];
              var startDate = inicio;
              var endDate = final;
              var dateMove = new Date(startDate);
              var strDate = startDate;

              while (strDate < endDate){
                var strDate = dateMove.toISOString().slice(0,10);
                listDate.push(strDate);
                dateMove.setDate(dateMove.getDate()+1);
              };

              return listDate;
          }

          //Funcion para sacar el ultimo dia del mes
          function ultimoDia(y,m){
            console.log(new Date(y, m +1, 0).getDate());
            return  new Date(y, m +1, 0).getDate();
          }

          //Funcion para dibujar la graficar
          function dibujarGrafica(etiquetas, temperatura, humedad){
              var ctx = document.getElementById('chartjs-line').getContext('2d');
              var lineChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                    labels: etiquetas,
                    datasets: [{
                      borderColor: "#E25F5F",
                      label: 'Temperatura',
                      data: temperatura,
                      borderWidth: 3,
                    },

                    {
                      borderColor: "#2793DB",
                      label: 'Humedad',
                      data: humedad,
                      borderWidth: 3,
                    }]
                  },
                  options: {
                      title: {
                        display: true,
                        text: 'Grafica de Temperatura y Humedad del Día seleccionado'
                      }
                  }
              });
          }

          //--------------------------------------------------------------------------------------------------

          //--------------------------------------------------------------------------------------------------

          //--------------------------------------------------------------------------------------------------

          function abreAnioForm(){
              console.log("hola1");
          }

          //--------------------------------------------------------------------------------------------------


          //-------------------------------------------------------------

        </script>


      <script type="text/javascript">
        // Create chart
        var ctx = document.getElementsByClassName("chartjs-gauge2");
        var chart = new Chart(ctx, {
          type:"doughnut",
          data: {
            labels : ["Pink","Blue"],
            datasets: [{
              label: "Gauge",
              data : [10, 190],
              backgroundColor: [
              "rgb(255, 99, 132)",
              "rgb(54, 162, 235)",
              "rgb(255, 205, 86)"
              ]
            }]
          },
          options: {
            circumference: Math.PI,
            rotation : Math.PI,
                cutoutPercentage : 80, // precent
                plugins: {
                  datalabels: {
                    backgroundColor: "rgba(0, 0, 0, 0.7)",
                    borderColor: "#ffffff",
                    color: function(context) {
                      return context.dataset.backgroundColor;
                    },
                    font: function(context) {
                      var w = context.chart.width;
                      return {
                        size: w < 512 ? 18 : 20
                      }
                    },
                    align: "start",
                    anchor: "start",
                    offset: 10,
                    borderRadius: 4,
                    borderWidth: 1,
                    formatter: function(value, context) {
                      var i = context.dataIndex;
                      var len = context.dataset.data.length - 1;
                      if(i == len){
                        return null;
                      }
                      document.getElementById("lda").innerHTML = "Hola: " + value + "mph";
                      return value+" mph";

                    }
                  }
                },
                legend: {
                  display: true
                },
                tooltips: {
                  enabled: false
                }
              }
            });


        // DEMO Code: not relevant to example
        function change_gauge(chart, label, data){
          chart.data.datasets.forEach((dataset) => {
            if(dataset.label == label){
              dataset.data = data;
            }
          });
          chart.update();
        }

        var accelerating = false;
        function accelerate(){
          accelerating = false;
          window.setTimeout(function(){
            change_gauge(chart,"Gauge",[20,140])
          }, 1000);

          window.setTimeout(function(){
            change_gauge(chart,"Gauge",[60,140])
          }, 2000);

          window.setTimeout(function(){
            change_gauge(chart,"Gauge",[100,100])
          }, 3000);

          window.setTimeout(function(){
            change_gauge(chart,"Gauge",[180,20])
          }, 4000);

          window.setTimeout(function(){
            change_gauge(chart,"Gauge",[200,0])
          }, 5000);
        }

        // Start sequence
        accelerate();
        window.setInterval(function(){
          if(!accelerating){
            acelerating = true;
            accelerate();
          }
        }, 6000);
      </script>


    <!-- END Line Chart Functions -->

    <script type="text/javascript">
      var myVar = setInterval(showHint, 4000);
      var valores;

      function showHint() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var str = this.responseText;
                valores = str.split("-");
            }
        };
        xmlhttp.open("GET", "getHint.php", true);
        xmlhttp.send();

      //var valueT = parseInt(valores[0],10);
      var valueT = parseFloat(valores[0]);
      $("#temperatura-gauge").dxCircularGauge({
        rangeContainer: {
          offset: 10,
          ranges: [
            { startValue: 10, endValue: 50, color: '#41A128' },
            { startValue: 50, endValue: 100, color: '#2DD700' }
          ]
        },
        scale: {
          startValue: 0,  endValue: 100,
          majorTick: { tickInterval: 10 },
          label: {
            format: 'number'
          }
        },
        title: {
          text: valueT + '°',
          subtitle: 'Actual',
          position: 'top-center'
        },
        tooltip: {
          enabled: true,
          format: 'number',
          customizeText: function (arg) {
            return 'Actual ' + arg.valueText;
          }
        },
        subvalueIndicator: {
          type: 'textCloud',
          format: 'thousands',
          text: {
            format: 'degrees',
            customizeText: function (arg) {
              return 'Meta ' + arg.valueText;
            }
          }
        },
        value: valueT,
        //subvalues: [825]
      });


      //var valueR = parseInt(valores[1],10);
      var valueR = parseFloat(valores[1]);
      $("#humedad-gauge").dxCircularGauge({
        rangeContainer: {
          offset: 10,
          ranges: [
            { startValue: 10, endValue: 50, color: '#41A128' },
            { startValue: 50, endValue: 100, color: '#2DD700' }
          ]
        },
        scale: {
          startValue: 0,  endValue: 100,
          majorTick: { tickInterval: 10 },
          label: {
            format: 'number'
          }
        },
        title: {
          text: valueR + '%',
          subtitle: 'Actual',
          position: 'top-center'
        },
        tooltip: {
          enabled: true,
          format: 'number',
          customizeText: function (arg) {
            return 'Actual ' + arg.valueText;
          }
        },
        subvalueIndicator: {
          type: 'textCloud',
          format: 'thousands',
          text: {
            format: 'number',
            customizeText: function (arg) {
              return 'Meta ' + arg.valueText;
            }
          }
        },
        value: valueR,
        //subvalues: [825]
      });

      }
    </script>
</body>
</html>
