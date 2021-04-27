<?php
    $myId = unserialize($_SESSION['loggedUser'])->getId();
    $query = $db->query("SELECT * FROM gym_ticket WHERE customer_id = $myId ORDER BY id_gym_ticket DESC");

    $akt = false;
    foreach($query as $row)
    {
        if(!(date("Y-m-d") > $row['end_date'] || date("Y-m-d") < $row['start_date']))
        {
            $akt = true;
        }
    }

    if($query->rowCount() > 0 && $akt != false)
    {
        header('Location: /klient/karnety');
    }
?>

<?php
    $myId = unserialize($_SESSION['loggedUser'])->getId();
    $query = $db->query("SELECT * FROM ticket_types");
?>

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
                    <h3>Zakup karnetu:</h3>
                </div>
            </div>

            <div class="row">
                <div class="ui grid container">
                    <div class="four wide column"></div>
                    <div class="eight wide column">
                    <form action="/kupnokarnetu" method="">
                            <table class="ui selectable celled center aligned table">
                                <th>Wybór</th>
                                <th>Typ</th>
                                <th>Cena</th>
                                <th>Data</th>
                                <div class="ui radio checkbox">
                                <?php foreach($query as $row): ?>
                                    <tr>
                                        <td>
                                                <input type="radio" name="typy" checked value="<?php echo $row['id_ticket_type'];?>">
                                                <label></label>
                                        </td>

                                        <td><?php echo $row['type_name'];?></td>
                                        <td><?php echo $row['price'];?></td>
                                        <td>
                                        <?php 
                                            $days = '+ '.$row['days'].' days';
                                            $today = date('Y-m-d', strtotime(date('Y-m-d').$days));
                                            echo 'do '.$today;
                                        ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </div>
                            </table>
                        <div class="ui center aligned container">
                            <input type="submit" name="send" value="Zakup" /></form>
                        </div>
                    </div>
                    <div class="four wide column"></div>
                </div>
            </div>
        </div>
    </div>