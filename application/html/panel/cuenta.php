
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
                                    <input type="button" name="admin" class="btn btn-primary m-3" value="Administrar cuentas" onclick="document.location.href='master'"/>
                                    <input type="button" name="password" class="btn btn-primary m-3" value="Cambiar contraseña" onclick="document.location.href='user'"/>
                                    <input type="button" name="signup" class="btn btn-primary m-3" value="Agregar usuario" onclick="document.location.href='signup'"/>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>
            </div>
        </main>
    </div>

        <script src="<?=URL?>public/js/app.js"></script>
    </body>
</html>