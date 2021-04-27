<?php
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $nazwa = 'news.jpg';

    $query = $db->query("SELECT image FROM news WHERE id = $id");
    foreach($query as $row)
    {
        $nazwa = $row['image'];
    }


    if (is_uploaded_file($_FILES['plik']['tmp_name'])) 
    {
        $nazwa_pliku = $id.'.jpg';
        $tymczasowa_nazwa_pliku = $_FILES['plik']['tmp_name'];
        $miejsce_docelowe = $_SERVER['DOCUMENT_ROOT'].$ds.'other'.$ds.'news'.$ds.$nazwa_pliku;

        unlink($_SERVER['DOCUMENT_ROOT'].$ds.'other'.$ds.'news'.$ds.$row['image']);

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
                $nazwa = $nazwa_pliku;
            }
        }
    }

    $db->query("UPDATE `news` SET `title` = '$title', `content` = '$content', `image` = '$nazwa' WHERE `news`.`id` = $id");

    header("Location: /aktualnosci");
?>