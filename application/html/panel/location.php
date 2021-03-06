<div class="main">
                <nav class="navbar navbar-expand navbar-light bg-white">
                    <a class="sidebar-toggle d-flex mr-2">
                        <i class="hamburger align-self-center"></i>
                    </a>
                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                                    <i class="align-middle" data-feather="chevron-down"></i>
                                </a>
                                <svg data-jdenticon-value="<?=$_SESSION['PP']?>" width="50" height="50"></svg>
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
                        <h1><?= utf8_encode($current_name);?></h1>
                        <h5><?= utf8_encode($current_cve);?></h5>         
                        <br>    
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
                                                <h3 class="mb-2"><?=$current_entries?></h3>
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
                                                <?php if(($current_average >= 36) && ($current_average <= 37)): ?>
                                                    <i class="feather-lg text-success" data-feather="thermometer"></i>
                                                    <?php $alert="(Normal)";?>
                                                <?php endif;?>
                                                <?php if($current_average < 36): ?>
                                                    <i class="feather-lg text-primary" data-feather="thermometer"></i>
                                                    <?php $alert="(Baja)";?>
                                                <?php endif;?>
                                                <?php if($current_average > 37): ?>
                                                    <i class="feather-lg text-danger" data-feather="thermometer"></i>
                                                    <?php $alert="(Alta)";?>
                                                <?php endif;?>
                                                
                                            </div>
                                            <div class="media-body">
                                                <h3 class="mb-2"><?=$current_average?>°C</h3>
                                                <div class="mb-0">Temperatura promedio <?=$alert?></div>
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
                                            <canvas width=400px height="200" id="chartjs-dashboard-pie"></canvas>
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
                                                    <td class="text-right"><?=$current_low?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-square-full text-success"></i> Normales (36°C - 37°C)</td>
                                                    <td class="text-right"><?=$current_normal?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-square-full text-danger"></i> Altos (> 37°C)</td>
                                                    <td class="text-right"><?=$current_high?></td>
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
                <script src="https://cdn.jsdelivr.net/npm/jdenticon@3.1.0/dist/jdenticon.min.js" async integrity="sha384-VngWWnG9GS4jDgsGEUNaoRQtfBGiIKZTiXwm9KpgAeaRn6Y/1tAFiyXqSzqC8Ga/" crossorigin="anonymous"></script>


        

        

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
                        labels: [
                                    [ "Altos", "",
                                    <?php if (isset($array_high)): ?>
                                        <?php foreach ($array_high as $registry):?>
                                            "<?=ucwords(strtolower(utf8_encode($registry[0])))?> <?=$registry[1]?>°C",
                                        <?php endforeach;?>
                                    <?php endif;?>
                                    ],
                                    [ "Normales", "",
                                    <?php if (isset($array_normal)): ?>
                                        <?php foreach ($array_normal as $registry):?>
                                            "<?=ucwords(strtolower(utf8_encode($registry[0])))?> <?=$registry[1]?>°C",
                                        <?php endforeach;?>
                                    <?php endif;?>
                                    ],
                                    [ "Bajos", "",
                                    <?php if (isset($array_low)): ?>
                                        <?php foreach ($array_low as $registry):?>
                                            "<?=ucwords(strtolower(utf8_encode($registry[0])))?> <?=$registry[1]?>°C",
                                        <?php endforeach;?>
                                    <?php endif;?>
                                    ],
                                
                                ],
                        datasets: [
                            {
                                data: ["<?=$current_high?>", "<?=$current_normal?>", "<?=$current_low?>"],
                                backgroundColor: [window.theme.danger, window.theme.success, window.theme.primary],
                                borderColor:"<?=$border?>",
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
