<?php
header('Content-Type: application/json; charset=utf-8');

require '../autoload.php';

// Leemos todas las Películas.
$peli = new News;
$peli->bringById($_GET['id']);

echo json_encode([
	'status' => 1,
	'data' => $peli
]);