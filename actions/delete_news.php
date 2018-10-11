<?php
    require '../autoload.php';
    
    $news = new News;
    $news->delete($_GET['id']);

    //header('Location: index.php');