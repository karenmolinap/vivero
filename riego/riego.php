<?php
  require '../abre_sesion.php';
  require '../conexion_bd.php';

  // Obtener historial del programa de riego
  $query = "SELECT * FROM riego";
  $historial = getDatos($query,$conexion);

  $hora = 0;
  $dia = '';
  $duracion = 0;

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
    <input type="hidden" id="tempHidden" name="tempHidden" value=<?php echo $temperatura; ?>>
    <input type="hidden" id="humeHidden" name="humeHidden" value=<?php echo $humedad; ?>>
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
                        <a href="../index.php">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="riego.php">
                            <i class="material-icons">spa</i>
                            <span>Riego</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="../cerrar_sesion.php">
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
        <div class="block-header">
            <h2>RIEGO</h2>
        </div>
        <!-- Line Chart -->
        <div class="row clearfix">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="header">
                <div class="row clearfix">
                  <div class="col-xs-12 col-sm-6">
                    <h2>Horario de riego</h2>
                  </div>
                  <div class="col-xs-12 col-sm-6 align-right">
                    <!--HERE-->
                  </div>
                </div>
              </div>

              <!--Tabla de reigo-->
              <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">

                <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Horas/Días</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Lunes</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Martes</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Miércoles</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Jueves</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Viernes</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Sábado</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Domingo</th>
                </tr>
                </thead>
                <tbody>

                  <?php
                    $dias_semana = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
                    $cont = 1;
                    $cont2 = 0;
                    for ($i=1; $i <= 24; $i++) {
                      echo "<tr> <th> {$cont}:00 </th>";
                      $cont +=1;
                      $hora = $cont;
                      for ($j=0; $j < 7; $j++) {
                        $dia = $dias_semana[$j];
                        if($historial){
                          foreach ($historial as $dato) {
                            $hora_aux = $cont - 1;
                            if($dato["hora"] == $hora_aux && $dato["dia"] == $j){

                                $cont2 = 1;
                                echo "<td>
                                <button type=\"button\" id=\"".$i.".".$j."\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#exampleModal\">" . $dato["duracion"]. "min" . "</button>
                                </td>";
                            }
                          }
                        }

                        if($cont2 == 0){
                          echo "<td>
                          <button type=\"button\" id=\"".$i.".".$j."\" class=\"btn btn-primary\" data-toggle=\"modal\" name=". $dia . $hora_aux ." value=". $dia . $hora_aux ." data-target=\"#exampleModal\" >0min</button>
                          </td>";
                        }else{
                          $cont2 = 0;
                        }
                      }
                      echo "</tr>";
                    }
                 ?>
              <!--   -->
              </tbody>
                <tfoot>
                <!--<tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>-->
                </tfoot>
              </table>
              <!--END Tabla de riego -->
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

</body>
</html>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-fw fa-calendar-plus-o"></i> Escojer Tiempo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="myForm" method="post" >
        <div class="form-group">
          <label>Duración en minutos:</label>
          <select id="duracion_se" name="duracion_se">
            <option value="0">-- Selecione duración --</option>
            <?php for ($h=1; $h <= 60; $h++) {
              echo "<option value='$h' >$h</option>";
            } ?>
          </select>

        </div>

      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="myFormSubmit" class="btn btn-primary" type="submit" name="materia"  data-dismiss="modal">Guardar</button>
      </div>
      <?php
        if(isset($_POST['submit']) || isset($_POST['materia'])){
          $duracion = $_POST["duracion_se"];
          $query = "INSERT INTO riego (hora, dia, duracion) ($hora, '$dia', $duracion);";
          echo $query;
          $agregar = iquery($conexion,$query);
          redirect('riego.php');
        }else{}
       ?>
    </div>
  </div>
</div>
<script type="text/javascript" src="script.js"></script>
