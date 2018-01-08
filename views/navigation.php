<header>
  <div class="wrapper">
    <?
    $keys = array_keys($data);
      for ($i=0; $i < count($data)-1; $i++) {
        if ($i == @$data['pageId']) {
          echo '<a class="current-page" href="'.$data[$keys[$i]].'">'.$keys[$i].'</a>';
        }
        else {
          echo "<a href=".$data[$keys[$i]].">".$keys[$i]."</a>";
        } 
      }
    ?>
  </div>
</header>
<?php 
  if ($data['pageId']==1) {
    include 'helloworld.php';
  }
  else {
    include 'welcome.php';
  }
