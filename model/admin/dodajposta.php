<?php
$myId = unserialize($_SESSION['loggedUser'])->getId();

if(($_POST['title'])=="" || ($_POST['content'])=="")
{
    header("Location: /admin/news");
}
else if(!isset($myId))
{
    header("Location: /aktualnosci");
}
else
{
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date("Y-m-d");
    $nazwa ='tmp.jpg';

    $db->query("INSERT INTO `news`(`title`, `content`, `date`, `image`, `id_user`) VALUES ('$title','$content','$date','$nazwa', $myId);");

    if (is_uploaded_file($_FILES['plik']['tmp_name'])) 
    {
        $nazwa_pliku = 'tmp.jpg';
        $tymczasowa_nazwa_pliku = $_FILES['plik']['tmp_name'];
        $miejsce_docelowe = $_SERVER['DOCUMENT_ROOT'].$ds.'other'.$ds.'news'.$ds.$nazwa_pliku;

        if (file_exists($miejsce_docelowe)) 
        {
            echo 'Wczytywany plik już istnieje na serwerze.';
        }
        else
        {
            if (!@move_uploaded_file($tymczasowa_nazwa_pliku, $miejsce_docelowe))
            {
                echo 'Podana lokalizacja nie istnieje';
            }
            else
            {
                echo 'Przesyłanie pliku zakończyło się pomyślnie.';


                $id;
                $query = $db->query("SELECT id FROM news WHERE image = 'tmp.jpg'");

                foreach($query as $row)
                {
                    $id = $row['id'];
                    $image = $id.'.jpg';
                    $db->query("UPDATE `news` SET `image` = '$image' WHERE `news`.`id` = $id;");
                    rename($_SERVER['DOCUMENT_ROOT'].$ds.'other'.$ds.'news'.$ds.'tmp.jpg', $_SERVER['DOCUMENT_ROOT'].$ds.'other'.$ds.'news'.$ds.$image);
                }
            }
        }
    }
    else
    {
        $id;
        $query = $db->query("SELECT id FROM news WHERE image = 'tmp.jpg'");

        foreach($query as $row)
        {
            $id = $row['id'];
            $image = 'news.jpg';
            $db->query("UPDATE `news` SET `image` = '$image' WHERE `news`.`id` = $id;");
        }
    }

    header("Location: /aktualnosci");
}
?>