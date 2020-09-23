<?php
include "cdn.php";
include "db_connection.php";
include "functions.php";
createAccount();
?>

<meta name=”viewport” content=”width=device-width, initial-scale="1.0">
<body style="background-color: #007bff;">

<div class="container-flex">

<div class="d-flex justify-content-center my-4">
<div class="card" style="width: 22rem;">
  <div class="card-body">
    <h2 class="card-title d-flex justify-content-center" style="font-family:cursive;">Login</h2>
    <ul class="nav nav-tabs justify-content-center my-4" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Log In</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sign Up</a>
  </li>
</ul>

  <?php displayMessage();?>

<div class="tab-content my-4" id="myTabContent">
  <!-- Log in -->
<?php include "login.php";?>
  <!-- Signup -->
<?php include "signUp.php";?>

</div>
  </div>
</div>
</div>

</div>

</body>
<script type="text/javascript">
      setTimeout(function() {
         document.getElementById("message").style.display = 'none';
      }, 3000);

$(".toggle-password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  //console.log(this);
  var input = $($(this).attr("toggle"));
 // console.log("input",input);
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

  $(".toggle-password_1").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input1 = $($(this).attr("toggle"));
  if (input1.attr("type") == "password") {
    input1.attr("type", "text");
  } else {
    input1.attr("type", "password");
  }
});

  $(".confirm_password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input2 = $($(this).attr("toggle"));
  if (input2.attr("type") == "password") {
    input2.attr("type", "text");
  } else {
    input2.attr("type", "password");
  }
});
</script>