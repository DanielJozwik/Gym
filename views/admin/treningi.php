<?php
    $myId = unserialize($_SESSION['loggedUser'])->getId();
    $query = $db->query("SELECT * FROM activity_types;");
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
                            <h3>Wszystkie treningi:</h3>
                            <div style="overflow-y: scroll; max-height: 30em;">
                                <table class="ui selectable celled center aligned table">
                                    <thead>
                                        <th>ID</th>
                                        <th>Typ</th>
                                        <th>Operacja</th>
                                    </thead>

                                    <tbody>
                                    <?php foreach($query as $row): ?>
                                        <tr>
                                            <td><?php echo $row['type_id'];?></td>
                                            <td><?php echo $row['type'];?></td>
                                            <td>
                                                <a href="/admin/treningi/usun?id=<?php echo $row['type_id'];?>">Usuń</a>
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
                            <h3>Dodawanie nowego typu:</h3>
                            <form action="/admin/treningi/dodaj" method="GET">
                                <table class="ui form selectable celled center aligned table">
                                    <tr>
                                        <td><b>Typ</b></td>
                                        <td><input type="text" name="type" value=""/></td>
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