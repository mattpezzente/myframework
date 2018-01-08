<header>
  <div class="wrapper">
    <?
      $i = 0;
      foreach ($data as $key => $value) {
        if ($key == 'currentpage') {
          //Do Nothing
        }
        else if ($i == $data['currentpage']) {
          echo '<a class="current-page" href='.$value.'>'.$key.'</a>';
        }
        else {
          echo "<a href=".$value.">".$key."</a>";
        }
        $i++;
      }
    ?>
  </div>
</header>
