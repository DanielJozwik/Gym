<?php
    $types = $_GET['typy'];
    $myId = unserialize($_SESSION['loggedUser'])->getId();

    $rows = $db->query("SELECT * FROM ticket_types WHERE id_ticket_type = $types");

    $strquery;

    foreach($rows as $row)
    {
        $start = date('Y-m-d');
        $days = '+ '.$row['days'].' days';
        $end = date( 'Y-m-d', strtotime(date('Y-m-d').$days) );

        $strquery = "INSERT INTO `gym_ticket` (`id_gym_ticket`, `customer_id`, `type_name`, `price`, `start_date`, `end_date`) VALUES (NULL, ".$myId.", "."'".$row['type_name']."'".", ".$row['price'].", "."'".$start."'".", "."'".$end."'".");";
    }

    $db->query($strquery);
    header("Location: /klient/karnety");
?>