
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
                                <a class="dropdown-item" href="<?=URL?>home/logout">Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content">
                <div class="container-fluid">
                    <div>
                        <h1>Cambio de contraseña</h1>
                    </div>
                    <div class="container-fluid p-0">
                        <div class="row">
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
                                            <input type="password" id="psw" name="psw" class="campo-psw-user" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="" required>
                                            <br>
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="checkbox" name="mostrar_contra" onclick="mostrar(document.getElementById('psw'));"/>
                                                    <p class="card-text mostrar-txt mt-2 d-inline" >Mostrar contraseña</p>
                                                </div>
                                            </div>
                                            <br>
                                            <h5 class="bold-h5">Vuelva a introducir la contraseña</h5>
                                            <input type="password" id="confirm_password" name="confirm_password" class="campo-psw-user" title="" required>
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
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    
    <script>
        var password = document.getElementById("psw"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Favor de revisar contraseña");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
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