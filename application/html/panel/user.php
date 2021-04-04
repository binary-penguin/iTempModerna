
    <script>
    function loadLocations() {
        <?php  if (isset($locations)): ?>
            <?php foreach ($locations as $location): ?>
                document.getElementById("<?= $location['cve_ubicacion']?>").setAttribute('checked', 'checked');
            <?php endforeach; ?>
        <?php endif;?>
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
                <div class="container-fluid">
                    <div>
                        <h1>Modificar datos</h1>
                    </div>
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12 col-xl d-flex text-center">
                                <div class="card flex-fill">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 col-xl-3">
                                                <i class="feather-lg text-primary" data-feather="mail"></i>
                                                <h3>Nuevo correo electrónico</h3>
                                                <br>
                                            </div>
                                        </div>
                                        <h3><?=$_SESSION['NAME']?></h3>
                                        <h5 class="card-title bold-h5">Número de empleado: <?=$_SESSION['USER']?></h5>
                                        <br>
                                        <form action="<?php echo URL?>user/update" method="POST">
                                            <h5 class="bold-h5">Nuevo correo</h5>
                                            <input type="mail" id="mail" name="mail" class="campo-psw" required>
                                            <br>
                                            <br>
                                            <br>
                                            <h5 class="bold-h5">Vuelva a introducir el correo</h5>
                                            <input type="mail" id="confirm_mail" name="confirm_mail" class="campo-psw" title="Los correos no coinciden" required>
                                            <br>
                                            <br>
                                            <br>
                                            <input type="submit" name="b_cambiar_mail" class="btn btn-danger" value="Cambiar correo electrónico" />
                                            <br><br><br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl d-flex text-center">
                                <div class="card flex-fill">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 col-xl-3">
                                                <i class="feather-lg text-primary" data-feather="key"></i>
                                                <h3>Nueva Contraseña</h3>
                                                <br>
                                            </div>
                                        </div>
                                        <h3><?=$_SESSION['NAME']?></h3>
                                        <h5 class="card-title bold-h5">Número de empleado: <?=$_SESSION['USER']?></h5>
                                        <br>
                                        <form action="<?php echo URL?>user/update" method="POST">
                                            <h5 class="bold-h5">Nueva contraseña</h5>
                                            <input type="password" id="psw" name="psw" class="campo-psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="" required>
                                            <br>
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="checkbox" name="mostrar_contra" onclick="mostrar(document.getElementById('psw'));"/>
                                                    <p class="card-text mostrar-txt mt-2 d-inline" >Mostrar contraseña</p>
                                                </div>
                                            </div>
                                            <br>
                                            <h5 class="bold-h5">Vuelva a introducir la contraseña</h5>
                                            <input type="password" id="confirm_password" name="confirm_password" class="campo-psw" title="" required>
                                            <br>
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="checkbox" name="mostrar_contra" onclick="mostrar(document.getElementById('confirm_password'));"/>
                                                    <p class="card-text mostrar-txt mt-2 d-inline" >Mostrar contraseña</p>
                                                </div>
                                            </div>
                                            <div id="message">
                                                <p id="letter" class="invalid">1 Letra <b>minúscula</b></p>
                                                <p id="capital" class="invalid">1 Letra <b>mayúscula</b></p>
                                                <p id="number" class="invalid">1 Dígito <b> numérico</b></p>
                                                <p id="length" class="invalid">Y ser mayor a <b>8 caracteres</b></p>
                                            </div>
                                            <br>
                                            <input type="submit" name="b_cambiar_contra" class="btn btn-danger" value="Cambiar contraseña" />
                                            <br><br><br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <script>
        var password = document.getElementById("psw"),
            confirm_password = document.getElementById("confirm_password");

        var mail = document.getElementById("mail");
            confirm_mail = document.getElementById("confirm_mail");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Contraseñas no coinciden");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        function validateMail() {
            if (mail.value != confirm_mail.value) {
                confirm_mail.setCustomValidity("Correos no coinciden");
            }
            else{
                confirm_mail.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
        mail.onchange = validateMail;
        confirm_mail.onkeyup = validateMail;
        var myInput = document.getElementById("psw");
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

    <script src="<?=URL?>public/js/app.js"></script>
    <script src="<?= URL?>public/js/contra.js"></script> 
</body>

</html>

<?php if ((isset($permission)) && ($permission == 1)): ?>
<script> document.getElementById("txt-modal").innerText = "<?= $message; ?>" </script>
<script>document.getElementById("bt-modal").click();</script>
<?php endif ?>