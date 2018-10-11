<?php
    header('Content-Type: application/json; charset=utf-8');

    require '../autoload.php';

    $noti = new News;
    $notis = $noti->all();
    //print_r($notis);
    echo json_encode($notis);