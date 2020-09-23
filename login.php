  <?php userLogin();?>
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <form action="index.php" method="POST">
    <div class="form-group">
      <label for="userName">Username</label>
      <input type="text" class="form-control" id="userName" name="userName" placeholder="Username">
      <span class="fa fa-user-o  field-icon"></span>
      <span class="text-danger" id="error_userName" style="font-size: 14px;"></span>
    </div>
    <div class="form-group">
      <label for="inputPassword1">Password</label>
      <input id="password-field" type="password" class="form-control" name="userPassword" placeholder="Password">
      <span toggle="#password-field"  class="fa fa-eye  field-icon toggle-password"></span>
      <span class="text-danger" id="error_userPassword" style="font-size: 14px;"></span>
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Remember me</label>
      <small class="float-right"><a href="password_recovery.php">Forget password?</a></small>
    </div>
    <div class="d-flex justify-content-center">
    <button type="submit" name="login" style="border-radius: 24px;" onclick="return loginValidation();" class="btn btn-block btn-primary my-3 box-shadow--16dp">Log In</button>
  </div>
  </form>
</div>




