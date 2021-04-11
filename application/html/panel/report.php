            <div class="main">
                <nav class="navbar navbar-expand navbar-light bg-white">
                    <a class="sidebar-toggle d-flex mr-2">
                        <i class="hamburger align-self-center"></i>
                    </a>
                    <form class="form-inline d-none d-inline-block" action="<?= URL?>master/findUser" method="POST">
                        <input name="b_search" class="form-control form-control-no-border mr-sm-2" type="text" placeholder="Buscar usuario/correo..." aria-label="Search" />
                    </form>

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
                    <center>
                        <div>
                            <h1>Reporte Personalizado</h1>
                        </div>
                        <div class="container-fluid">
                            <form action="" name="request" method="GET">
                                <div class="row">
                                    <input  type="checkbox" value="dia" name="check[]" />
                                    <h5>Dia</h5>
                                </div>
                                <select name="f1" id="s1">
                                    <option value="none" selected="none">Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                <div class="row">
                                    <input type="checkbox" value="mes" name="check[]" />
                                    <h5>Mes</h5>
                                </div>
                                <select name="f2" id="s2">
                                    <option value="none" selected="none">Select</option>
                                    <option value="1">ENERO</option>
                                    <option value="2">FEBRERO</option>
                                    <option value="3">MARZO</option>
                                    <option value="4">ABRIL</option>
                                    <option value="5">MAYO</option>
                                    <option value="6">JUNIO</option>
                                    <option value="7">JULIO</option>
                                    <option value="8">AGOSTO</option>
                                    <option value="9">SEPTIEMPRE</option>
                                    <option value="10">OCTUBRE</option>
                                    <option value="11">NOVIEMBRE</option>
                                    <option value="12">DICIEMBRE</option>
                                </select>
                                <div class="row">
                                    <input  type="checkbox" value="ano" name="check[]" />
                                    <h5>Año</h5>
                                </div>
                                <select name="f3" id="s3">
                                    <option value="none" selected="none">Select</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                </select>
                                <div class="row">
                                    <input  type="checkbox" value="tem" name="check[]" />
                                    <h5>Temperatura</h5>
                                </div>
                                <select name="f4" id="s4">
                                    <option value="none" selected="none">Select</option>
                                    <option value="nominal">Normal</option>
                                    <option value="advisory">Consultiva</option>
                                    <option value="caution">Alta</option>
                                    <option value="warning">Peligrosa</option>
                                </select>
                                <div class="row">
                                    <input  type="checkbox" value="loc" name="check[]" />
                                    <h5>Localidad</h5>
                                </div>
                                <select name="f5" id="s5">
                                    <option value="none" selected="none">Select</option>
                                    <option value="cjrz194960019">Mofesa Navojoa PROFACE X</option>
                                    <option value="ckjb201760199">VIGILANCIA PIRINEOS PROFACE XTD</option>
                                    <option value="ckjb201760210">Producción Pirineos PROFACE XTD</option>
                                    <option value="ckjb202360417">MOSUSA Vigilancia PROFACE XTD</option>
                                    <option value="ckjf201860194">Entrada pastas Mexicali SPEEDFACE TD</option>
                                    <option value="ckjf202560083">Planta "A" González Ortega SPEEDFACE</option>
                                    <option value="ckjf202060537">Planta "B" Leandro Valle SPEEDFACE TD</option>
                                    <option value="ckjf202060559">Pasta en sobre SPEEDFACE TD</option>
                                    <option value="ckjf202060575">CEDI Palmillas SPEEDFACE TD</option>
                                    <option value="ckjf202460678">Papeles SPEEDFACE TD</option>
                                </select>

                                <br>
                                <br>
                                <br>
                                <input type="submit" name="submit" value="Buscar">
                                <br>
                                <br>
                                <br>
                                <br>
                            </form>

                            <div class="row align-items-center">
                                <div class="col-12">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td>Empleado</td>
                                                <td>Nombre del empleado</td>
                                                <td>Temperatura</td>
                                                <td>Fecha de la marca</td>
                                                <td>Hora de la marca</td>
                                                <td>Localidad</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <input id="buscar" type="text" class="form-control" placeholder="Escriba algo para filtrar" />
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(isset($_GET['submit'])){
                                                require 'application/models/reportModel.php'; 
                                                $structure->display(); 
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="button" name="b_generar_pdf" class="btn btn-outline-secondary" value="Generar PDF" onclick="window.print();return false;" />
                        </div>
                    </center>
                </main>
            </div>
        </div>

        <script src="js/app.js"></script>
        <script>
            $(function () {
                // Line chart
                new Chart(document.getElementById("chartjs-dashboard-line"), {
                    type: "line",
                    data: {
                        labels: ["07/03", "08/03", "09/03", "10/03", "11/03", "12/03", "13/03"],
                        datasets: [
                            {
                                label: "Temperaturas",
                                fill: true,
                                backgroundColor: "transparent",
                                borderColor: window.theme.primary,
                                data: [35, 36, 34, 35, 35, 36, 37],
                            },
                        ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false,
                        },
                        tooltips: {
                            intersect: false,
                        },
                        hover: {
                            intersect: true,
                        },
                        plugins: {
                            filler: {
                                propagate: false,
                            },
                        },
                        scales: {
                            xAxes: [
                                {
                                    reverse: true,
                                    gridLines: {
                                        color: "rgba(0,0,0,0.05)",
                                    },
                                },
                            ],
                            yAxes: [
                                {
                                    ticks: {
                                        stepSize: 500,
                                    },
                                    display: true,
                                    borderDash: [5, 5],
                                    gridLines: {
                                        color: "rgba(0,0,0,0)",
                                        fontColor: "#fff",
                                    },
                                },
                            ],
                        },
                    },
                });
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
                                data: [17, 70, 3],
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
        <script type="text/javascript">
            var textbuscar = document.getElementById("buscar");
            textbuscar.onkeyup = function () {
                buscar(this);
            };
            function buscar(inputbuscar) {
                var valorabuscar = inputbuscar.value.toLowerCase().trim();
                var tabla_tr = document.getElementById("tabla").getElementsByTagName("tbody")[0].rows;
                for (var i = 0; i < tabla_tr.length; i++) {
                    var tr = tabla_tr[i];
                    var textotr = tr.innerText.toLowerCase();
                    tr.className = textotr.indexOf(valorabuscar) >= 0 ? "mostrar" : "ocultar";
                }
            }
        </script>
    </body>
</html>
