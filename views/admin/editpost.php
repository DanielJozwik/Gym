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
                $query = $db->query("SELECT * FROM news WHERE id = $id");
            ?>

            <div class="ui grid">
                <div class="three wide column"></div>
                <div class="ten wide column">
                    <div class="ui center aligned container">
                        <h3>Edycja posta nr <?php echo $_GET['id'];?>:</h3>
                        <form action="/admin/postedit" method="POST" enctype="multipart/form-data">
                        <?php foreach($query as $row) : ?>
                            <table class="ui selectable celled center aligned table">
                                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                <tr>
                                    <td><strong>Tytuł</strong></td>
                                    <td>
                                        <div class="ui fluid input">
                                            <input type="text" name="title" value="<?php echo $row['title'];?>"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Zdjęcie</strong></td>
                                    <td>
                                        <div class="ui fluid input">
                                            <input type="file" name="plik" accept="image/jpeg" />
                                        </div>
                                        <div>Pozostawienie tego pola pustego spowoduje brak zmiany obrazka. Wymagany format jpg.</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Treść</strong></td>
                                    <td>
                                    <div class="ui form">
                                        <textarea name="content" rows="8"><?php echo $row['content'];?></textarea>
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