<div class="ui container">
    <div class="row">
        <div class="ui segment">
            <div class="row">
                    <div class="ui center aligned container">
                        <h2>Panel administratora</h2>
                    </div>
            </div>

            <div class="ui divider"></div>

            <?php 
                $id = $_GET['id'];
                $query = $db->query("SELECT * FROM ticket_types WHERE id_ticket_type = $id;");
            ?>

            <div class="ui grid">
                <div class="three wide column"></div>
                <div class="ten wide column">
                    <div class="ui center aligned container">
                        <h3>Edycja karnetu nr <?php echo $_GET['id'];?>:</h3>
                        <form action="/admin/edycjakarnetu" method="">
                        <?php foreach($query as $row) : ?>
                            <table class="ui selectable celled center aligned table">
                                <input type="hidden" name="id_ticket_type" value="<?php echo $row['id_ticket_type'];?>">
                                <tr>
                                    <td><strong>Typ</strong></td>
                                    <td>
                                        <div class="ui fluid input">
                                            <input type="text" name="type" value="<?php echo $row['type_name'];?>"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Liczba dni</strong></td>
                                    <td>
                                        <div class="ui fluid input">
                                        <input type="number" name="days" value="<?php echo $row['days'];?>"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Cena</strong></td>
                                    <td>
                                        <div class="ui fluid input">
                                        <input type="number" name="price" value="<?php echo $row['price'];?>"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Aktywny</strong></td>
                                    <td>
                                    <div class="ui form">
                                        <select name="active">
                                            <option value="1" <?php if($row['active']==1){echo 'selected';}; ?> >Tak</option>
                                            <option value="0" <?php if($row['active']==0){echo 'selected';}; ?> >Nie</option>
                                        </select>
                                    </div>
                                    </td>
                                </tr>
                            </table>
                        <?php endforeach;?>
                        <div class="ui center aligned container">
                            <input type="submit" name="send" value="Wyślij" /></form>
                        </div>
                    </div>
                </div>
                <div class="three wide column"></div>
            </div>
        </div>
    </div>
</div>