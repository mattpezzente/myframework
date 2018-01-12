<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h2>Login</h2>
        <?php
          function create_image($cap) {
            unlink("assets/image1.png");
            global $image;
            $image = imagecreatetruecolor(200, 50) or die("Cannot Initialize new GD image stream");
            $background_color = imagecolorallocate($image, 255, 255, 255);
            $text_color = imagecolorallocate($image, 0, 255, 255);
            $line_color = imagecolorallocate($image, 64, 64, 64);
            $pixel_color = imagecolorallocate($image, 0, 0, 255);
            
            imagefilledrectangle($image, 0, 0, 200, 50, $background_color);
            
            for ($i = 0; $i < 3; $i++) {
               imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);
            }

            for ($i = 0; $i < 1000; $i++) {
              imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);
            }
           $text_color = imagecolorallocate($image, 0, 0, 0);
           ImageString($image, 22, 30, 22, $cap, $text_color);
           $_SESSION['cap'] = $cap;
           imagepng($image, "assets/image1.png");
          }          
        ?>
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
          <?php 
            create_image(@$data['cap']); 
            echo "<img src='/assets/image1.png'>"; 
          ?>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="exampleInputEmail1">Captcha</label>
              <input name="cap" type="captcha" id="captcha"  placeholder="*Captcha">
              <p class="help-block text-danger"><?php echo @$data['captcha'];?></p>
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