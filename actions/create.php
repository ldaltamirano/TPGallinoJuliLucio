<?php
require 'autoload.php';
//Instanciamos la clase News y enviamos los datos al metodo crear(), el cual recibe los datos e inyecta en la base de datos los datos.
$noti = new News;
$noti->create($_POST);

header('Location: index.php');