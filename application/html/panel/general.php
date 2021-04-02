<div class="main">
                <nav class="navbar navbar-expand navbar-light bg-white">
                    <a class="sidebar-toggle d-flex mr-2">
                        <i class="hamburger align-self-center"></i>
                    </a>
                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                                    <i class="align-middle" data-feather="settings"></i>
                                </a>
                                <img class="rounded-circle mr-3 float-end" src="<?=$_SESSION['PP']?>" width="80" height="80">
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                                    <span class="text-dark"><?=$_SESSION['NAME']?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?=URL?>account"><i class="align-middle mr-1" data-feather="user"></i>Cuenta</a>
                                    <a class="dropdown-item" href="<?=URL?>home/logout"><i class="align-middle mr-1" data-feather="log-out"></i>Cerrar sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="content">
                    <div>
                        <h1>Vista General</h1>
                    </div>
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-xl d-flex">
                                <div class="card flex-fill">
                                    <div class="card-body py-4">
                                        <div class="media">
                                            <div class="d-inline-block mt-2 mr-3">
                                                <i class="feather-lg text-warning" data-feather="users"></i>
                                            </div>
                                            <div class="media-body">
                                                <h3 class="mb-2"><?=$_SESSION["CURRENTDATE-ENTRIES"]?></h3>
                                                <div class="mb-0">Ingresos</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-xl d-flex">
                                <div class="card flex-fill">
                                    <div class="card-body py-4">
                                        <div class="media">
                                            <div class="d-inline-block mt-2 mr-3">
                                                <?php if(($_SESSION["AVERAGE-TEMPS"] >= 36) && ($_SESSION["AVERAGE-TEMPS"] <= 37)): ?>
                                                    <i class="feather-lg text-success" data-feather="thermometer"></i>
                                                <?php endif;?>
                                                <?php if($_SESSION["AVERAGE-TEMPS"] < 36): ?>
                                                    <i class="feather-lg text-primary" data-feather="thermometer"></i>
                                                <?php endif;?>
                                                <?php if($_SESSION["AVERAGE-TEMPS"] > 37): ?>
                                                    <i class="feather-lg text-danger" data-feather="thermometer"></i>
                                                <?php endif;?>
                                                
                                            </div>
                                            <div class="media-body">
                                                <h3 class="mb-2"><?=$_SESSION["AVERAGE-TEMPS"]?>°C</h3>
                                                <div class="mb-0">Temperatura promedio</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-6 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <span class="badge badge-primary float-right">Semanal</span>
                                        <h5 class="card-title mb-0">Temperatura promedio</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mx-auto my-auto">
                                            <div id="chart-scatter" class="mx-auto my-auto"></div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <span class="badge badge-primary float-right">Hoy</span>
                                        <h5 class="card-title mb-0">Distribuci&oacute;n de temperaturas</h5>
                                    </div>
                                    <div class="card-body">
                                        <br>
                                        <div class="media">
                                            <canvas id="chartjs-dashboard-pie"></canvas>
                                            <br>
                                        </div>
                                        <br>
                                        <br>
                                        <br>

                                        <table class="table mb-0 mt-2">
                                            <thead>
                                                <tr>
                                                    <th>Estado</th>
                                                    <th class="text-right">Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><i class="fas fa-square-full text-primary"></i> Bajos (< 36°C)</td>
                                                    <td class="text-right"><?=$_SESSION['CURRENTDATE-LOW']?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-square-full text-success"></i> Normales (36°C - 37°C)</td>
                                                    <td class="text-right"><?=$_SESSION['CURRENTDATE-NORMAL']?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-square-full text-danger"></i> Altos (> 37°C)</td>
                                                    <td class="text-right"><?=$_SESSION['CURRENTDATE-HIGH']?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div>
                            <input type="button" name="b_generar_pdf" class="btn btn-outline-secondary" value="Generar PDF" onclick="window.print();return false;" />
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script src="<?=URL?>public/js/app.js"></script>
        <script src="<?=URL?>public/js/plotly.min.js"></script>

        <script>
            function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
            }
            var trace1 = {
            type: 'line',
            mode: 'markers',
            y:[37.5,36.2,38,37.9,36.5,36,37,37.2],
            x:['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'],
            marker: {
                line: {
                    width: 5.5,
                    color: '#f44455'
                }
            }
            };

            var data = [ trace1 ];

            var layout = { autosize: true}; // set autosize to rescale

            var config = {responsive: true}

            Plotly.newPlot('chart-scatter', data, layout, config );


        </script>
        <script>
            $(function () {
                // Pie chart
                new Chart(document.getElementById("chartjs-dashboard-pie"), {
                    type: "pie",
                    data: {
                        labels: ["Altos", "Normales", "Bajos"],
                        datasets: [
                            {
                                data: [<?=$_SESSION['CURRENTDATE-HIGH']?>, <?=$_SESSION['CURRENTDATE-NORMAL']?>, <?=$_SESSION['CURRENTDATE-LOW']?>],
                                backgroundColor: [window.theme.danger, window.theme.success, window.theme.primary, "#E8EAED"],
                                borderColor:
                                <?php if (((($_SESSION['CURRENTDATE-HIGH'] * 100) / $_SESSION['CURRENTDATE-ENTRIES']) !== 100) && ((($_SESSION['CURRENTDATE-NORMAL'] * 100) / $_SESSION['CURRENTDATE-ENTRIES']) !== 100) && ((($_SESSION['CURRENTDATE-LOW'] * 100) / $_SESSION['CURRENTDATE-ENTRIES']) !== 100)) {
                                echo "'" ."#FFFFFF". "'"; 
                                }
                                else { 
                                    echo "'" ."transparent"."'"; 
                                }
                                
                                ?>,
                            },
                        ],
                    },
                    options: {
                        responsive: !window.MSInputMethodContext,
                        maintainAspectRatio: false,
                        legend: {
                            display: false,
                        },
                    },
                });
            });
        </script>
    </body>
</html>
