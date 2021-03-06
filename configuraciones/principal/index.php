<?php
  $title = "Ventana Principal";
  require "../../head.php";
  require "../../menu.php";
  // require "../../toolbar.php";
?>
<main class="container">
  <div class="row" id="tabla_principal">
  <div class="row">
		<!--<div class="containerForm col-sm-8 col-sm-offset-3 col-md-8 col-md-offset-3 col-lg-6 col-lg-offset-3">-->
		<div class=" col-xs-12 col-md-10 col-md-offset-1">
	 
   <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-primary">
                <div class="card-block p-b-0">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-transparent active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-settings"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                    <h4 class="m-b-0">9.823</h4>
                    <p>Usuarios Conectados</p>
                </div>
                <div class="chart-wrapper p-x-1" style="height:70px;"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="card-chart1" class="chart" height="70" width="216" style="display: block; width: 216px; height: 70px;"></canvas>
                </div>
            </div>
        </div>
        <!--/col-->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-info">
                <div class="card-block p-b-0">
                    <button type="button" class="btn btn-transparent active p-a-0 pull-right">
                        <i class="icon-location-pin"></i>
                    </button>
                    <h4 class="m-b-0">9.823</h4>
                    <p>Cursos Activos</p>
                </div>
                <div class="chart-wrapper p-x-1" style="height:70px;"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="card-chart2" class="chart" height="70" width="216" style="display: block; width: 216px; height: 70px;"></canvas>
                </div>
            </div>
        </div>
        <!--/col-->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-warning">
                <div class="card-block p-b-0">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-transparent active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-settings"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                    <h4 class="m-b-0">9.823</h4>
                    <p>Proximos cursos</p>
                </div>
                <div class="chart-wrapper" style="height:70px;"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="card-chart3" class="chart" height="70" width="248" style="display: block; width: 248px; height: 70px;"></canvas>
                </div>
            </div>
        </div>
        <!--/col-->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-danger">
                <div class="card-block p-b-0">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-transparent active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-settings"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                    <h4 class="m-b-0">9.823</h4>
                    <p>Alumnos aprobados</p>
                </div>
                <div class="chart-wrapper p-x-1" style="height:70px;"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="card-chart4" class="chart" height="70" width="216" style="display: block; width: 216px; height: 70px;"></canvas>
                </div>
            </div>
        </div>
        <!--/col-->
    </div>



<div class="col-sm-6 col-md-4">
            <div class="card">
                <div class="card-header">
                    Card title
                </div>
                <div class="card-block">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card">
                <div class="card-header">
                    Card title
                </div>
                <div class="card-block">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card">
                <div class="card-header">
                    Card title
                </div>
                <div class="card-block">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                </div>
            </div>
        </div>

   
   	</div>
	</div>
</main>

<?php require "../../script.php" ?>  
</body>
</html>
