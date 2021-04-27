<?php
$myId = unserialize($_SESSION['loggedUser'])->getId();
$id = $_GET['id'];

$nazwa;
$query = $db->query("SELECT image FROM news WHERE id = $id");
foreach($query as $row)
{
    $nazwa = $row['image'];
}
if($nazwa!="news.jpg")
{
    unlink($_SERVER['DOCUMENT_ROOT'].$ds.'other'.$ds.'news'.$ds.$row['image']);
}


$db->query("DELETE FROM news WHERE id = $id");
header("Location: /aktualnosci");
?>