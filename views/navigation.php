<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="/home">SSL Project</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <?php
          foreach ($data as $lbl => $link) {
            if (strtolower($data['currentpage']) == strtolower($lbl)) {
              echo '<li class="nav-item">';
              echo '<a class="nav-link current-page" href="'.$link.'">'.$lbl.'</a>';
              echo '</li>';
            }
            else if ($lbl == 'currentpage') {
              // skip
            }
            else {
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="'.$link.'">'.$lbl.'</a>';
              echo '</li>';
            }
          }
        ?>
      </ul>
    </div>
  </div>
</nav>