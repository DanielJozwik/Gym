<div class="ui container">

    <div class="row">
        <div class="ui segment">
            <div class="row">
                    <div class="ui center aligned container">
                        <h2>Panel klienta</h2>
                    </div>
            </div>

            <div class="ui divider"></div>

            <div class="row">
                <div class="ui center aligned container">
                    <h3>Twoje dane:</h3>
                </div>
            </div>

            <div class="row">
                <?php 
                    $myId = unserialize($_SESSION['loggedUser'])->getId();
                    $result = $db->query("SELECT * FROM users WHERE id=$myId");
                ?>
                <div class="ui grid container">
                    <div class="four wide column"></div>
                    <div class="eight wide column">
                        <?php foreach($result as $row): ?>
                            <table class='ui selectable celled center aligned table'>
                                    <tr>
                                        <td><strong>Zdjęcie</strong></td>
                                        <td><img class="ui centered small image" src="/other/avatars/<?php echo $row['avatar']?>"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Login</strong></td>
                                        <td><?php echo $row['login'];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Imie</strong></td>
                                        <td><?php echo $row['name'];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nazwisko</strong></td>
                                        <td><?php echo $row['surname'];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Wiek</strong></td>
                                        <td><?php echo $row['age'];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Telefon</strong></td>
                                        <td><?php echo $row['telephone'];?></td>
                                    </tr>
                            </table>
                        <?php endforeach; ?>
                        <div class="ui center aligned container">
                            Aby edytować swoje dane, <a href="/klient/zmianadanych">kliknij tutaj</a>
                        </div>
                    </div>
                    <div class="four wide column"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="ui inverted segment">
            <div class="ui center aligned container">
                Przypomnamy, że administratorem danych jest firma Januszex Sp. z o.o. Wszelkie informacje mogą być przetwarzane w dowolny sposób (np. wzięcie kredytu, podrobienie dokumentów). Pozdrawiam serdecznie :)
            </div>
        </div>
    </div>
</div>