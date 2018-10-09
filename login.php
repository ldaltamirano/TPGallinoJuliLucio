<?php
require 'autoload.php';
$auth = new Auth;
$buffer = file_get_contents('php://input');
$usuario = json_decode($buffer,true);
if($usuario['user'] != "" && SHA1($usuario['pass']) != "") {
    if($auth->login($usuario['user'], SHA1($usuario['pass']))) {
        echo json_encode([
            'status' => 1,
            'data' => [
                'user' => $usuario['user'],
                'password' 	 => SHA1($usuario['pass'])
            ]
        ]);
    } else {
        $_SESSION['error'] = "Los datos ingresados no coinciden con ningún usuario registrado. Por favor, revisá la información y probá nuevamente.";
        //$_SESSION['input-error'] = $_POST;
        // Session::flash('error', 'blah blah');
        echo json_encode([
            'status' => 0,
            'data' => [
                'error' => 'Usuario y/o password incorrectos.'
            ]
        ]);
    }
} else {
    $_SESSION['error'] = "No se han ingresado datos. Escribi los datos y probá nuevamente.";
    // Session::flash('error', 'blah blah');
    echo json_encode([
        'status' => 0,
        'data' => [
            'error' => 'No se ingresaron datos.'
        ]
    ]); 
}