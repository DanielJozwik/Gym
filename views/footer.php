</div>

<div class="ui inverted vertical footer segment">
    <div class="ui center aligned container">
      <div class="ui horizontal inverted small divided link list">
        <?php 
          if(isset($_SESSION['loggedUser']))
          {
            if(unserialize($_SESSION['loggedUser'])->getStatus() == "admin")
            {
                echo "<a class='item' href='/admin'>Panel administratora</a>";
            }
          }
        ?>
        <a class="item" href="/regulamin">Regulamin</a>
        <a class="item" href="/kontakt">Kontakt</a>
      </div>
    </div>
</div>

</body>
</html>