<?php
$myId = unserialize($_SESSION['loggedUser'])->getId();

if(($_GET['type'])=="" || ($_GET['days'])=="" || ($_GET['price'])=="" || ($_GET['active'])=="")
{
    header("Location: /admin/news");
}
else if(!isset($myId))
{
    header("Location: /admin/karnety");
}
else
{
    $type = $_GET['type'];
    $days = $_GET['days'];
    $price = $_GET['price'];
    $active = $_GET['active'];

    $db->query("INSERT INTO `ticket_types` (`id_ticket_type`, `type_name`, `days`, `price`, `active`) VALUES (NULL,'$type','$days','$price','$active');");
    
    header("Location: /admin/karnety");
}
?>