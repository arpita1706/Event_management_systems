<!-- Sign Up Modal (Bootstrap 3.3.7) -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header" style="background: #d79595;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SignUp Here</h4>
      </div>

      <div class="modal-body">
        <form action="partials/_handleSignup.php" method="post">

          <div class="form-group">
            <label><b>Username</b></label>
            <input type="text" id="username" name="username" class="form-control"
                   placeholder="Choose a unique Username" required minlength="3" maxlength="11">
          </div>

          <!-- Bootstrap 3 does not support form-row / col-md inside forms directly like BS4 -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><b>First Name:</b></label>
                <input type="text" id="firstName" name="firstName" class="form-control"
                       placeholder="First Name" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><b>Last Name:</b></label>
                <input type="text" id="lastName" name="lastName" class="form-control"
                       placeholder="Last name" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label><b>Email:</b></label>
            <input type="email" id="email" name="email" class="form-control"
                   placeholder="Enter Your Email" required>
          </div>

          <div class="form-group">
            <label><b>Phone No:</b></label>

            <!-- Bootstrap 3 Input Group -->
            <div class="input-group">
              <span class="input-group-addon">+91</span>
              <input type="tel" id="phone" name="phone" class="form-control"
                     placeholder="Enter Your Phone Number"
                     required pattern="[0-9]{10}" maxlength="10">
            </div>
          </div>

          <div class="form-group">
            <label><b>Password:</b></label>
            <input type="password" id="password" name="password" class="form-control"
                   placeholder="Enter Password" required minlength="4" maxlength="21">
          </div>

          <div class="form-group">
            <label><b>Re-enter Password:</b></label>
            <input type="password" id="cpassword" name="cpassword" class="form-control"
                   placeholder="Re-enter Password" required minlength="4" maxlength="21">
          </div>

          <button type="submit" class="btn btn-success">Submit</button>
        </form>

        <p style="margin-top:10px;">
          Already have an account?
          <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Login here</a>.
        </p>
      </div>

    </div>
  </div>
</div>
