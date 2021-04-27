<?php
    //=== Dołączanie potrzebnych zmiennych ===

    //Ścieżka do głownego katalogu
    $docRoot = $_SERVER['DOCUMENT_ROOT'];
    //Separator katalogu (dla windows i linux są inne)
    $ds = DIRECTORY_SEPARATOR;
    //Ścieżka do kontrolerów
    $controller =  $docRoot.$ds.'controller'.$ds;
    $views = $docRoot.$ds.'views'.$ds;
    $model = $docRoot.$ds.'model'.$ds;
    //Odebrane URI od clienta 
    //Tytuł dla odpowiedniej strony
    $GLOBALS['title'] = "Title not found";

    //=== Dołączanie potrzebnych plików ===

    //Główny plik z routingiem strony
    require $docRoot.$ds.'model'.$ds.'dbConnection.php';
    //Klasa user
    require $docRoot.$ds.'model'.$ds.'userClass.php';
?>