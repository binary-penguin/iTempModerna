<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?= URL?>public/css/error.css" />

</head>


<body style="overflow: hidden;">
	<div id="notfound">
		<div class="notfound">
            <img src="<?= URL?>public/img/image-err404.png" width="70%" height="70%">
            <div></div>
			<div class="notfound-404">
				<div></div>
				<h1>404</h1>
			</div>
			<h2>Página no existente</h2>
			<p>Tomaste la sopa equivocada...</p>
            <?php if(isset($_SESSION["USER"])):?>
			    <a href="<?=URL?>general">Regresar A General</a>
            <?php endif;?>
            <?php if(!isset($_SESSION["USER"])):?>
                <a href="<?=URL?>">Regresar A Inicio</a>
            <?php endif;?>
		</div>
	</div>

</body>
</html>
