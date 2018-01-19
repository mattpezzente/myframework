<style type="text/css">
  th, td {
    width: 200px;
  }
</style>
<section>
  <h2>CRUD Example</h2>
  <div class="container">
    <div class="starter-template">
      <a href="/proc/addForm">Add Fruit</a>
      <br>
      <table>
        <thead>
          <tr>
            <th>Fruit</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>        
          <?php
            // var_dump($data);
            foreach ($data as $fruit) {
              echo "<tr>";
              echo "<td>".$fruit["name"]."</td>";              
              echo "<td><a href='/proc/updateForm/".$fruit["id"]."'>Update</a></td>";
              echo "<td><a href='/proc/deleteAction/".$fruit["id"]."'>Delete</a></td>";
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</section>