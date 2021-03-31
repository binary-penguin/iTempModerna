<?php
// Start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= URL?>public/css/login.css">
    <link rel="stylesheet" type="text/css" href="<?= URL?>public/css/footer.css">
    <link rel="icon" href="<?= URL?>public/img/image-naranja.png">
    
    <title>Inicio</title>
  </head>
  <body>
    
    <div class="container-fluid">
        <div class="header row text-center">
            <div class="col-12 my-auto">
                <img src="<?= URL ?>public/img/moderna2.png" class="img-fluid img-thumbnail logo mt-5">
            </div>
        </div>
    </div>
    <div class="container-fluid general mt-4">
        <form name="login" method="POST" action="<?= URL ?>login/auth">
            <div class="main_content">
                <div class="row">
                    <div class="col-l-12 mt-5 pt-5" align="center">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Accede a iTemp</h5>
                                <p class="card-text text">Usuario/Correo</p>
                                <input  type="text" name="c_usuario" class="campo" required
                                        maxlength = 30>
                                <p class="card-text mt-2">Contraseña</p>
                                <input type="password" name="c_contra" class="campo" id="c_contra" required>
                                <div class="row mb-5">
                                    <div class="col-4 text-end">
                                        <input  type="checkbox" name="mostrar_contra" onclick="mostrar()" class="mt-1"
                                                maxlength = 30>
                                    </div>
                                    <div class="col-8 text-start">
                                        <p class="card-text tx-passw">Mostrar contraseña</p>
                                    </div>
                                </div>
                                <input type="submit" name="submit_user" class="boton shadow p-1 mb-3 rounded" value="Enviar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="bt-modal">Launch Modal</button>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">&iexcl;Lo sentimos!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="txt-modal"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Contacta a Soporte IT</button>
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close">Entendido</button>
            </div>
            </div>
        </div>
    </div>
    <footer class="mainfooter" role="contentinfo">
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <i class="align-middle my-auto" data-feather="thermometer"></i>
                        <h1>iTemp</h>
                    </div>
                    <div class="col-6 text-end">
                        <h4>Ligas de interes:</h4>
                        <ul class="list-unstyled">
                            <li><a href="<?= URL?>team">>Nuestro equipo</a></li>
                            <li><a href="<?= URL?>csv">>Agrega registros CSV</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 copy">
                        <p class="text-center">© Copyright 2021 - Grupo La Moderna.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
   
    <!-- Option 1: Bootstrap Bundle with Popper/ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="<?= URL?>public/js/contra.js"></script> 
  </body>
</html>
<?php if ((isset($auth)) && ($auth == 0)): ?>
        <script> document.getElementById("txt-modal").innerText = "<?= $message; ?>" </script>
        <script>launchModal();</script>
<?php endif ?>
