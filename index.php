<?php
    require_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'routing.php';
    $request = $_SERVER['REQUEST_URI'];
    session_start();
    
    routing($request);
?>