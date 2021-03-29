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

                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                                    <span class="text-dark"><?=$user?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="cuenta.html"><i class="align-middle mr-1" data-feather="user"></i>Cuenta</a>
                                    <a class="dropdown-item" href="#">Cerrar sesión</a>
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
                                                <h3 class="mb-2"><?=$today_entries?></h3>
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
                                                <i class="feather-lg text-success" data-feather="thermometer"></i>
                                            </div>
                                            <div class="media-body">
                                                <h3 class="mb-2"><?=$todayG_avg_temp ?> ºC</h3>
                                                <div class="mb-0">Temperatura promedio</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-12 col-lg-6 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <span class="badge badge-warning float-right">Semanal</span>
                                        <h5 class="card-title mb-0">Temperatura promedio</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart chart-lg">
                                            <canvas id="chartjs-dashboard-scatter"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-12 col-lg-6 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <span class="badge badge-warning float-right">Hoy</span>
                                        <h5 class="card-title mb-0">Distribuci&oacute;n de temperaturas</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="media">
                                            <canvas id="chartjs-dashboard-pie"></canvas>
                                        </div>
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Estado</th>
                                                    <th class="text-right">Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><i class="fas fa-square-full text-primary"></i> Bajos</td>
                                                    <td class="text-right"><?=$totalN_low_temps?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-square-full text-success"></i> Normales</td>
                                                    <td class="text-right"><?=$totalN_avg_temps?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-square-full text-danger"></i> Altos</td>
                                                    <td class="text-right"><?=$totalN_hi_temps?></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td class="text-right"><?=$totalN_hi_temps?></td>
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
        <script src="<?= URL?>public/js/settings.js"></script>
        <script src="<?= URL?>public/js/app.js"></script>
        <script>
            $(function () {
                new Chart(document.getElementById("chartjs-dashboard-scatter").getContext("2d"), {
                    type: "scatter",
                    data: {
                        datasets: [
                            {
                                label: "Temperaturas promedio ultima semana",

                                data: [
                                    {
                                        x: "Lunes",
                                        y: 35.7,
                                    },
                                    {
                                        x: "Lunes",
                                        y: 36,
                                    },
                                    {
                                        x: 2,
                                        y: 35.2,
                                    },
                                    {
                                        x: 3,
                                        y: 36.5,
                                    },
                                    {
                                        x: 4,
                                        y: 38,
                                    },
                                    {
                                        x: 5,
                                        y: 38.2,
                                    },
                                    {
                                        x: 6,
                                        y: 35.5,
                                    },
                                ],
                            },
                        ],
                    },
                    options: {
                        scales: {
                            xAxes: [
                                {
                                    type: "linear",
                                    position: "bottom",
                                },
                            ],
                        },
                    },
                });
                // Line chart
            });
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
                                data: [<?=$totalN_hi_temps?>, <?=$totalN_avg_temps?>, <?=$totalN_low_temps?>],
                                backgroundColor: [window.theme.danger, window.theme.success, window.theme.primary, "#E8EAED"],
                                borderColor: "transparent",
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