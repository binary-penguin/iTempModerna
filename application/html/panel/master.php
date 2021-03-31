            <script>

            function loadLocations() {
                <?php  if (isset($locations)): ?>
                    <?php foreach ($locations as $location): ?>
                        document.getElementById("<?= $location['cve_ubicacion']?>").setAttribute('checked', 'checked');
                    <?php endforeach; ?>
                <?php endif;?>
            }

            function habilitarPermisos() {
                document.getElementById("b_mod").disabled = false;

                var elements = document.getElementById("f_ubicaciones").elements;

                for (var i = 0, element; element = elements[i++];) {
                    if (element.type === "checkbox")
                        element.disabled = false;
                }
            }
               

            </script>

            
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
                <main class="content">

                
                    <div class="container-fluid">
                        <div>
                            <h1>Administrar Cuentas</h1>
                        </div>
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-12 col-xl d-flex text-center">
                                    <div class="card flex-fill">
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-3 col-xl-3">
                                                        <i class="feather-lg text-primary" data-feather="key"></i>
                                                        <h3>Cambiar Contraseña</h3>
                                                        <br>
                                                    </div>
                                                </div>

                                            <h3><?=$db_name?></h3>
                                            <h5 class="card-title bold-h5">Número de empleado: <?=$user?></h5>
                                            <br>
                                            <form action="<?php echo URL?>master/update" method="POST">
                                                <h5 class="bold-h5">Nueva contraseña</h5>
                                                <input type="password" name="c_contra" class="campo-psw" id="c_contra" />
                                                <br>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="checkbox" name="mostrar_contra" class="campo-psw" onclick="mostrar()"/>
                                                        <p class="card-text mostrar-txt mt-2 d-inline" >Mostrar contraseña</p>
                                                    </div>
                                                </div>
                                                <br>
                                                <h5 class="bold-h5">Vuelva a introducir la contraseña</h5>
                                                <input type="password" name="c_contra2" class="campo-psw" id="c_contra2" />
                                                <br>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="checkbox" name="mostrar_contra" class="campo-psw" onclick="mostrar()"/>
                                                        <p class="card-text mostrar-txt mt-2 d-inline" >Mostrar contraseña</p>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <input type="text" value="<?=$user?>" class="d-none" name="t_user"/>
                                                <input type="submit" name="b_cambiar_contra" class="btn btn-danger" value="Cambiar contraseña" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl d-flex text-center">
                                    <div class="card flex-fill">
                                        <div class="card-body">
                                            <div class="row">
                                                    <div class="col-md-12 col-lg-3 col-xl-3">
                                                        <i class="feather-lg text-primary" data-feather="eye-off"></i>
                                                        <h3>Cambiar Permisos</h3>
                                                        <br>
                                                    </div>
                                            </div>
                                            <h3><?=$db_name?></h3>
                                            <h5 class="card-title bold-h5">Número de empleado: <?=$user?></h5>
                                            <br>
                                            <form name="permisos" action="<?= URL?>master/update" method="POST" id="f_ubicaciones">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="campo">Mofesa Navojoa PROFACE X</p>
                                                        
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="checkbox" name="planta[]" value="cjrz194960019" id="cjrz194960019" disabled/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="campo">VIGILANCIA PIRINEOS PROFACE XTD</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="checkbox" name="planta[]" value="ckjb201760199"  id="ckjb201760199" disabled/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="campo">Producción Pirineos PROFACE XTD</p>      
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="checkbox" name="planta[]" value="ckjb201760210" id="ckjb201760210" disabled/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="campo">MOSUSA Vigilancia PROFACE XTD</p>
                                                        
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="checkbox" name="planta[]" value="ckjb202360417" id="ckjb202360417" disabled/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="campo">Entrada pastas Mexicali SPEEDFACE TD</p>
                                                        
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="checkbox" name="planta[]" value="ckjf201860194" id="ckjf201860194" disabled/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="campo">Planta "A" González Ortega SPEEDFACE</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="checkbox" name="planta[]" value="ckjf202560083" id="ckjf202560083" disabled/>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="campo">Planta "B" Leandro Valle SPEEDFACE TD</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="checkbox" name="planta[]" value="ckjf202060537" id="ckjf202060537" disabled/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="campo">Pasta en sobre SPEEDFACE TD</p>
                                                    </div>
                                                    <div class="col-6">
                                                    <input type="checkbox" name="planta[]" value="ckjf202060559" id="ckjf202060559" disabled/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="campo">CEDI Palmillas SPEEDFACE TD</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="checkbox" name="planta[]" value="ckjf202060575" id="ckjf202060575" disabled/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="campo">Papeles SPEEDFACE TD</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="checkbox" name="planta[]" value="ckjf202460678" id="ckjf202460678" disabled/>
                                                    </div>
                                                </div>
                                                <div class="pt-3">
                                                        <div class="row">
                                                            <div class="col-12 mx-auto">
                                                                <input type="text" value="<?=$user?>" class="d-none" name="t_user"/>
                                                                <input type="button" name="b_guardar" class="btn btn-primary m-3" value="Modificar" onclick="habilitarPermisos()"/>
                                                                <input type="submit" name="b_cambiar_ubi" class="btn btn-danger m-3" value="Guardar" id="b_mod" disabled />
                                                            </div>
                                                        </div>           
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="bt-modal">Launch Modal</button>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">&iexcl;Lo sentimos!</h3>
                </div>
                <div class="modal-body">
                    <p id="txt-modal" class="txt-modal"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close">Entendido</button>
                </div>
                </div>
            </div>
        </div>

        

        <script>loadLocations();</script>
        <script src="<?=URL?>public/js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    </body>
</html>

<?php if ((isset($match)) && ($match == 0)): ?>
<script> document.getElementById("txt-modal").innerText = "<?= $message; ?>" </script>
<script>document.getElementById("bt-modal").click();</script>
<?php endif ?>
