<?php
    if(isset($_POST['login']) && isset($_POST['password']))
    {
        $tempname = $_POST['login'];
        $isFound = false;

        $userArray = $db->query("SELECT * FROM users;");
        foreach($userArray as $row)
        {
            if($tempname == $row['login'])
            {
                if(md5($_POST['password']) == $row['password'])
                {
                    $loggedUser = new User($row['login'], $row['status'], $row['name'], $row['surname'], $row['id'], $row['avatar']);

                    $_SESSION['loggedUser'] = serialize($loggedUser);
                    $isFound = true;
                }
                else
                {
                    echo '<script>alert("Nazwa użytkownika lub hasło jest niepoprawne!")</script>';
                    $isFound = true;
                }
            }
        }

        if($isFound == false)
        {
            echo '<script>alert("Nazwa użytkownika lub hasło jest niepoprawne!")</script>';
        }
    }
?>