<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>iTemp</title>
        
        <link rel="stylesheet" href="css/general.css" />
        <link rel="stylesheet" type="text/css" href="css/estilos.css" />
        <script src="js\settings.js"></script>
        <script type="text/javascript" src="js/contra.js"></script>
        <link rel="icon" href="imagenaranja.png">

        <style>
            p, input {
                display: inline-block !important;
            }

            .mostrar-txt {
                margin-left: 3%;
            }

        </style>
    </head>

    <body>
        <div class="wrapper">
            <nav id="sidebar" class="sidebar">
                <div class="sidebar-content">
                    <a class="sidebar-brand" href="index.html">
                        <i class="align-middle" data-feather="thermometer"></i>
                        <span class="align-middle" id="main-title">iTemp Moderna</span>
                    </a>

                    <ul class="sidebar-nav">
                        <li class="sidebar-header">Explora</li>

                        <li class="sidebar-item">
                            <a href="#dashboards" data-toggle="collapse" class="sidebar-link"> <i class="align-middle" data-feather="sliders"></i> <span class="align-middle s-title">Gráficas</span> </a>
                            <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="general.html">
                                        General
                                        <span class="sidebar-badge badge badge-info">224</span>
                                    </a>
                                </li>
                                <li class="sidebar-item"><a class="sidebar-link" href="por_persona.html">Por persona</a></li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="pirineos1.html">Pirineos I <span class="sidebar-badge badge badge-primary">100</span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="pirineos1.html">
                                        Pirineos II
                                        <span class="sidebar-badge badge badge-primary">95</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="pirineos1.html">
                                        Pirineos III
                                        <span class="sidebar-badge badge badge-primary">25</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="pirineos1.html">
                                        Pirineos IIII
                                        <span class="sidebar-badge badge badge-primary">108</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#pages" data-toggle="collapse" class="sidebar-link collapsed"> <i class="align-middle" data-feather="layout"></i> <span class="align-middle s-title">Reportes</span></a>
                            <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="tablas.html">Temperaturas Altas <span class="sidebar-badge badge badge-primary">Hoy</span></a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="tablas.html">Temperaturas Medias <span class="sidebar-badge badge badge-primary">Hoy</span></a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="tablas.html">Temperaturas Bajas <span class="sidebar-badge badge badge-primary">Hoy</span></a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="tablas.html">Temperaturas Altas <span class="sidebar-badge badge badge-primary">Semanal</span></a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="tablas.html">Temperaturas Medias <span class="sidebar-badge badge badge-primary">Semanal</span></a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="tablas.html">Temperaturas Bajas <span class="sidebar-badge badge badge-primary">Semanal</span></a>
                                </li>

                                <li class="sidebar-item"><a class="sidebar-link" href="tablas.html">Personalizado</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main">
                <nav class="navbar navbar-expand navbar-light bg-white">
                    <a class="sidebar-toggle d-flex mr-2">
                        <i class="hamburger align-self-center"></i>
                    </a>
                    <form class="form-inline d-none d-inline-block">
                        <input class="form-control form-control-no-border mr-sm-2" type="text" placeholder="Buscar usuario..." aria-label="Search" />
                    </form>

                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                                    <i class="align-middle" data-feather="settings"></i>
                                </a>

                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                                    <span class="text-dark">112255 Jemuel Flores</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="cuenta.html"><i class="align-middle mr-1" data-feather="user"></i>Cuenta</a>
                                    <a class="dropdown-item" href="#">Cerrar sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="row" align="center">
                    <div class="col-lg-5 col-sm-12 pt-5 account-card">
                        <div class="card">
                            <center>
                                <h1 class="card-header">Cuenta</h1>
                            </center>
                            <div class="card-body">
                                <h1>Jemuel Flores</h1>
                                <h5 class="card-title">Número de empleado: 542001</h5>
                                <h5>Nueva contraseña</h5>
                                <form action="<?php echo URL?>master/update" method="POST">
                                <input type="password" name="c_contra" class="campo-psw" id="c_contra" />
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="mostrar_contra" class="campo-psw" onclick="mostrar()"/>
                                        <p class="card-text mostrar-txt mt-2" >Mostrar contraseña</p>
                                    </div>
                                    
                                </div>
                                <br><br>
                                <input type="submit" name="b_cambiar_contra" class="btn btn-danger" value="Cambiar contraseña" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-12 pt-5">
                        <form name="permisos">
                            <div class="card">
                                <center>
                                    <h1 class="card-header">Permisos</h1>
                                </center>
                                <div class="card-body">
                                    <h5 class="card-title">Número de empleado: 542001</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="campo">Mofesa Navojoa PROFACE X</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" class="mt-1" name="planta2">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="campo">VIGILANCIA PIRINEOS PROFACE XTD</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" class="mt-1" name="planta2">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="campo">Producción Pirineos PROFACE XTD</p>
                                        </div>
                                        <div class="col-6">
                                           <input type="checkbox" class="mt-1" name="planta3">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="campo">MOSUSA Vigilancia PROFACE XTD</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" class="mt-1" name="planta4">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="campo">Entrada pastas Mexicali SPEEDFACE TD</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" class="mt-1" name="planta5">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="campo">Planta 'A' González Ortega SPEEDFACE</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" class="mt-1" name="planta6">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="campo">Planta 'B' Leandro Valle SPEEDFACE TD</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" class="mt-1" name="planta7">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="campo">Pasta en sobre SPEEDFACE TD</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" class="mt-1" name="planta7">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="campo">CEDI Palmillas SPEEDFACE TD</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" class="mt-1" name="planta7">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="campo">Papeles SPEEDFACE TD</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" class="mt-1" name="planta7">

                                        </div>
                                    </div>
                                    <div class="pt-5">
                                        <center>
                                            <input type="button" name="b_agregar" class="btn btn-primary" value="Guardar" />
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="js\app.js"></script>
    </body>
</html>

