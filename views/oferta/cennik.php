<div class="ui container">
  <div class="ui horizontal divider header">
  <i class="money bill alternate icon"></i>Cennik
  </div>
  
    <div class="ui grid">
      <div class="three wide column">
      </div>
      <div class="ten wide column">
        <?php $query = $db->query("SELECT * FROM ticket_types WHERE active = 1;")
        ?>
        <table class='ui selectable celled center aligned table'>
          <th>Nazwa</th>
          <th>Ilość dni</th>
          <th>Aktualna cena</th>
        <?php foreach($query as $row) :?>
          <tr>
            <td><?php echo $row['type_name'];?></td>
            <td><?php echo $row['days'];?></td>
            <td><?php echo $row['price'];?> zł</td>
          </tr>
        <?php endforeach; ?>
        </table>
      </div>
      <div class="three wide column">
      </div> 
    </div>

    <div class="ui grid">
      <div class="three wide column">
      </div>
      <div class="ten wide column">
        <div class="ui container center aligned">
          Cennik jest aktualiowany na bieżąco. Staramy się być najtanszą siłownią w naszym mieście - jeżeli znajdziesz taniej daj nam znać, a dostaniesz rabat. Akceptujemy również niektóre karty partnerskie.
        </div>
      </div>
      <div class="three wide column">
      </div> 
    </div>
    
    <div class="ui divider"></div>
    <div class="ui grid">
      <div class="two wide column">
      </div>
      <div class="four wide column">
        <img class="ui centered big image" src="/other/images/karta1.jpg">
      </div>
      <div class="four wide column">
        <img class="ui centered big image" src="/other/images/karta2.jpg">
      </div>
      <div class="four wide column">
        <img class="ui centered big image" src="/other/images/karta3.jpg">
      </div>
      <div class="two wide column">
      </div> 
    </div>
    <br>
    <div class="ui divider"></div>
  </div>
</div>















 
    
  
     