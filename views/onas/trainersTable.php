<?php
    $query = $db->query("SELECT trainers_content.title, trainers_content.content, users.avatar, users.name, users.surname FROM trainers_content LEFT JOIN users ON trainers_content.trainer_id = users.id WHERE status = 'trener'");
?>

<div class="ui container">
  <div class="ui horizontal divider header">
  <i class="address card icon"></i>
    Trenerzy Personalni
  </div>
  <br>
  <?php foreach($query as $row): ?>
    <div class="ui grid">
      <div class="two wide column">
      </div>

      <div class="three wide column">
        <img class="ui centered middle aligned medium rounded image" src="/other/avatars/<?php echo $row['avatar'];?>">
      </div>

      <div class="nine wide column">
        <h2><?php echo $row['name'].' '.$row['surname'];?></h2>
        <h4><?php echo $row['title'];?></h4>
        <?php echo $row['content'];?>
      </div>
      
      <div class="two wide column">
      </div>
    </div>
  <div class="ui divider"></div>
  <?php endforeach; ?>
</div>