<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <form action="index.php" method="POST" name="">
    <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username">
    <span class="fa fa-user-o field-icon"></span>
    <span class="text-danger" id="error_username" style="font-size: 14px;"></span>
    </div>
   <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email Address">
    <span class="fa fa-envelope-o  field-icon"></span>
    <span class="text-danger" id="error_email" style="font-size: 14px;"></span>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input id="password-field_1" type="password" class="form-control" name="password" placeholder="Password" value="">
    <span  toggle="#password-field_1"  class="fa fa-eye field-icon toggle-password_1"></span>
    <span class="text-danger" id="error_password" style="font-size: 14px;"></span>
  </div>
  <div class="form-group">
    <label for="confirm_password">Confirm Password</label>
    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
    <span  toggle="#confirm_password"  class="fa fa-eye field-icon confirm_password"></span>
    <span class="text-danger" id="error_confirmPassword" style="font-size: 14px;"></span>
    <span class="text-success" id="success_confirmPassword" style="font-size: 14px;"></span>
  </div>
  <div class="d-flex justify-content-center my-4">
    <button type="submit" onclick="return signUpValidation()" name="create"  style="border-radius: 24px;" class="btn btn-primary btn-block d-flex justify-content-center box-shadow--16dp">Create An Account</button>
  </div>
  </form>
</div>
