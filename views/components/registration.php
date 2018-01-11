<section>
  <?php
    if (@$data['success']) {
      echo '<p style="color: #2fe205">'.$data['success'].'</p>';
    }
  ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <h2>Validation Form</h2>
        <form name="sentMessage" id="contactForm" action="/contact/userAuth" method="POST">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="*Username" id="username" required="" data-validation-required-message="Please enter your username." aria-invalid="false" value=<?php  
                if (@$_REQUEST['username']) {
                  echo $_REQUEST['username'];
                }
              ?>>
              <p class="help-block text-danger"><?php echo @$data['username']?></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="*Password" id="password" required data-validation-required-message="Please enter your password.">
              <p class="help-block text-danger"><?php echo @$data['password']?></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" name="message" class="form-control" placeholder="Message" id="message" data-validation-required-message="Please enter a message." aria-invalid="false"><?php  
                if (@$_REQUEST['message']) {
                  echo $_REQUEST['message'];
                }
              ?></textarea>
              <p class="help-block text-danger"><?php echo @$data['message']?></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <p>Please select your gender:</p>
              <?php 
                if (@$_REQUEST['gender'] == 'Female') {
                 echo '<input type="radio" checked name="gender" class="form-control" id="gender1" value="Male">
                  <label style="opacity: 1;top:-1rem;left:2rem;color:#000;" for="gender1">Male</label>
                  <p class="help-block text-danger"></p>
                  <input type="radio" checked name="gender" class="form-control" id="gender2" value="Female">
                  <label style="opacity: 1;top:-1rem;left:2rem;color:#000;" for="gender2">Female</label>';
                }
                else {
                  echo '<input type="radio" checked name="gender" class="form-control" id="gender1" value="Male">
                  <label style="opacity: 1;top:-1rem;left:2rem;color:#000;" for="gender1">Male</label>
                  <p class="help-block text-danger"></p>
                  <input type="radio" name="gender" class="form-control" id="gender2" value="Female">
                  <label style="opacity: 1;top:-1rem;left:2rem;color:#000;" for="gender2">Female</label>';
                }
              ?>              
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <p>Newsletter</p>
              <?php
                if (@count($_REQUEST['newsletter']) == 0) {
                  echo '<input type="checkbox" checked name="newsletter" class="form-control" id="newsletter">';
                }
                else if (!@$_REQUEST['newsletter']) {
                  echo '<input type="checkbox" name="newsletter" class="form-control" id="newsletter">';
                }
                else {
                  echo '<input type="checkbox" checked name="newsletter" class="form-control" id="newsletter">';
                }
              ?>         
              <label style="opacity: 1;top:-1rem;left:2rem;color:#000;" for="newsletter">Recieve Newsletter</label>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <p>Age</p>
              <select name="age" class="form-control" id="age" style="max-width: 5rem;">
                <?php  
                  if (@$_REQUEST['age']) {
                    echo "<option>".$_REQUEST['age']."</option>";
                  }
                  for ($i=1; $i <= 100; $i++) { 
                    echo "<option>{$i}</option>";
                  }
                ?>         
              </select>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Login</button>
            <input type="button" class="btn btn-primary ajaxBtn" id="sendMessageButtonAJAX" value="Login With AJAX">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>