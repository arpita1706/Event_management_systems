<!-- Login Modal (Bootstrap 3.3.7) -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header" style="background: #d79595;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login Here</h4>
      </div>

      <div class="modal-body">
        <form action="partials/_handleLogin.php" method="post">

          <div class="form-group">
            <label><b>Username</b></label>
            <input type="text" name="loginusername" class="form-control" placeholder="Enter Your Username" required>
          </div>

          <div class="form-group">
            <label><b>Password</b></label>
            <input type="password" name="loginpassword" class="form-control" placeholder="Enter Your Password" required>
          </div>

          <button class="btn btn-success" type="submit">Submit</button>
        </form>

        <p style="margin-top:10px;">
          Don’t have an account? 
          <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">Sign up now</a>.
        </p>
      </div>

    </div>
  </div>
</div>
