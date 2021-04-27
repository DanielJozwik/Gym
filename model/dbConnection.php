<?php
    $ip = "51.83.186.186";
    $dbname = "gym";
    $port = "3306";
    $user = "root";
    $password = "haslo";
    
    try
    {
        $db = new PDO("mysql:host=$ip;dbname=$dbname;port=$port", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    }
    catch (PDOException $e)
    {
        echo "Błąd: ".$e->getMessage();
    }
?>