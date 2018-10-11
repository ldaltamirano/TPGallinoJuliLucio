<?php
header('Content-Type: application/json; charset=utf-8');

require '../autoload.php';

// Leemos todas las Películas.
$cat = new Category;
$cat->getCategorybyId($_GET['id']);

echo json_encode([
	'status' => 1,
	'noticia' => $cat
]);