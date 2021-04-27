<?php
    $id = $_GET['id_ticket_type'];
    $type_name = $_GET['type'];
    $days = $_GET['days'];
    $price = $_GET['price'];
    $active = $_GET['active'];

    $db->query("UPDATE `ticket_types` SET `type_name` = '$type_name', `days` = '$days', `price` = '$price', `active` = '$active' WHERE `ticket_types`.`id_ticket_type` = $id");

    header("Location: /admin/karnety");
?>