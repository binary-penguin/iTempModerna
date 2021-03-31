
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
                        <span class="text-dark"><?=$_SESSION['NAME']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?=URL?>account"><i class="align-middle mr-1" data-feather="user"></i>Cuenta</a>
                        <a class="dropdown-item" href="<?=URL?>home/logout">Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="content">
            <div class="container-fluid">
                <div>
                    <h1>Cuenta</h1>
                </div>
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 col-xl d-flex text-center">
                            <div class="card flex-fill">
                                <div class="card-body">
                                    <h3><?=$_SESSION['NAME']?></h3>
                                    <h5 class="card-title bold-h5">Número de empleado: <?=$_SESSION['USER']?></h5>
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 pt-5">
                            <a href="master">Administrar cuentas >></a><br />
                            <a href="user">Cambiar contraseña >></a><br>
                            <a href="signup">Dar de alta cuentas >></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

        <script src="<?=URL?>public/js/app.js"></script>
    </body>
</html>