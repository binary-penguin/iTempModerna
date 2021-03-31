<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="<?= URL?>public/css/estilos.css" />
        <script src="<?= URL?>public/js/contra.js"></script>

        <title>Sign up</title>
        <style>
            .prompt{
	            font-size:small;
                color:#F00;
            }

        </style>
        <script>
        function clearMsg(){
                //if php variable is !false (permission != false)
                document.getElementById("msg").innerHTML = "";
            }
        </script>
    </head>
    <body>
        <div class="header container-fluid pt-5" align="center">
            <div class="borde_imagen">
                <img src="img/moderna2.png" class="logo" />
            </div>
        </div>
        <form name="signup" action="<?=URL?>signup/send" method="POST">
            <div class="main_content">
                <div class="row">
                    <div class="col-l-12 pt-5" align="center">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Registrarme</h5>
                                <p class="card-text">Número de empleado</p>
                                <input type="text" name="e_number" class="campo" onclick="clearMsg();"/>
                                <p id="msg" class="prompt"></p>
                                
                                <p class="card-text">Correo</p>
                                <input type="email" name="mail" class="campo"/>
                                <p id="msg2" class="prompt"></p>

                                <p class="card-text">Contraseña</p>
                                <input type="password" id="pv" name="psw" class="campo" />
                                <div class="row">
                                    <div class="col-3" align="rigth">
                                        <input type="checkbox" id="c_contra" onclick="mostrar()" />
                                    </div>
                                    <div class="col-9" align="left">
                                        <p class="card-text">Mostrar contraseña</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <p class="card-text">Tipo</p>
                                    </div>
                                    <div class="col-9">
                                        <select name="c_tipo">
                                            <option value="regular" selected>Regular</option>
                                            <option value="master">Master</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="card-text">Permisos</p>
                                <div class="row">
                                    <div class="col-2">
                                        <input type="checkbox" name="planta[]" value="cjrz194960019" />
                                    </div>
                                    <div class="col-10">
                                        <p class="card-text options">Mofesa Navojoa PROFACE X</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <input type="checkbox" name="planta[]" value="ckjb201760199" />
                                    </div>
                                    <div class="col-10">
                                        <p class="card-text options">VIGILANCIA PIRINEOS PROFACE XTD</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <input type="checkbox" name="planta[]" value="ckjb201760210" />
                                    </div>
                                    <div class="col-10">
                                        <p class="card-text options">Producción Pirineos PROFACE XTD</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <input type="checkbox" name="planta[]" value="ckjb202360417" />
                                    </div>
                                    <div class="col-10">
                                        <p class="card-text options">MOSUSA Vigilancia PROFACE XTD</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <input type="checkbox" name="planta[]" value="ckjf201860194" />
                                    </div>
                                    <div class="col-10">
                                        <p class="card-text options">Entrada pastas Mexicali SPEEDFACE TD</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <input type="checkbox" name="planta[]" value="ckjf202060537" />
                                    </div>
                                    <div class="col-10">
                                        <p class="card-text options">Planta "B" Leandro Valle SPEEDFACE TD</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <input type="checkbox" name="planta[]" value="ckjf202060559" />
                                    </div>
                                    <div class="col-10">
                                        <p class="card-text options">Pasta en sobre SPEEDFACE TD</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <input type="checkbox" name="planta[]" value="ckjf202060575" />
                                    </div>
                                    <div class="col-10">
                                        <p class="card-text options">CEDI Palmillas SPEEDFACE TD</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <input type="checkbox" name="planta[]" value="ckjf202460678" />
                                    </div>
                                    <div class="col-10">
                                        <p class="card-text options">Papeles SPEEDFACE TD</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <input type="checkbox" name="planta[]" value="ckjf202560083" />
                                    </div>
                                    <div class="col-10">
                                        <p class="card-text options">Planta "A" González Ortega SPEEDFACE</p>
                                    </div>
                                </div>
                                <input type="submit" name="b_submit" value="Registrarme" class="boton" onclick="state()"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        -->
        <script>
            function state(){
                //if php variable is !false (permission != false)
                var data = <?php echo $permission; ?>;
                var match = <?php echo $match; ?>;
                if(data==0){
                    document.getElementById("msg").innerHTML = "*Este numero de empleado ya esta asociado a una cuenta con correo: <?= $db_mail; ?>";
                }
                else if(data==1){
                    document.getElementById("msg2").innerHTML = "*Este correo ya esta asociado a una cuenta con numero de empleado: <?= $db_user; ?>";
                }
                if(match==0){
                    document.getElementById("msg").innerHTML = "*Ese numero de empleado no existe, favor de verificarlo";
                }
            }
            
        </script>
        <script>state();</script>
        
    </body>
</html>