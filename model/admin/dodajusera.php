<?php
$myId = unserialize($_SESSION['loggedUser'])->getId();

if(($_GET['login'])=="" || ($_GET['password'])=="" ||($_GET['status'])=="" ||($_GET['name'])=="" ||($_GET['surname'])=="" ||($_GET['age'])=="" || ($_GET['telephone'])=="") 
{
    header("Location: /admin/klienci");
}
else if(!isset($myId))
{
    header("Location: /login");
}
else
{
    $login = $_GET['login'];
    $password = md5( $_GET['password'] );
    $status = $_GET['status'];
    $name = $_GET['name'];
    $surname = $_GET['surname'];
    $age = $_GET['age'];
    $telephone = $_GET['telephone'];

    $db->query("INSERT INTO `users` (`id`, `login`, `password`, `status`, `name`, `surname`, `avatar`, `age`, `telephone`) VALUES (NULL, '$login', '$password', '$status', '$name', '$surname', 'default-avatar.jpg', '$age', '$telephone');");
    header("Location: /admin/klienci");
}
?>