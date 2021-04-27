<?php
        $id = $_POST['id'];
        $avatar = $_POST['avatar'];
        $login = $_POST['login'];
        $status = $_POST['status'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $age = $_POST['age'];
        $telephone = $_POST['telephone'];


        $db->query("UPDATE `users` SET `login` = '$login', `avatar` = '$avatar', `status` = '$status', `name` = '$name', `surname` = '$surname', `age` = '$age', `telephone` = '$telephone' WHERE `users`.`id` = $id;");
    
        header("Location: /admin/klienci");
?>