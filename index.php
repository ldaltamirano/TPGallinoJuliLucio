<?php 
	require 'autoload.php';

	if(!Auth::isLogged()) {
		header('Location: views/login.php');
		exit;
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>todo Deporte</title>
	<link rel="stylesheet" href="css/estilos.css" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
</head>
<body>
	<main class="container">
		<h1>Todo noticias de deporte</h1>
		<p class="descripcion">
			Aca puede ver todas las noticias cargadas en nuestro sistema
		</p>
		<div class="row">
			<div class="col-xs-2">
				<div class="row">
						<a href="views/crear.php" class="btn btn-primary btn-block right center-block botones">Agregar noticia</a>
				</div>
			</div>
		</div>
		<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Fecha</th>
				<th>Categoria</th>
				<th>Titulo</th>
				<th>Descripcion</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="main-tbody">

		</tbody>
		</table>
		<div class="row">
			<div class="col-xs-2">
				<a href="actions/logout.php" class="btn btn-primary btn-block right center-block botones">Logout</a>
			</div>
		</div>
	</main>

	<script src="js/ajax.js"></script>
    <script src="js/main.js"></script>
</body>
</html>