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
                                    <a class="dropdown-item" href="<?=URL?>account"><i class="align-middle mr-1" data-feather="user"></i>Cuenta</a>
                                    <a class="dropdown-item" href="<?=URL?>login">Cerrar sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main class="content">

                
                    <div class="container-fluid">
                        <div>
                            <h1>Agregar Cuentas</h1>
                        </div>
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-12 col-xl d-flex text-center">
                                    <div class="card flex-fill">
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-3 col-xl-3">
                                                        <i class="feather-lg text-secondary" data-feather="user-plus"></i>
                                                        <h3>Datos Personales</h3>
                                                        <br>
                                                    </div>
                                                </div>                                           
                                            <br>
                                            <form action="<?php echo URL?>signup/addUser" method="POST">
                                                <h5 class="bold-h5">Número de Empleado</h5>
                                                <input type="text" name="e_number" class="campo-psw" onclick="clearMsg();"/>
                                                <p id="msg" class="prompt"></p>
                                        
                                                <h5 class="bold-h5">Correo</h5>
                                                <input type="mail" name="mail" class="campo-psw" onclick="clearMsg();"/>
                                                <p id="msg2" class="prompt"></p>

                                                <h5 class="bold-h5">Tipo</h5>
                                                <select name="c_tipo"  class="campo-psw">
                                                                <option value="regular" selected>Regular</option>
                                                                <option value="master">Master</option>
                                                </select>
                    
                                                <br><br>

                                                <h5 class="bold-h5">Contraseña</h5>
                                                <input type="password" id="c_contra" name="c_contra" class="campo-psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="" required>
                                                <br>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="checkbox" name="mostrar_contra" onclick="mostrar();"/>
                                                        <p class="card-text mostrar-txt mt-2 d-inline" >Mostrar contraseña</p>
                                                    </div>
                                                </div>
                                                <div id="message">
                                                    <p id="letter" class="invalid">1 Letra <b>minúscula</b></p>
                                                    <p id="capital" class="invalid">1 Letra <b>mayúscula</b></p>
                                                    <p id="number" class="invalid">1 Dígito <b> numérico</b></p>
                                                    <p id="length" class="invalid">Y ser mayor a <b>8 caracteres</b></p>
                                                </div>
                                                <br><br>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-12 col-xl d-flex text-center">
                                                    <div class="card flex-fill">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                    <div class="col-md-12 col-lg-3 col-xl-3">
                                                                        <i class="feather-lg text-secondary" data-feather="eye"></i>
                                                                        <h3>Establecer Permisos</h3>
                                                                        <br>
                                                                    </div>
                                                            </div>
                                                            <br>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="campo">Mofesa Navojoa PROFACE X</p>
                                                                        
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="checkbox" name="planta[]" value="cjrz194960019" id="cjrz194960019"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="campo">VIGILANCIA PIRINEOS PROFACE XTD</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="checkbox" name="planta[]" value="ckjb201760199"  id="ckjb201760199"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="campo">Producción Pirineos PROFACE XTD</p>      
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="checkbox" name="planta[]" value="ckjb201760210" id="ckjb201760210"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="campo">MOSUSA Vigilancia PROFACE XTD</p>
                                                                        
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="checkbox" name="planta[]" value="ckjb202360417" id="ckjb202360417"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="campo">Entrada pastas Mexicali SPEEDFACE TD</p>
                                                                        
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="checkbox" name="planta[]" value="ckjf201860194" id="ckjf201860194"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="campo">Planta "A" González Ortega SPEEDFACE</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="checkbox" name="planta[]" value="ckjf202560083" id="ckjf202560083"/>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="campo">Planta "B" Leandro Valle SPEEDFACE TD</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="checkbox" name="planta[]" value="ckjf202060537" id="ckjf202060537"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="campo">Pasta en sobre SPEEDFACE TD</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                    <input type="checkbox" name="planta[]" value="ckjf202060559" id="ckjf202060559"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="campo">CEDI Palmillas SPEEDFACE TD</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="checkbox" name="planta[]" value="ckjf202060575" id="ckjf202060575"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="campo">Papeles SPEEDFACE TD</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="checkbox" name="planta[]" value="ckjf202460678" id="ckjf202460678"/>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <input type="submit" name="b_add" class="btn btn-outline-secondary" value="Añadir Usuario"/>
                                            </form>
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
        
        <script>
            var myInput = document.getElementById("c_contra");
            var letter = document.getElementById("letter");
            var capital = document.getElementById("capital");
            var number = document.getElementById("number");
            var length = document.getElementById("length");
            myInput.onfocus = function() {
                document.getElementById("message").style.display = "block";
            }
            myInput.onblur = function() {
                document.getElementById("message").style.display = "none";
            }
            myInput.onkeyup = function() {
                var lowerCaseLetters = /[a-z]/g;
                if (myInput.value.match(lowerCaseLetters)) {
                    letter.classList.remove("invalid");
                    letter.classList.add("valid");
                } else {
                    letter.classList.remove("valid");
                    letter.classList.add("invalid");
                }
                var upperCaseLetters = /[A-Z]/g;
                if (myInput.value.match(upperCaseLetters)) {
                    capital.classList.remove("invalid");
                    capital.classList.add("valid");
                } else {
                    capital.classList.remove("valid");
                    capital.classList.add("invalid");
                }
                var numbers = /[0-9]/g;
                if (myInput.value.match(numbers)) {
                    number.classList.remove("invalid");
                    number.classList.add("valid");
                } else {
                    number.classList.remove("valid");
                    number.classList.add("invalid");
                }
                if (myInput.value.length >= 8) {
                    length.classList.remove("invalid");
                    length.classList.add("valid");
                } else {
                    length.classList.remove("valid");
                    length.classList.add("invalid");
                }
            }
        </script>
        <script>
            function clearMsg(){
                //if php variable is !false (permission != false)
                document.getElementById("msg").innerHTML = "";
            }
        </script>
        <script>
            function state(){
                //if php variable is !false (permission != false)
                var data = <?php echo $permission; ?>;
                var match = <?php echo $match; ?>;
                if(data==0){
                    document.getElementById("msg").innerHTML = "*Este empleado ya esta asociado a una cuenta con correo: <?= $db_mail; ?>";
                }
                else if(data==1){
                    document.getElementById("msg2").innerHTML = "*Este correo ya esta asociado al número de empleado: <?= $db_user; ?>";
                }
                if(match==0){
                    document.getElementById("msg").innerHTML = "*Ese numero de empleado no existe, favor de verificarlo";
                }
            }    
        </script>
        
        <script>state();</script>
        <script>loadLocations();</script>
        <script src="<?=URL?>public/js/app.js"></script>
        <script src="<?= URL?>public/js/contra.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    </body>
</html>

<?php if ((isset($match)) && ($match == 0)): ?>
<script> document.getElementById("txt-modal").innerText = "<?= $message; ?>" </script>
<script>document.getElementById("bt-modal").click();</script>
<?php endif ?>
