<?php
    $myId = unserialize($_SESSION['loggedUser'])->getId();
    $query = $db->query("SELECT * FROM users;");
?>

<div class="ui container">
    <div class="row">
        <div class="ui segment">
            <div class="row">
                    <div class="ui center aligned container">
                        <h2>Panel administratora</h2>
                    </div>
            </div>

            <div class="ui divider"></div>

            <div class="row">
                <div class="ui grid">
                    <div class="two wide column"></div>
                    <div class="twelve wide column">
                        <div class="ui center aligned container" >
                            <h3>Wyświetlanie użytkowników:</h3>
                            <div style="overflow-y: scroll; max-height: 30em;">
                                <table class="ui selectable celled center aligned table">
                                    <thead>
                                        <th>ID</th>
                                        <th>Login</th>
                                        <th>Status</th>
                                        <th>Imie</th>
                                        <th>Nazwisko</th>
                                        <th>Wiek</th>
                                        <th>Telefon</th>
                                        <th>Avatar</th>
                                        <th>Operacje</th>
                                    </thead>

                                    <tbody>
                                    <?php foreach($query as $row): ?>
                                        <tr>
                                            <td><?php echo $row['id'];?></td>
                                            <td><?php echo $row['login'];?></td>
                                            <td><?php echo $row['status'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['surname'];?></td>
                                            <td><?php echo $row['age'];?></td>
                                            <td><?php echo $row['telephone'];?></td>
                                            <td><?php echo $row['avatar'];?></td>
                                            <td>
                                                <a href="/admin/klienci/edytuj?id=<?php echo $row['id'];?>">Edytuj</a>
                                                <div class="ui divider"></div>
                                                <a href="/admin/klienci/usun?id=<?php echo $row['id'];?>">Usuń</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="two wide column"></div>
                </div>
            </div>

            <div class="ui divider"></div>
            
            <div class="row">
                <div class="ui grid">
                    <div class="three wide column"></div>
                    <div class="ten wide column">
                        <div class="ui center aligned container">
                            <h3>Dodawanie nowego użytkownika:</h3>
                            <form action="/admin/dodajusera" method="GET">
                                <table class="ui form selectable celled center aligned table">
                                    <tr>
                                        <td><b>Login</b></td>
                                        <td><input type="text" name="login" value=""/></td>
                                    </tr>
                                    <tr>
                                        <td><b>Hasło</b></td>
                                        <td><input type="password" name="password" value=""/></td>
                                    </tr>
                                    <tr>
                                        <td><b>Status</b></td>
                                        <td>
                                            <select name="status">
                                                <option value="klient">Klient</option>
                                                <option value="trener">Trener</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Imie</b></td>
                                        <td><input type="text" name="name" value=""/></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nazwisko</b></td>
                                        <td><input type="text" name="surname" value=""/></td>
                                    </tr>
                                    <tr>
                                        <td><b>Wiek</b></td>
                                        <td><input type="number" name="age" value=""/></td>
                                    </tr>
                                    <tr>
                                        <td><b>Telefon</b></td>
                                        <td><input type="text" name="telephone" value=""/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input type="submit" name="send" value="Dodaj" /></td>
                                    </tr>
                                </table>
                                </form>
                        </div>
                    </div>
                    <div class="three wide column"></div>
                </div>
            </div>
        </div>
    </div>
</div>