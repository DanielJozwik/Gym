<?php
    require $views.'header.php';
    if(!isset($_SESSION['loggedUser']))
    {
        header('Location: /login');
    }
    else
    {
        $status = unserialize($_SESSION['loggedUser'])->getStatus();
        if($status == 'admin')
        {
            require $views.'admin'.$ds.'klienci.php';
        }
        else
        {
            header('Location: /home');
        }
    }
    require $views.'footer.php';
?>