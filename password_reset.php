<?php
include "cdn.php";
include "db_connection.php";
include "functions.php";
resetPassword();
?>
</style>
<meta name=”viewport” content=”width=device-width, initial-scale="1.0">
<body style="background-color: #007bff;">
  <div class="container-flex">
    <div class="d-flex justify-content-center my-4">
  <div class="card" style="width: 24rem;">
  <div class="card-body">
    <h2 class="card-title d-flex justify-content-center" style="font-family:cursive;">Reset Password</h2>
    <?php displayMessage();?>

<div class="my-4">
    <form method="POST">
  <div class="form-group">
    <label for="new_password">Reset Password</label>
    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
    <span  toggle="#new_password"  class="fa fa-eye field-icon new_password"></span>
    <span class="text-danger" id="error_resetPassword" style="font-size: 14px;"></span>
  </div>
  <div class="form-group">
    <label for="confirm_password">Confirm Password</label>
    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
    <span  toggle="#confirm_password"  class="fa fa-eye field-icon confirm_password"></span>
    <span class="text-danger" id="error_confirmPassword" style="font-size: 14px;"></span>
    <span class="text-success" id="success_confirmPassword" style="font-size: 14px;"></span>
  </div>

  <div class="form-group">
    <label>
    <small class="float-right"><a href="index.php">Return to login</a></small>
    </label>
  </div>

  <div class="d-flex justify-content-center">
  <button class="btn btn-primary btn-block d-flex justify-content-center box-shadow--16dp" type="submit" name="reset_password" onclick="return passwordResetValidation();" style="border-radius: 24px;">Reset Password</button>
</div>
</form>
</div>
  </div>
  </div>
</div>
</div>
</body>
<script type="text/javascript">
//hide message after 3sec
setTimeout(function() {
   document.getElementById("message").style.display = 'none';
}, 3000);

$(".new_password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

$(".confirm_password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>