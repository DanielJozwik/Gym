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

    $nazwa;
    $query = $db->query("SELECT avatar FROM users WHERE id = $id");
    foreach($query as $row)
    {
        $nazwa = $row['avatar'];

        if($nazwa!="default-avatar.jpg")
        {
            unlink($_SERVER['DOCUMENT_ROOT'].$ds.'other'.$ds.'avatars'.$ds.$row['avatar']);
        }
    }

    $db->query("DELETE FROM users WHERE id = $id;");
    $db->query("DELETE FROM activities WHERE id_customer = $id OR id_trainer = $id;");
    $db->query("DELETE FROM gym_ticket WHERE customer_id = $id;");
    $db->query("UPDATE `news` SET `id_user` = '0' WHERE `news`.`id` = $id;");

    header("Location: /admin/klienci");
}
?>