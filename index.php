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
	<div>
		<h1>Pase login</h1>
	</div>
</body>
</html>