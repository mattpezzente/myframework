<!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <p class="copyright text-muted">Copyright &copy; Matthew Pezzente 2018</p>
          </div>
        </div>
      </div>
    </footer>
  
    <!-- Bootstrap core JavaScript -->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover(); 
    });  
    </script>
    <script>
      $('#sendMessageButtonAJAX').click(function() {
        let username = document.querySelector('input[name="username"]').value
        let password = document.querySelector('input[name="password"]').value
        let message = document.querySelector('#message').value
        console.log('work1');
        $.ajax({
          method: 'POST',
          url: '/contact/ajaxValidation', 
          data: {
            username: username,
            password: password,
            message: message,
            gender: 'gender',
            newsletter: 'newsletter',
            age: 'age'
          },
          success: function(msg) {
            if (msg=='yes'){alert('Success!')}else{alert('Login unsuccessful, please try again.')}
          }
        });
      });
    </script>
  
    <!-- Custom scripts for this template -->
    <script src="/assets/js/clean-blog.min.js"></script>
  </body>
</html>
