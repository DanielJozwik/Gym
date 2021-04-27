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
    $db->query("DELETE FROM activity_types WHERE type_id = $id;");
    header("Location: /admin/treningi");
}
?>