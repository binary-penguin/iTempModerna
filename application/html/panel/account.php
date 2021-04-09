
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
            <div class="container-fluid">
                <div>
                    <h1>Cuenta</h1>
                </div>
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 col-xl d-flex text-center">
                            <div class="card flex-fill">
                                <div class="card-body">
                                    <svg id="pp" class="pp" data-jdenticon-value="<?=$_SESSION['PP']?>" width="180" height="180" onclick="launchModal();"></svg>
                                    <br>
                                    <img id="r1">
                                    <h3><?=$_SESSION['NAME']?></h3>
                                    <br>
                                    <h5 class="card-title bold-h5">Número de empleado: <?=$_SESSION['USER']?></h5>
                                    <h5 class="card-title bold-h5">Correo: <?=$_SESSION['MAIL']?></h5>
                                    <?php if($_SESSION['TYPE']==="master"):?>
                                        <input type="button" name="admin" class="btn btn-primary m-3" value="Administrar cuentas" onclick="document.location.href='master'"/>
                                    <?php endif;?>
                                    <input type="button" name="password" class="btn btn-danger m-3" value="Modificar datos personales" onclick="document.location.href='user'"/>
                                    <?php if($_SESSION['TYPE']==="master"):?>
                                        <input type="button" name="signup" class="btn btn-primary m-3" value="Agregar usuario" onclick="document.location.href='signup'"/>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>
            </div>
        </main>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="bt-modal">Launch Modal</button>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">&iexcl;Escoge tu foto de perfil&excl;</h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?=URL?>account/changePicture" method="POST">
                            <div class="container-fluid">
                                <br><br>
                                <div class="row text-center">
                                    <div class="col-sm-12 col-md-5 mx-auto">
                                        <h3 class="d-inline">Imagen de Perfil Actual</h3>
                                        <svg class="d-inline" data-jdenticon-value="<?=$_SESSION['PP']?>" width="200" height="200"></svg>
                                        
                                        <br><br>
                                    </div>
                                    <div class="col-sm-12 col-md-5 mx-auto" id="wrapper">
                                        <h3 class="d-inline">Nueva Imagen de Perfil</h3>
                                        <svg id="n_pp"  data-jdenticon-value="<?=$_SESSION['PP']?>" width="200" height="200"></svg>           
                                        <br><br>
                                        <button type="button" class="btn btn-dark" onclick="generatePP();">Generar</button>
                                        <input type="text" id="str_new" class="d-none" name="new-pp" value=""/>
                                    </div>
                               </div>
                            </div>
                            <br><br>     
                </div>
                <div class="modal-footer mx-auto">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Mantener Imagen Actual</button>
                    <button type="submit" id="b_image" name="b-image" class="btn btn-warning" disabled>Guardar Nueva Imagen</button>
                </div>
                </form>  
                
                </div>
            </div>
        </div>
        
    </div>
    </div>
    <script src="<?=URL?>public/js/app.js"></script>
    <script src="<?= URL?>public/js/contra.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/jdenticon@3.1.0/dist/jdenticon.min.js" async integrity="sha384-VngWWnG9GS4jDgsGEUNaoRQtfBGiIKZTiXwm9KpgAeaRn6Y/1tAFiyXqSzqC8Ga/" crossorigin="anonymous">
    </script>
    
    
    <script src='<?=URL?>public/js/jquery-3.6.0.js'></script>
       <script src='<?=URL?>public/js/image-picker.js'></script>
       <script>
            function generatePP() {
                // Enable submit btn

                document.getElementById("b_image").removeAttribute("disabled");

                // Generate random str and assign it to jdenticon
                var str = Math.random().toString(36).substr(2, 3);
                jdenticon.update("#n_pp", str);
                document.getElementById("str_new").removeAttribute("value");
                document.getElementById("str_new").setAttribute("value", str);
     

            }
        
            
        </script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js' integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0' crossorigin='anonymous'></script>

   
    </body>
</html>