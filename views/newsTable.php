<?php
    $limit = 4;
    $query = "SELECT * FROM news";

    if(isset($_SESSION['loggedUser']))
    {
      $status = unserialize($_SESSION['loggedUser'])->getStatus();
    }

    $s = $db->query($query);
    $total_results = $s->rowCount();
    $total_pages = ceil($total_results / $limit);

    if (!isset($_GET['page'])) 
    {
        $page = 1;
    } 
    else
    {
        $page = $_GET['page'];
    }



    $starting_limit = ($page-1) * $limit;

    $show  = "SELECT news.id, title, content, date, name, surname, image FROM `news` LEFT JOIN users ON news.id_user = users.id ORDER BY date desc LIMIT $starting_limit,$limit";
    $r = $db->query($show);
?>

<div class="ui container">
  <div class="ui horizontal divider header">
    <i class="calendar alternate outline icon"></i>
    Aktualności
  </div>

  <?php  while($res = $r->fetch(PDO::FETCH_ASSOC)):?> 
    <div class="ui grid" style="min-height: 12em;">
      <div class="two wide column"></div>
      <div class="seven wide column">
        <div>
          <h2 class="ui header"><?php echo $res['title'];?></h2>
        </div>
        <div style="color: grey;">
          <?php echo $res['date'];?>
          przez
          <?php echo $res['name'].' '.$res['surname'];?>
        </div>

        <?php 
          if(isset($_SESSION['loggedUser']))
          {
            if($status=="admin")
            {
                echo "<a href='/admin/edytujposta?id=".$res['id']."'>Edytuj</a> ";
                echo "<a href='/admin/usunposta?id=".$res['id']."'>Usuń</a><br>";
            }
          }
        ?>
        <br>
        <p><?php echo $res['content'];?></p>
      </div>
      <div class="four wide column">
        <img class="ui centered small image" src="/other/news/<?php echo $res['image'];?>">
      </div>
      <div class="two wide column"></div>
    </div>

  <div class="ui divider"></div>
  <?php endwhile; ?>

    <div class="ui center aligned container">
      <?php for ($page=1; $page <= $total_pages ; $page++): ?>
            <a href='<?php echo "?page=$page"; ?>' class="links">
            <?php 
              if (!isset($_GET['page'])) 
              {
                  $_GET['page'] = 1;
              } 

              if($_GET['page'] == $page )
              {
                echo "<b>".$page."</b>";
              }
              else
              {
                echo $page;
              }
            ?>
            </a>&nbsp;
      <?php endfor; ?>
      <div class="ui divider"></div>
    </div>

  </div>
</div>