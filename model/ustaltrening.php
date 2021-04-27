<?php
    $myId = unserialize($_SESSION['loggedUser'])->getId();
    $trener = $_GET['trener'];
    $trening = $_GET['trening'];
    $date = "'".$_GET['date'].' '.$_GET['time']."'";
    $idTrenera;
    if($date>= date('d-m-Y'))
    {
    $rows = $db->query("SELECT id FROM users WHERE id = $trener;");
    foreach($rows as $row)
    {
        $idTrenera = $row['id'];
    }

    $rows = $db->query("SELECT * FROM activity_types WHERE type_id = $trening");
    foreach($rows as $row)
    {
        $trening = "'".$row['type']."'";
    }

    $rows = $db->query("INSERT INTO `activities` (`id_activities`, `id_customer`, `id_trainer`, `activity_type`, `date`, `accept`) VALUES (NULL, $myId, $idTrenera, $trening, $date, 0)");
    }
    header("Location: /klient/grafik");
?>