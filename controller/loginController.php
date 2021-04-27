<?php
    if(isset($_POST['login']) && isset($_POST['password']))
    {
        require $model.'loginProcess.php';
    }

    require $views.'header.php';
    if(!isset($_SESSION['loggedUser']))
    {
        require $views.'loginForm.php';
    }
    else
    {
        header('Location: /home');
    }
    require $views.'footer.php';
?>