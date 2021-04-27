<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <style>
    .loginform {
      max-width: 450px;
    }
    .ui.menu .item img.logo {
      margin-right: 1.5em;
    }
    .main.container {
      padding-top: 5em;
      padding-bottom: 4em;
    }
    .a-color{
      color: grey;
    }
    .a-color:hover{
      color: black;
    }
    .main
    {
      min-height: 61.5em;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siłownia - <?php echo $GLOBALS['title'];?></title>
    <link rel="shortcut icon" href="/other/images/logo.jpg">

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" />
</head>
<body>

<header>
  <div class="ui fixed inverted menu">
    <div class="ui container">
      <div class="left menu">
        <a href="/home" class="item">
          <img src="/other/images/logo.jpg">&nbsp;&nbsp;&nbsp;
          Strona główna
        </a>
        <a href="/aktualnosci" class="item">Aktualności</a>
        <div class="ui simple dropdown item">
          O nas
          <i class="dropdown icon"></i>
          <div class="menu">
            <a href="/onas/trenerzy" class="item">Trenerzy</a>
            <a href="/onas/zawody" class="item">Zawody</a>
            <a href="/onas/historia" class="item">Historia</a>
          </div>
        </div>
        <div class="ui simple dropdown item">
          Oferta
          <i class="dropdown icon"></i>
          <div class="menu">
            <a href="/oferta/cennik" class="item">Cennik</a>
            <a href="/oferta/silownia" class="item">Silownia</a>
            <a href="/oferta/sauna" class="item">Sauna</a>
            <a href="/oferta/solarium" class="item">Solarium</a>
          </div>
        </div>
      </div>


      <div class="right menu">
        <?php if(!isset($_SESSION['loggedUser'])):?>
          <a href="/login" class="item">Zaloguj się</a>
        <?php else: ?>
          <div class="item">
            <?php if(unserialize($_SESSION['loggedUser'])->getAvatar() != ''): ?>
              <?php echo '<img class="ui avatar image" src="/other/avatars/'.unserialize($_SESSION['loggedUser'])->getAvatar().'">';?>
            <?php else: ?>
              <img class="ui avatar image" src="/other/images/default-avatar.jpg">
            <?php endif; ?>
            &nbsp; Witaj, <?php echo unserialize($_SESSION['loggedUser'])->getName().' '.unserialize($_SESSION['loggedUser'])->getSurname();?>
          </div>
          <div class="ui simple dropdown item">
            Opcje klienta&nbsp;&nbsp;
            <i class="dropdown icon"></i>
            <div class="menu">
              <a href="/klient/panel" class="item">
                <i class="address card icon"></i>
                Panel klienta
              </a>

              <?php if(unserialize($_SESSION['loggedUser'])->getStatus() == "klient" || unserialize($_SESSION['loggedUser'])->getStatus() == "admin"): ?>
              <a href="/klient/karnety" class="item">
                <i class="handshake icon"></i>
                Karnety
              </a>
              <div class="divider"></div>
              <a href="/klient/grafik" class="item">
                <i class="tasks icon"></i>
                Mój grafik
              </a>
              <a href="/klient/grafik/ustal" class="item">
                <i class="calendar plus icon"></i>
                Ustal trening
              </a>
              <?php endif;?>

              <?php if(unserialize($_SESSION['loggedUser'])->getStatus() == "trener"): ?>
              <a href="/klient/grafik/trener" class="item">
                <i class="tasks icon"></i>
                Mój grafik
              </a>
              <?php endif;?>

              <div class="divider"></div>
              <a href="/logout" class="item">
                <i class="sign-out icon"></i>
                Wyloguj się
              </a>
            </div>
          </div>
        <?php endif;?>
      </div>
    </div>
  </div>
</header>

<div class="ui main container">