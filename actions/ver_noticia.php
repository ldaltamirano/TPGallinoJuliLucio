<?php
header('Content-Type: application/json; charset=utf-8');

require '../autoload.php';

// Leemos todas las Películas.
$noti = new News;
$noti->bringById($_GET['id']);

echo json_encode([
	'status' => 1,
	'noticia' => $noti
]);