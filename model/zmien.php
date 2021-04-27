<?php
    $myId = unserialize($_SESSION['loggedUser'])->getId();
    $id = $_GET['id'];
    $status = unserialize($_SESSION['loggedUser'])->getStatus();

    if($status == "trener")
    {
        $db->query("UPDATE `activities` SET `accept` = NOT `accept` WHERE `activities`.`id_activities` = $id;");
    }
    header("Location: /klient/grafik/trener");
?>