<?php
    $myId = unserialize($_SESSION['loggedUser'])->getId();
    $query = $db->query("SELECT * FROM ticket_types;");
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
                            <h3>Wszystkie karnety:</h3>
                            <div style="overflow-y: scroll; max-height: 30em;">
                                <table class="ui selectable celled center aligned table">
                                    <thead>
                                        <th>ID</th>
                                        <th>Typ</th>
                                        <th>Liczba dni</th>
                                        <th>Cena</th>
                                        <th>Aktywny</th>
                                        <th>Operacje</th>
                                    </thead>

                                    <tbody>
                                    <?php foreach($query as $row): ?>
                                        <tr>
                                            <td><?php echo $row['id_ticket_type'];?></td>
                                            <td><?php echo $row['type_name'];?></td>
                                            <td><?php echo $row['days'];?></td>
                                            <td><?php echo $row['price'];?></td>
                                            <td><?php echo $row['active'];?></td>
                                            <td>
                                                <a href="/admin/karnety/edytuj?id=<?php echo $row['id_ticket_type'];?>">Edytuj</a>
                                                <div class="ui divider"></div>
                                                <a href="/admin/karnety/usun?id=<?php echo $row['id_ticket_type'];?>">Usuń</a>
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
                            <h3>Dodawanie nowego karnetu:</h3>
                            <form action="/admin/karnety/dodajkarnet" method="GET">
                                <table class="ui form selectable celled center aligned table">
                                    <tr>
                                        <td><b>Typ</b></td>
                                        <td><input type="text" name="type" value=""/></td>
                                    </tr>
                                    <tr>
                                        <td><b>Liczba dni</b></td>
                                        <td><input type="number" name="days" value=""/></td>
                                    </tr>
                                    <tr>
                                        <td><b>Cena</b></td>
                                        <td><input type="number" name="price" value=""/></td>
                                    </tr>
                                    <tr>
                                        <td><b>Aktywny</b></td>
                                        <td>
                                            <select name="active">
                                                <option value="1" selected>Tak</option>
                                                <option value="0">Nie</option>
                                            </select>
                                        </td>
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