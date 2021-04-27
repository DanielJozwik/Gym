<?php
$myId = unserialize($_SESSION['loggedUser'])->getId();

if(($_GET['type'])=="")
{
    header("Location: /admin/treningi");
}
else if(!isset($myId))
{
    header("Location: /login");
}
else
{
    $type = $_GET['type'];

    $db->query("INSERT INTO `activity_types` (`type_id`, `type`) VALUES (NULL,'$type');");
    header("Location: /admin/treningi");
}
?>