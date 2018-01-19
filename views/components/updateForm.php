<div class="container">
  <div class="starter-template">
    <h1>Update a Fruit</h1>
    <?php
      echo "<form action='/proc/updateAction/".pathinfo($_SERVER["REQUEST_URI"])["basename"]."' method='POST'>";
    ?>
      <?php
        echo "<input type='text' name='name' placeholder='Bananas ?' value='".$data[0]["name"]."'/>";
      ?>
      <input type="submit"/>
    </form>  
  </div>
</div>