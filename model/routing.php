<?php

function routing($request)
{
    require_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'other'.DIRECTORY_SEPARATOR.'requiredScripts.php';

    //Czy strona została znaleziona
    $isFound = false;

    if( ($request == "/") || substr($request,0,5) == "/home")
    {
        //Zapisanie tytułu strony
        $GLOBALS['title'] = "Strona główna";
        //Ścieżka do kontrolera odpowiedniej strony
        require $controller.'homeController.php';
        //Strona została znaleziona
        $isFound = true;
    }
    //procesy logowania
    else if(substr($request, 0, 6) == "/login")
    {
        $GLOBALS['title'] = "Zaloguj się";
        require $controller.'loginController.php';
        $isFound = true;
    }
    else if(substr($request, 0, 7) == "/logout")
    {
        require $controller.'logoutController.php';
        $isFound = true;
    }
    //podstrony ogólne
    else if(substr($request, 0, 12) == "/aktualnosci")
    {
        $GLOBALS['title'] = "Aktualności";
        require $controller.'newsController.php';
        $isFound = true;
    }
    else if(substr($request, 0, 10) == "/regulamin")
    {
        $GLOBALS['title'] = "Regulamin";
        require $controller.'statuteController.php';
        $isFound = true;
    }
    else if(substr($request, 0, 8) == "/kontakt")
    {
        $GLOBALS['title'] = "Kontakt";
        require $controller.'contactController.php';
        $isFound = true;
    }
    else if(substr($request, 0, 14) == "/oferta/cennik")
    {
        $GLOBALS['title'] = "Cennik";
        require $controller.'oferta'.$ds.'cennikController.php';
        $isFound = true;
    }
    else if(substr($request, 0, 16) == "/oferta/silownia")
    {
        $GLOBALS['title'] = "Siłownia";
        require $controller.'oferta'.$ds.'silowniaController.php';
        $isFound = true;
    }
    else if(substr($request, 0, 13) == "/oferta/sauna")
    {
        $GLOBALS['title'] = "Sauna";
        require $controller.'oferta'.$ds.'saunaController.php';
        $isFound = true;
    }
    else if(substr($request, 0, 16) == "/oferta/solarium")
    {
        $GLOBALS['title'] = "Sauna";
        require $controller.'oferta'.$ds.'solariumController.php';
        $isFound = true;
    }
    else if(substr($request, 0, 14) == "/onas/trenerzy")
    {
        $GLOBALS['title'] = "Trenerzy";
        require $controller.'onas'.$ds.'trenerzyController.php';
        $isFound = true;
    }
    else if(substr($request, 0, 12) == "/onas/zawody")
    {
        $GLOBALS['title'] = "Zawody";
        require $controller.'onas'.$ds.'zawodyController.php';
        $isFound = true;
    }
    else if(substr($request, 0, 14) == "/onas/historia")
    {
        $GLOBALS['title'] = "Historia";
        require $controller.'onas'.$ds.'historiaController.php';
        $isFound = true;
    }
    //podstrony klienta
    else if(substr($request, 0, 7) == "/klient")
    {
        if(substr($request, 7, 6) == "/panel")
        {
            $GLOBALS['title'] = "Panel klienta";
            require $controller.'klient'.$ds.'panelController.php';
            $isFound = true;
        }
        else if(substr($request, 7, 13) == "/zmianadanych")
        {
            $GLOBALS['title'] = "Edycja danych";
            require $controller.'klient'.$ds.'editController.php';
            $isFound = true;
        }
        else if(substr($request, 7, 8) == "/karnety")
        {
            if(substr($request, 15, 6) == "/zakup")
            {
                $GLOBALS['title'] = "Zakup karnetu";
                require $controller.'klient'.$ds.'zakupkarnetuController.php';
                $isFound = true;
            }
            else if(strlen($request) == 15)
            {
                $GLOBALS['title'] = "Wyświetl karnety";
                require $controller.'klient'.$ds.'karnetyController.php';
                $isFound = true;
            }
        }
        else if(substr($request, 7, 7) == "/grafik")
        {
            if(substr($request, 14, 6) == "/ustal")
            {
                $GLOBALS['title'] = "Ustal trening";
                require $controller.'klient'.$ds.'ustaltreningController.php';
                $isFound = true;
            }
            if(substr($request, 14, 7) == "/trener")
            {
                $GLOBALS['title'] = "Wyświetl grafik";
                require $controller.'klient'.$ds.'grafiktrenerController.php';
                $isFound = true;
            }
            else if(strlen($request) == 14)
            {
                $GLOBALS['title'] = "Wyświetl grafik";
                require $controller.'klient'.$ds.'grafikController.php';
                $isFound = true;
            }
        }
    }
    //kontrolery funkcyjne klienta
    else if(substr($request, 0, 11) == "/edytujdane")
    {
        require $controller.'klient'.$ds.'editprocessController.php';
        $isFound = true;
    }
    else if(substr($request, 0, 13) == "/kupnokarnetu")
    {
        require $model.'zakupkarnetu.php';
        $isFound = true;
    }
    else if(substr($request, 0, 13) == "/ustaltrening")
    {
        require $model.'ustaltrening.php';
        $isFound = true;
    }
    else if(substr($request, 0, 8) == "/odwolaj")
    {
        require $model.'odwolaj.php';
        $isFound = true;
    }
    else if(substr($request, 0, 6) == "/zmien")
    {
        require $model.'zmien.php';
        $isFound = true;
    }
    //podstrony admina
    else if(substr($request, 0, 6) == "/admin")
    {
        if(isset($_SESSION['loggedUser']) && unserialize($_SESSION['loggedUser'])->getStatus() == "admin")
        {
            if(strlen($request) == 6)
            {
                $GLOBALS['title'] = "Admin - Panel";
                require $controller.'admin'.$ds.'adminpanelController.php';
                $isFound = true;
            }
            else if(substr($request, 6, 5) == "/news")
            {
                $GLOBALS['title'] = "Admin - Dodaj posta";
                require $controller.'admin'.$ds.'adminpostController.php';
                $isFound = true;
            }
            else if(substr($request, 6, 8) == "/klienci")
            {
                if(strlen($request) == 14)
                {
                    $GLOBALS['title'] = "Admin - Klienci";
                    require $controller.'admin'.$ds.'adminklienciController.php';
                    $isFound = true;
                }
                if(substr($request, 14, 7) == "/edytuj")
                {
                    $GLOBALS['title'] = "Admin - Edycja użytkownika";
                    require $controller.'admin'.$ds.'adminedituserController.php';
                    $isFound = true;
                }
                if(substr($request, 14, 5) == "/usun")
                {
                    require $model.'admin'.$ds.'usunusera.php';
                    $isFound = true;
                }
            }
            else if(substr($request, 6, 8) == "/karnety")
            {
                if(strlen($request) == 14)
                {
                    $GLOBALS['title'] = "Admin - Karnety";
                    require $controller.'admin'.$ds.'adminkarnetyController.php';
                    $isFound = true;
                }
                else if(substr($request, 14, 12) == "/dodajkarnet")
                {
                    require $model.'admin'.$ds.'dodajkarnet.php';
                    $isFound = true;
                }
                else if(substr($request, 14, 5) == "/usun")
                {
                    require $model.'admin'.$ds.'usunkarnet.php';
                    $isFound = true;
                }
                else if(substr($request, 14, 7) == "/edytuj")
                {
                    $GLOBALS['title'] = "Admin - Karnety - Edytuj";
                    require $controller.'admin'.$ds.'admineditkarnetController.php';
                    $isFound = true;
                }
            }
            else if(substr($request, 6, 9) == "/treningi")
            {
                if(strlen($request) == 15)
                {
                    $GLOBALS['title'] = "Admin - Treningi";
                    require $controller.'admin'.$ds.'admintreningController.php';
                    $isFound = true;
                }
                else if(substr($request, 15, 6) == "/dodaj")
                {
                    require $model.'admin'.$ds.'dodajtrening.php';
                    $isFound = true;
                }
                else if(substr($request, 15, 5) == "/usun")
                {
                    require $model.'admin'.$ds.'usuntrening.php';
                    $isFound = true;
                }
            }
            //kontrolery funkcyjne admina
            else if(substr($request, 6, 9) == "/nowypost")
            {
                require $model.'admin'.$ds.'dodajposta.php';
                $isFound = true;
            }
            else if(substr($request, 6, 10) == "/usunposta")
            {
                require $model.'admin'.$ds.'usunposta.php';
                $isFound = true;
            }
            else if(substr($request, 6, 12) == "/edytujposta")
            {
                $GLOBALS['title'] = "Admin - Edycja posta";
                require $controller.'admin'.$ds.'admineditpostController.php';
                $isFound = true;
            }
            else if(substr($request, 6, 9) == "/postedit")
            {
                require $model.'admin'.$ds.'edytujposta.php';
                $isFound = true;
            }
            else if(substr($request, 6, 11) == "/dodajusera")
            {
                require $model.'admin'.$ds.'dodajusera.php';
                $isFound = true;
            }
            else if(substr($request, 6, 12) == "/edycjausera")
            {
                require $model.'admin'.$ds.'edycjausera.php';
                $isFound = true;
            }
            else if(substr($request, 6, 14) == "/edycjakarnetu")
            {
                require $model.'admin'.$ds.'edytujkarnet.php';
                $isFound = true;
            }
        }
        else if(!isset($_SESSION['loggedUser']) || unserialize($_SESSION['loggedUser'])->getStatus() != "admin")
        {
            $isFound = false;
        }
    }

    //Jeżeli strona nie została znaleziona
    if($isFound == false)
    {
        http_response_code(404);
        $GLOBALS['title'] = "Strona nie istnieje";
        require $controller.'notfoundController.php';
    }
} 
?>