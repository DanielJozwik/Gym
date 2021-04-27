<?php
    $myId = unserialize($_SESSION['loggedUser'])->getId();
    $query = $db->query("SELECT id_activities, id_trainer, activity_type, date, name, surname, telephone, accept FROM activities LEFT JOIN users on activities.id_customer = users.id WHERE id_trainer = $myId ORDER BY date ASC");
?>

<div class="row">
        <div class="ui segment">
            <div class="row">
                    <div class="ui center aligned container">
                        <h2><i>Panel trenera</i>/h2>
                    </div>
            </div>

            <div class="ui divider"></div>

            <div class="row">
                <div class="ui center aligned container">
                    <h3>Twój grafik:</h3>
                </div>
            </div>

            <div class="row">
                <div class="ui grid container">
                    <div class="three wide column"></div>
                    <div class="ten wide column">
                        <?php $aktywny = false; ?>
                        <?php if($query->rowCount() > 0): ?>
                        <table class='ui selectable celled center aligned table' style="overflow-y: scroll; max-height: 45em;">
                            <tr>
                                <th>ID</th>
                                <th>Klient</th>
                                <th>Rodzaj treningu</th>
                                <th>Data</th>
                                <th>Akceptacja</th>
                                <th>Operacja</th>
                            </tr>
                            <?php foreach($query as $row): ?>
                                <tr>
                                    <td><?php echo $row['id_activities'];?></td>
                                    <td><?php echo $row['name'].' '.$row['surname'].'<br>'.'Telefon: '.$row['telephone'];?></td>
                                    <td><?php echo $row['activity_type'];?></td>
                                    <td><?php echo $row['date'];?></td>
                                    <td>
                                        <?php
                                            if($row['accept'])
                                            {
                                                echo "<i class='icon checkmark'></i>";
                                            }
                                            else
                                            {
                                                echo "<i class='icon close'></i>";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="/zmien?id=<?php echo $row['id_activities'];?>">Zmień</a>
                                        <div class="ui divider"></div>
                                        <a href="/odwolaj?id=<?php echo $row['id_activities'];?>">Odwołaj</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php else: ?>
                            <div class="ui center aligned container">Nie masz żadnego zaplanowanego treningu.</div>
                        <?php endif; ?>
                    </div>
                    <div class="three wide column"></div>
                </div>
                <br><br>
            </div>
        </div>
    </div>