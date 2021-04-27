<?php
$required = array('login', 'name', 'surname', 'age', 'telephone');

$error = false;
foreach($required as $field) 
{
    echo $_POST[$field];
    if ( isset($_POST[$field]) && empty($_POST[$field]) ) 
    {
        $error = true;
    }
}

if($error)
{
    echo '<script>alert("Nie uzupełniono wszystkich danych użytkownika!");</script>';
}
else
{
    $myId = unserialize($_SESSION['loggedUser'])->getId();
    $nazwa = $myId.'.jpg';

    if (is_uploaded_file($_FILES['plik']['tmp_name']))
    {
            $nazwa_pliku = $myId.'.jpg';
            $tymczasowa_nazwa_pliku = $_FILES['plik']['tmp_name'];
            $miejsce_docelowe = $_SERVER['DOCUMENT_ROOT'].$ds.'other'.$ds.'avatars'.$ds.$nazwa_pliku;
    
                if (!@move_uploaded_file($tymczasowa_nazwa_pliku, $miejsce_docelowe))
                {
                    echo 'Podana lokalizacja nie istnieje';
                }
                else
                {
                    echo 'Przesyłanie pliku zakończyło się pomyślnie.';
                    $nazwa = $nazwa_pliku;

                    $db->exec("UPDATE `users` SET `avatar` = '".$nazwa."', `login` = '".$_POST['login']."',`name`= '".$_POST['name']."', `surname` = '".$_POST['surname']."', `age` = '".$_POST['age']."', `telephone` = '".$_POST['telephone']."'  WHERE `users`.`id` = '".$myId."';");
                }
    }
    else
    {
        $db->exec("UPDATE `users` SET `login` = '".$_POST['login']."',`name`= '".$_POST['name']."', `surname` = '".$_POST['surname']."', `age` = '".$_POST['age']."', `telephone` = '".$_POST['telephone']."'  WHERE `users`.`id` = '".$myId."';");
    }

    if($exec == 0)
    {
        echo "<script>alert('Pomyślnie zedytowano użytkownika!');</script>";
        $thisUser = unserialize($_SESSION['loggedUser']);
        $thisUser->setLogin($_POST['login']);
        $thisUser->setName($_POST['name']);
        $thisUser->setSurname($_POST['surname']);
        $thisUser->setAvatar($nazwa);
        $_SESSION['loggedUser'] = serialize($thisUser);
    }
    else
    {
        echo "<script>alert('Błąd: Edycja użytkownika nie powiodła się!');</script>";
    }
} 
?>