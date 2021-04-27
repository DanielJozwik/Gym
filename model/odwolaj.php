<?php
    $myId = unserialize($_SESSION['loggedUser'])->getId();
    $id = $_GET['id'];

    $rows = $db->query("DELETE FROM activities WHERE id_activities = $id && (id_customer = $myId OR id_trainer = $myId);");
    if(unserialize($_SESSION['loggedUser'])->getStatus()=="trener")
    {
        header("Location: /klient/grafik/trener");
    }
    else
    {
        header("Location: /klient/grafik");
    }
?>