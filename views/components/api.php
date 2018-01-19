<section>
  <h2>API Example</h2>
  <div class="container">
    <?php      
      foreach ($data as $item) {
        echo $item["volumeInfo"]["title"]."<br /> \n";
      }
    ?>
  </div>
</section>