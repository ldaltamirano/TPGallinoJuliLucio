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
			Completar con texto
		</p>

		<a href="actions/create_noticia.php">Agregar noticia</a>
		<a href="actions/logout.php">Logout</a>
		<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Fecha</th>
				<th>Categoria</th>
				<th>Titulo</th>
				<th>Descripcion</th>
			</tr>
		</thead>
		<tbody id="main-tbody">

		</tbody>
		</table>
	</main>

	<script src="js/ajax.js"></script>
    <script src="js/acciones.js"></script>
    <script src="js/main.js"></script>
</body>
</html>