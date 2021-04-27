<div class="ui container">
    <div class="row">
        <div class="ui segment">
            <div class="row">
                    <div class="ui center aligned container">
                        <h2>Panel administratora</h2>
                    </div>
            </div>

            <div class="ui divider"></div>

            <div class="ui grid">
                <div class="three wide column"></div>
                <div class="ten wide column">
                    <div class="ui center aligned container">
                        <h3>Dodawanie nowego posta:</h3>
                        <form action="/admin/nowypost" method="POST" enctype="multipart/form-data">
                            <table class="ui selectable celled center aligned table">
                                <tr>
                                    <td><strong>Tytuł</strong></td>
                                    <td>
                                        <div class="ui fluid input">
                                            <input type="text" name="title" value=""/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Zdjęcie</strong></td>
                                    <td>
                                        <div class="ui fluid input">
                                            <input type="file" name="plik" accept="image/jpeg,image/gif" />
                                        </div>
                                        <div>Pozostawienie pustego pola ustawi zdjęcie na domyślne. Wymagany format jpg.</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Treść</strong></td>
                                    <td>
                                    <div class="ui form">
                                        <textarea name="content" rows="8"></textarea>
                                    </div>
                                    </td>
                                </tr>
                            </table>

                        <div class="ui center aligned container">
                            <input type="submit" value="Wyślij" /></form>
                        </div>
                    </div>
                </div>
                <div class="three wide column"></div>
            </div>
        </div>
    </div>
</div>