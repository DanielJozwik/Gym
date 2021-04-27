<?php
    require $views.'header.php';

    if(!isset($_SESSION['loggedUser']))
    {
        header('Location: /login');
    }
    else
    {
        require $views.'klient'.$ds.'zmianadanych.php';
    }

    require $views.'footer.php';
?>