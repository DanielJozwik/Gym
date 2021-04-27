<div class="ui stackable container">
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
                    <h3>Edycja danych:</h3>
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
                        <form action="/edytujdane" method="POST" enctype="multipart/form-data">
                        <?php foreach($result as $row): ?>
                            <table class="ui selectable celled center aligned table">
                                    <tr>
                                        <td><strong>Avatar</strong></td>
                                        <td>
                                            <div class="ui input">
                                                <input type="file" name="plik" accept="image/jpeg" />
                                            </div>
                                            <div>
                                            Pozostawienie pustego pola nie spowoduje zmiany avatara. Wymagany format jpg.
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Login</strong></td>
                                        <td>
                                            <div class="ui input">
                                                <input type="text" name="login" value="<?php echo $row['login'];?>"/>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Imie</strong></td>
                                        <td>
                                            <div class="ui input">
                                                <input type="text" name="name" value="<?php echo $row['name'];?>"/>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Nazwisko</strong></td>
                                        <td>
                                            <div class="ui input">
                                                <input type="text" name="surname" value="<?php echo $row['surname'];?>"/>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Wiek</strong></td>
                                        <td><div class="ui input"><input type="text" name="age" value="<?php echo $row['age'];?>"/></div></td>
                                    </tr>

                                    <tr>
                                        <td><strong>Telefon</strong></td>
                                        <td><div class="ui input"><input type="text" name="telephone" value="<?php echo $row['telephone'];?>"/></div></td>
                                    </tr>
                            </table>
                        <?php endforeach; ?>
                        <div class="ui center aligned container">
                            <input type="submit" name="send" value="Edytuj" /></form>
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