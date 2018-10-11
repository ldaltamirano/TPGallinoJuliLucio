<?php
require 'autoload.php';
//Instanciamos a la clase auth y eliminamos la session que se encuentra activa mediante el metodo logout
$auth = new Auth;
$auth->logout();
header('Location: login.php');