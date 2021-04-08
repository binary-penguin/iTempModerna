<?php 
// Start session
//session_start();
?>
<!DOCTYPE html>
   <html lang='en'>
   <head>
   <!-- Required meta tags -->
   <meta charset='UTF-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>

   <!-- Bootstrap CSS -->
   <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl' crossorigin='anonymous'>


   <title>Registros csv</title>
   </head>
   <body>
       <section class='container-fluid'>
           <section class='row text-center mt-4'>
           <h1>Agrega .csv con PHP</h1>
           </section>
           <section class='row mt-4'>
               <!-- Widgets here! -->
                <div class="col-6 offset-3 text-center">
                    <form method="POST">
                        <button class='btn btn-primary m-2' name='empleados'>Añadir Registros de Empleados</button>
                        <button class='btn btn-warning m-2' name='lectores'>Añadir Registros de Lectores</button>
                        <button class='btn btn-success m-2' name='marcas'>Añadir Registros de Marcas</button>
                    </form>
                    
                </div>
           </section>
           <section class='row mt-4'>
                    <div class="col-6 offset-3 text-center">
                    <form method="POST">    
                        <button class='btn btn-success m-2' name='marcas2'>Añadir Registros de Marcas2</button>
                        <button class='btn btn-success m-2' name='marcas3'>Añadir Registros de Marcas3</button>
                        <button class='btn btn-success m-2' name='marcas4'>Añadir Registros de Marcas4</button>
                    </form>
           </section>
           <section class='row mt-4'>
                    <div class="col-6 offset-3 text-center">
                    <form method="POST">    
                        <button class='btn btn-success m-2' name='marcas5'>Añadir Registros de Marcas5</button>
                        <button class='btn btn-success m-2' name='marcas6'>Añadir Registros de Marcas6</button>
                        <button class='btn btn-success m-2' name='marcas7'>Añadir Registros de Marcas7</button>
                        <button class='btn btn-success m-2' name='marcas8'>Añadir Registros de Marcas8</button>
                    </form>
           </section>
           
       </section>
       <!-- Bootstrap Bundle with Popper -->
       <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js' integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0' crossorigin='anonymous'></script>
   </body>
   </html>