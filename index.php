<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SIGETP - Sistema Integrado de Información y Documentación Geoestadística y Tecnopolítica</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/sigetp-reportes/tools/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/sigetp-reportes/css/Montserrat.css">
        <link rel="stylesheet" href="/sigetp-reportes/css/style.css">
        <script src="/sigetp-reportes/tools/jquery/jquery-3.1.1.min.js"></script>
        <script src="/sigetp-reportes/tools/bootstrap/js/bootstrap.min.js"></script>
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
                    <a class="navbar-brand" href="/sigetp-reportes/index.php" title="Sistema Integrado de Información y Documentación Geoestadística y Tecnopolítica">SIGETP</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Importar Datos</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Manual</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid bg-3 text-center">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-xs-4">Consejo Comunal</label>
                        <div class="col-xs-3">
                            <select class="form-control" id="id_consejo_comunal" name="consejo_comunal">
                            <?php
                                $mysqli = new mysqli("localhost", "root", "123", "sigetp");
                                $sql= "select * from consejo_comunal";
                                $resultado= $mysqli->query($sql);
                                //echo "<option value=''>Seleccione...</option>";
                                while($fila = $resultado->fetch_array(MYSQLI_NUM))
                                {
                                    echo "<option value='$fila[0]'>".$fila[1]."</option>";
                                }
                                $mysqli->close();
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-3 text-center">
            <div class="row">
                <div class="col-xs-6">
                    <button class="btn" style="width:300px;height:100px;" onclick="location='grafico-1.php?id='+$('#id_consejo_comunal').val()">Población de Hombres y Mujeres</button>
                </div>
                <div class="col-xs-6">
                    <button class="btn" style="width:300px;height:100px;" onclick="location='vivienda/index.php'">Preguntas Referentes a la Vivienda</button>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-3 text-center">
            <div class="row">
                <div class="col-xs-6">
                    <button class="btn" style="width:300px;height:100px;" onclick="location='grupo_familiar/index.php'">Preguntas Referentes al Grupo Familiar</button>
                </div>
                <div class="col-xs-6">
                    <button class="btn" style="width:300px;height:100px;" onclick="location='individuos/index.php'">Preguntas Referentes a los Individuos</button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Importar Datos</h4>
                    </div>
                    <div class="modal-body">
                        <p>Esto exportará todos los datos que están registrados en la aplicación y luego los elimina.</p>
                        <p>Asegurese de tener todos los datos correctamente.<p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="location='exportar_datos/index.php'">Exportar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer text-center">
            <div class="container">
                <p>Sistema Integrado de Información y Documentación Geoestadística y Tecnopolítica - SIGETP</p>
                <p>Centro Nacional de Desarrollo e Investigacion en Tecnologias Libres - CENDITEL</p>
            </div>
        </footer>
    </body>
</html>
