<style type="text/css">
  .gallery_product {
    margin-bottom: 1rem;
  }
</style>

<section>
  <div class="container">
    <div class="row">
      <div class="col-xs-4 col-lg-12 mx-auto">
        <h1 class="gallery-title">Profile</h1>
      </div>
      <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
        <img src="http://fakeimg.pl/200x200/" class="img-responsive">
      </div>
      <form name="porfileUpdate" id="updateProfile" action="/profile/updateProfile" method="POST" enctype="multipart/form-data">
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Browse:</label>
            <input type="file" name="img" class="form-control" placeholder="Browse" id="profileUpload" required >
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" id="sendMessageButton"/>Upload
        </div>
      </form>
      <h2><?php echo @$_SESSION['userMessage'] ?></h2>
    </div>
  </div>
</section>