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
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="http://amestris.me/viverosrc/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="http://amestris.me/viverosrc/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="http://amestris.me/viverosrc/css/themes/all-themes.css" rel="stylesheet" />

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
                      <label>Dia<input type="checkbox" id="realtime" checked></label>
                      <label>Semana<input type="checkbox" id="realtime" ></label>
                      <label>Mes<input type="checkbox" id="realtime" ></label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="chartjs-wrapper">
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

    <script type="text/javascript">
      function comparePeriods() {

          /*
          labels: array of days to show in the xAxes, you can build it like: labels: ['period1day1#period2day2', 'period1day2#period2day2']...
          values_first: period 1 values of every day in the labels array
          values_second: period 2 values of every day in the labels array
          */
          data = JSON.parse('{"labels":["09\/01\/2018#02\/01\/2018","10\/01\/2018#03\/01\/2018","11\/01\/2018#04\/01\/2018","12\/01\/2018#05\/01\/2018","13\/01\/2018#06\/01\/2018","14\/01\/2018#07\/01\/2018","15\/01\/2018#08\/01\/2018"],"values_first":[190,128,59.5,171,66,102,132],"values_second":[342.81,752,1336.5,1999.07,1989.07,36,204]}');

          var ctx = document.getElementById('chartjs-line').getContext('2d');
          var lineChart = new Chart(ctx, {
            type: 'line',
            data: {

              labels: data.labels,
              datasets: [{

                type: 'line',
                borderColor: "#E25F5F",
                label: 'Period 1',
                data: data.values_first,
                borderWidth: 3,
                xAxisID: "x-axis-1",

              },

              {

                type: 'line',
                borderColor: "#2793DB",
                label: 'Period 2',
                data: data.values_second,
                borderWidth: 3,
                xAxisID: "x-axis-2",

              },


              ]

            },

            options: {
              tooltips: {
                mode: 'index',
                intersect: true
              },
              scales: {
                xAxes: [{
                  display: true,
                  tipe: "time",
                  scaleLabel: {
                    display: true,
                    labelString: 'Period 1'
                  },
                  time: {
                    displayFormats: {
                      'day': 'MMM DD',
                      'week': 'MMM DD',
                      'month': 'MMM DD',
                      'quarter': 'MMM DD',
                      'year': 'MMM DD',
                    }
                  },
                  id: "x-axis-1",
                  ticks:{
                    callback:function(label) {

                      var label = label.split("#")[0];
                      return label;

                    }
                  }
                },
                {
                  display: true,
                  tipe: "time",
                  id: "x-axis-2",
                  scaleLabel: {
                    display: true,
                    labelString: 'Period 2'

                  },
                  id: "x-axis-2",
                  ticks:{
                    callback:function(label) {

                      var label = label.split("#")[1];
                      return label;

                    }
                  }
                }

                ],
                yAxes: [{
                  display: true,
                  scaleLabel: {
                    display: true,
                    labelString: 'Totale'
                  },
                  ticks: {
                    callback: function(value, index, values) {

                      return value.toLocaleString("de-DE",{style:"currency", currency:"EUR"});

                    }
                  }
                }]
              }
            }

          });

        }
        comparePeriods();
        /*
        // y 軸的顯示
            var yAxis= ['0:00-1:00','1:00-2:00','2:00-3:00','3:00-4:00','4:00-5:00','5:00-6:00',
                        '6:00-7:00','7:00-8:00','8:00-9:00','9:00-10:00', '10:00-11:00', '11:00-12:00',
                        '12:00-13:00', '13:00-14:00', '14:00-15:00', '15:00-16:00', '16:00-17:00','17:00-18:00',
                        '18:00-19:00', '19:00-20:00', '20:00-21:00', '21:00-22:00', '22:00-23:00', '23:00-00:00'];
            // 資料集合，之後只要更新這個就好了。
            var datas=[];
            var ctx = document.getElementById('chartjs-line').getContext('2d');
            var lineChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels:yAxis,
                datasets: [{
                  label: '測試資料',
                  data: datas,
                  backgroundColor: "rgba(0,148,255,0.6)"
                }]
              }
            });


            //時間格式
            var timeFormat = 'HH:mm:ss';

            function appendData()
            {
                //超過10 個，就把最早進來的刪掉
                if(yAxis.length>10){
                    yAxis.shift();
                    datas.shift();
                }

                //推入y 軸新的資料
                yAxis.push(new moment().format(timeFormat));

                //推入一筆亂數進資料
                datas.push(Math.floor(Math.random() *100) + 1);

                //更新線圖
                lineChart.update();
            }

            //每秒做一次
            setInterval(appendData,1000);
            */


          </script>

          <script type="text/javascript">
        // Create chart
        var ctx = document.getElementsByClassName("chartjs-gauge");
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
