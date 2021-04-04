
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
                    <h1>Cuenta</h1>
                </div>
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 col-xl d-flex text-center">
                            <div class="card flex-fill">
                                <div class="card-body">
                                    <svg id="pp" class="rounded-circle pp" data-jdenticon-value="pipipupucheck" width="180" height="180" onclick="launchModal();"></svg>
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
                <form action="<?=URL?>account/picture" method="POST">
                        <div class="container-fluid align-items-center">
                            <select class="image-picker" name="img-selected">
                                    <option data-img-src="https://drive.google.com/uc?export=view&id=1b_udoMtsboGIrBJh-9uIQrIgEExS8NAX" selected>
                                        https://drive.google.com/uc?export=view&id=1b_udoMtsboGIrBJh-9uIQrIgEExS8NAX</option>
                                    <option data-img-src="https://drive.google.com/uc?export=view&id=1LbEfVq-RdRKNHD4NjUNHFPpythGJSorf">
                                        https://drive.google.com/uc?export=view&id=1LbEfVq-RdRKNHD4NjUNHFPpythGJSorf</option>
                                    <option data-img-src="https://drive.google.com/uc?export=view&id=1w6l0-RfOn5KzskAEGEezObidu12CFdSS">
                                        https://drive.google.com/uc?export=view&id=1w6l0-RfOn5KzskAEGEezObidu12CFdSS</option>
                                    <option data-img-src="https://drive.google.com/uc?export=view&id=1PQkfch_L9pzgh5Sy7sK0yo1IwVn5pJg4">
                                        https://drive.google.com/uc?export=view&id=1PQkfch_L9pzgh5Sy7sK0yo1IwVn5pJg4</option>
                                    <option data-img-src="https://drive.google.com/uc?export=view&id=1pwCp_WoieUwVDd3pW7BA5YIvVF2SfJYx">
                                        https://drive.google.com/uc?export=view&id=1pwCp_WoieUwVDd3pW7BA5YIvVF2SfJYx</option>
                                    <option data-img-src="https://drive.google.com/uc?export=view&id=1sHz3ti1JMuK77ARDS6oUp5-K3L4FMatD">
                                        https://drive.google.com/uc?export=view&id=1sHz3ti1JMuK77ARDS6oUp5-K3L4FMatD</option>
                                    <option data-img-src="https://drive.google.com/uc?export=view&id=17AN545jqldzvLFSbGvNxKRN6-g4d49-L">
                                        https://drive.google.com/uc?export=view&id=17AN545jqldzvLFSbGvNxKRN6-g4d49-L</option>
                                    <option data-img-src="https://drive.google.com/uc?export=view&id=1eIuh1TKbljULUwIwVL_KhuQZJJMoF7vG">
                                        https://drive.google.com/uc?export=view&id=1eIuh1TKbljULUwIwVL_KhuQZJJMoF7vG</option>
                                    <option data-img-src="https://drive.google.com/uc?export=view&id=14nepZgEy5nbs7Wfhxq9hQ0Fy5_a8WL31">
                                        https://drive.google.com/uc?export=view&id=14nepZgEy5nbs7Wfhxq9hQ0Fy5_a8WL31</option>
                            </select>
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" name="b-image" class="btn btn-warning" >Guardar</button>
                </div>
                </form>
                </div>
            </div>
        </div>
        
    </div>
    </div>
    <script>

        var mySVG    = document.querySelector('pp'),      // Inline SVG element
            tgtImage = document.querySelector('r1'),      // Where to draw the result
            can      = document.createElement('canvas'), // Not shown on page
            ctx      = can.getContext('2d'),
            loader   = new Image;                        // Not shown on page

        loader.width  = can.width  = tgtImage.width;
        loader.height = can.height = tgtImage.height;
        loader.onload = function(){
        ctx.drawImage( loader, 0, 0, loader.width, loader.height );
        tgtImage.src = can.toDataURL();
        };
        var svgAsXML = (new XMLSerializer).serializeToString( mySVG );
        loader.src = 'data:image/svg+xml,' + encodeURIComponent( svgAsXML );
    
    </script>
    <script src="<?=URL?>public/js/app.js"></script>
    <script src="<?= URL?>public/js/contra.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/jdenticon@3.1.0/dist/jdenticon.min.js" async integrity="sha384-VngWWnG9GS4jDgsGEUNaoRQtfBGiIKZTiXwm9KpgAeaRn6Y/1tAFiyXqSzqC8Ga/" crossorigin="anonymous">
    </script>
    
    
    <script src='<?=URL?>public/js/jquery-3.6.0.js'></script>
       <script src='<?=URL?>public/js/image-picker.js'></script>
       <script>
        $(function() {
            // initial configuration of the plugin
            $("select").imagepicker();
            // re-sync the plugin
            $("select").data('picker').sync_picker_with_select();
        });
        </script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js' integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0' crossorigin='anonymous'></script>

   
    </body>
</html>