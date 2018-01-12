<section>
  <?php
    if (@$data['success']) {
      echo '<p style="color: #2fe205">'.$data['success'].'</p>';
    }
  ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h2>Login</h2>
        <form name="loginForm" id="loginForm" action="/login/userAuth" method="POST">
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
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Login</button>
            <!--<input type="button" class="btn btn-primary ajaxBtn" id="sendMessageButtonAJAX" value="Login With AJAX"> -->
          </div>
        </form>
        <p>Not registered? <a style="color:#476cdc" href="/register">Click here</a></p>
      </div>
    </div>
  </div>
</section>