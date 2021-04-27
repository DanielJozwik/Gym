<div class="row">
        <div class="ui segment">
            <div class="row">
                    <div class="ui center aligned container">
                        <h2><i>Panel klienta</i></h2>
                    </div>
            </div>

            <div class="ui divider"></div>

            <div class="row">
                <div class="ui center aligned container">
                    <h3>Ustal trening:</h3>
                </div>
            </div>

            <div class="row">
                <div class="ui grid container">
                    <div class="three wide column"></div>
                    <div class="ten wide column">
                    <form action="/ustaltrening" method="">
                        <table class="ui selectable celled center aligned table">
                            <tr>
                                <td><strong>Trener</strong></td>
                                <td>
                                    <?php
                                        $query = $db->query("SELECT * FROM users WHERE status='trener';");
                                    ?>
                                    <div class="ui action input">
                                    <select name="trener" class="ui compact selection dropdown">
                                        <?php foreach($query as $row): ?>
                                            <option value="<?php echo $row['id'];?>" > 
                                                <?php echo $row['name'].' '.$row['surname']?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Trening</strong></td>
                                <td>
                                    <?php
                                        $query = $db->query("SELECT * FROM activity_types;");
                                    ?>
                                    <div class="ui action input">
                                    <select name="trening" class="ui compact selection dropdown">
                                        <?php foreach($query as $row): ?>
                                            <option value="<?php echo $row['type_id'];?>" > 
                                                <?php echo $row['type']?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Data</strong></td>
                                <td>
                                    <div class="ui input">
                                        <input type="date" name="date"/>
                                        
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Godzina</strong></td>
                                <td>
                                    <div class="ui input">
                                        <input type="time" name="time"/>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <div class="ui center aligned container">
                     <input type="submit" name="send" value="Ustal" /></form>
                        </div>
                    </div>
                    <div class="three wide column"></div>
                </div>
            </div>
        </div>
    </div>