<?php
header('Content-Type: application/json; charset=utf-8');

require '../autoload.php';

// Leemos todas las Películas.
$cat = new Category;
$cats = [];
$cats = $cat->getAll();

echo json_encode([
	'status' => 1,
	'categorias' => $cats
]);