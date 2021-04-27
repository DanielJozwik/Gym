<?php
    $myId = unserialize($_SESSION['loggedUser'])->getId();
    $query = $db->query("SELECT * FROM gym_ticket WHERE customer_id = $myId ORDER BY id_gym_ticket DESC");
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
                    <h3>Twoje karnety:</h3>
                </div>
            </div>

            <div class="row">
                <div class="ui grid container">
                    <div class="three wide column"></div>
                    <div class="ten wide column">
                        <?php $aktywny = false; ?>
                        <?php if($query->rowCount() > 0): ?>
                        <table class='ui selectable celled center aligned table'>
                            <tr>
                                <th>Numer karnetu</th>
                                <th>Rodzaj karnetu</th>
                                <th>Cena</th>
                                <th>Start karnetu</th>
                                <th>Koniec karnetu</th>
                                <th>Aktywny</th>
                            </tr>
                            <?php foreach($query as $row): ?>
                                <tr>
                                    <td><?php echo $row['id_gym_ticket'];?></td>
                                    <td><?php echo $row['type_name'];?></td>
                                    <td><?php echo $row['price'];?>zł</td>
                                    <td><?php echo $row['start_date'];?></td>
                                    <td><?php echo $row['end_date'];?></td>
                                    <td>
                                    <?php 
                                        if(date("Y-m-d") > $row['end_date'] || date("Y-m-d") < $row['start_date'])
                                        {
                                            echo "<i class='icon close'></i>Nie";
                                        }
                                        else
                                        {
                                            echo "<i class='icon checkmark'></i>Tak";
                                            $aktywny = true;
                                        }
                                    ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>

                        <?php if($aktywny==false) : ?>
                            <div class="ui center aligned container">
                            <br>
                            Niestety nie masz aktywnego karnetu :(  <br> <a href="/klient/karnety/zakup">Zakup tutaj</a>
                            </div>
                        <?php else: ?>
                            <div class="ui center aligned container">
                            Posiadasz <b>aktywny</b> karnet!
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="three wide column"></div>
                </div>
            </div>
        </div>
    </div>