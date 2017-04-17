<?php
    $mysqli = new mysqli("localhost", "root", "123", "sigetp");
    $sql = 'SELECT * FROM persona ORDER BY id DESC';
    $h = 6;
    $m = 4;
    $total = 10;
    foreach ($mysqli->query($sql) as $row)
    {
        if( $row['sexo'] == 'H' )
            $h++;
        else
            $m++;
        $total++;
    }
    if ($total != 0)
    {
        $hombres= ($h/$total)*100;
        $mujeres= ($m/$total)*100;
    }
    else
    {
        $hombres= 0;
        $mujeres= 0;
    }
    $mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SIGETP - Sistema Integrado de Información y Documentación Geoestadística y Tecnopolítica</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/sigetp-reportes/tools/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/sigetp-reportes/tools/DataTables-1.10.13/media/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="/sigetp-reportes/css/Montserrat.css">
        <link rel="stylesheet" href="/sigetp-reportes/css/style.css">
        <script src="/sigetp-reportes/tools/jquery/jquery-3.1.1.min.js"></script>
        <script src="/sigetp-reportes/tools/bootstrap/js/bootstrap.min.js"></script>
        <script src="/sigetp-reportes/tools/chart.js/Chart.min.js"></script>
        <script src="/sigetp-reportes/tools/DataTables-1.10.13/media/js/dataTables.bootstrap.min.js"></script>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/sigetp-reportes/index.html" title="Sistema Integrado de Información y Documentación Geoestadística y Tecnopolítica">SIGETP</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Manual</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container"> <!-- container -->
            <div class="row">
                <h3>Muestra la población de hombres y mujeres de la comunidad</h3>
            </div>
            <div class="row">
                <center>
                    <canvas id="chart-grafico" width="500px" height="400px"></canvas>
                </center>
            </div>
            <div class="row">
                <p>Total de personas en la comunidad: <?php echo $total ?> </p>
                <p>Total de Hombres: <?php echo $h ?> </p>
                <p>Total de Mujeres: <?php echo $m ?> </p>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer text-center">
            <div class="container">
                <p>Sistema Integrado de Información y Documentación Geoestadística y Tecnopolítica - SIGETP</p>
                <p>Centro Nacional de Desarrollo e Investigacion en Tecnologias Libres - CENDITEL</p>
             </div>
        </footer>
        <script>
        var data = {
            labels: [
                "Hombres",
                "Mujeres",
            ],
            datasets: [
                {
                    data: [<?php echo $hombres; ?>, <?php echo $mujeres; ?>],
                    backgroundColor: [
                        "#F49AC2",
    	                "#C23B22",
                    ]
                }]
        };
        var ctx = document.getElementById("chart-grafico").getContext("2d");
        var myPieChart = new Chart(ctx,{
                type: 'pie',
                data: data,
                options: {
                    responsive: false,
                    title: {
                        display: true,
                        text: "Población de Hombres y Mujeres"
                    },
                legend: {
                    position: 'right',
                    labels: {
                        usePointStyle: true
                    }
                }
            }
        });
        </script>
    </body>
</html>
