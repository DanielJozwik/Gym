<?php
$myId = unserialize($_SESSION['loggedUser'])->getId();

if(($_GET['id'])=="")
{
    header("Location: /login");
}
else if(!isset($myId))
{
    header("Location: /login");
}
else
{
    $id = $_GET['id'];
    $db->query("DELETE FROM ticket_types WHERE id_ticket_type = $id;");
    header("Location: /admin/karnety");
}
?>