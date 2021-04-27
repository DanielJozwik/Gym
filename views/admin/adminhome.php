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
                <?php 
                    $myId = unserialize($_SESSION['loggedUser'])->getId();
                    $result = $db->query("SELECT * FROM users WHERE id=$myId");
                ?>
                <div class="ui grid container">
                    <div class="four wide column">
                        <a class="a-color" href="/admin/news">
                        <div class="ui segment center aligned">
                            <i class="massive icons">
                                <i class="envelope open icon"></i>
                                <i class="corner add icon"></i>
                            </i>
                            <br><br>
                            Dodaj nowego posta
                        </div>
                        </a>
                    </div>

                    <div class="four wide column">
                        <a class="a-color" href="/admin/klienci">
                        <div class="ui segment center aligned">
                            <i class="massive address book icon"></i>
                            <br><br>
                            Edycja użytkowników
                        </div>
                        </a>
                    </div>

                    <div class="four wide column">
                        <a class="a-color" href="/admin/karnety">
                        <div class="ui segment center aligned">
                            <i class="massive calendar alternate outline icon"></i>
                            <br><br>
                            Dodaj/edytuj karnety
                        </div>
                        </a>
                    </div>

                    <div class="four wide column">
                        <a class="a-color" href="/admin/treningi">
                        <div class="ui segment center aligned">
                            <i class="massive tasks book icon"></i>
                            <br><br>
                            Dodaj/edytuj typ treningu
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>