<div class="ui stackable container">
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
                $result = $db->query("SELECT * FROM users WHERE id= $id;");
            ?>
            <div class="row">
                <div class="ui center aligned container">
                    <h3>Edycja użytkownika o id <?php echo $id;?>:</h3>
                </div>
            </div>

            <div class="row">
                <div class="ui grid container">
                    <div class="four wide column"></div>
                    <div class="eight wide column">
                        <form action="/admin/edycjausera" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>"/>
                        <?php foreach($result as $row): ?>
                            <table class="ui selectable celled center aligned table">
                                    <tr>
                                        <td><strong>Avatar</strong></td>
                                        <td>
                                            <div class="ui input">
                                                <input type="text" name="avatar" value="<?php echo $row['avatar'];?>"/>
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
                                        <td><strong>Status</strong></td>
                                        <td>
                                            <div class="ui input">
                                                <input type="text" name="status" value="<?php echo $row['status'];?>"/>
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
                                        <td><div class="ui input"><input type="number" name="age" value="<?php echo $row['age'];?>"/></div></td>
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
</div>