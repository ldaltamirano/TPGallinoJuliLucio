<?php
    require '../autoload.php';
    
    $news = new News;
    $news->bringById($_GET['id']);
    $news->setDate($_GET['fecha']);
    $news->setTitle($_GET['titulo']);
    $news->setCategory($_GET['categoria']);
    $news->setInformation($_GET['info']);
    //$news->edit($_GET['id']);