<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <h2>Registration Form</h2>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form name="sentMessage" id="contactForm" novalidate="">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Username" id="username" required="" data-validation-required-message="Please enter your username." aria-invalid="false">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password" id="password" required data-validation-required-message="Please enter your password.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" name="messsage" class="form-control" placeholder="Message" id="message" required="" data-validation-required-message="Please enter a message." aria-invalid="false"></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <p>Please select your gender:</p>
              <input type="radio" name="gender" class="form-control" id="gender1" value="Male">
              <label style="opacity: 1;top:-1rem;left:2rem;color:#000;" for="gender1">Male</label>
              <p class="help-block text-danger"></p>
              <input type="radio" name="gender" class="form-control" id="gender2" value="Female">
              <label style="opacity: 1;top:-1rem;left:2rem;color:#000;" for="gender2">Female</label>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <p>Newsletter</p>
              <input type="checkbox" name="newsletter" checked="true" class="form-control" id="newsletter">
              <label style="opacity: 1;top:-1rem;left:2rem;color:#000;" for="newsletter">Recieve Newsletter</label>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <p>Age</p>
              <select name="age" class="form-control" id="age" style="max-width: 5rem;">         
                <?php for ($i=1; $i <= 100; $i++) { 
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
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>