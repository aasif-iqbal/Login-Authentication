<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

include "cdn.php";
include "db_connection.php";
include "functions.php";

include "PHPMailer/PHPMailer.php";
include "PHPMailer/OAuth.php";
include "PHPMailer/SMTP.php";
include "PHPMailer/Exception.php";
include "PHPMailer/POP3.php";

if (isset($_POST['recover_password'])) {

	$email_recovery = isset($_POST['email_recovery']) ? $_POST['email_recovery'] : '';
	$email_recovery = mysqli_real_escape_string($connection, $email_recovery);

	$query = "SELECT * FROM `tbl_users` WHERE email = '$email_recovery'";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

	if (empty($email_recovery)) {
		setMessage("Required Email Address");
	}
	$userdata = mysqli_fetch_assoc($result);
	$username = $userdata['username'];
	$token_id = $userdata['token'];
	//$emailExample: javascriptdev067@gmail.com
	$emailCount = mysqli_num_rows($result);

	if ($emailCount == 1) {
		$mail = new PHPMailer(true);
		try {
			//Server settings
			//$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
			$mail->isSMTP(); // Send using SMTP
			$mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
			$mail->SMTPAuth = true; // Enable SMTP authentication
			$mail->Username = 'johndeo8789@gmail.com'; // SMTP username
			$mail->Password = 'xxxxxxxxxx'; // SMTP password(your password)
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			//Recipients
			$mail->setFrom('johndeo8789@gmail.com', 'Password Reset');
			$mail->addAddress($email_recovery, $username); // Add a recipient
			$mail->addReplyTo('johndeo8789@gmail.com', 'YourCompanyName');

			// Content
			$mail->isHTML(true); // Set email format to HTML
			$mail->Subject = 'Password Reset';
			$mail->Body = "Hi, " . $username . " .Click here to Reset Your Password http://localhost/root/User_Login/password_reset.php?token=" . $token_id .
			$mail->send();
			echo '<div class="w-50 alert alert-primary my-4 text-center" id="message" style="margin:auto;">Message has been sent.Check Your Mail To Reset Password.</div>';
		} catch (Exception $e) {
			echo '<div class="w-50 alert alert-danger my-4 text-center" id="message" style="margin:auto;">Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>';
		}
	} else {
		setMessage("Wrong Email Address");
	}
}
?>
</style>
<meta name=”viewport” content=”width=device-width, initial-scale="1.0">
<body style="background-color: #007bff;">
  <div class="container-flex">
    <div class="d-flex justify-content-center my-4">
  <div class="card" style="width: 24rem;">
  <div class="card-body">
    <h2 class="card-title d-flex justify-content-center" style="font-family:cursive;">Password Recovery</h2>
    <?php displayMessage();?>
    <div class="alert alert-info my-4" role="alert">
  Enter your email address and we will send you a link to reset your password.
</div>
<div class="my-4">
    <form method="POST">
  <div class="form-group">
    <label for="emai_recovery">Email Address</label>
    <input type="text" class="form-control" id="email_recovery" name="email_recovery" placeholder="Enter Email Address">
    <span toggle="#password-field"  class="fa fa-envelope-o  field-icon"></span>
    <span class="text-danger" id="error_email" style="font-size: 14px;"></span>
  </div>

  <div class="form-group">
    <label>
    <small class="float-right"><a href="index.php">Return to login</a></small>
    </label>
  </div>

  <div class="d-flex justify-content-center">
  <button class="btn btn-primary btn-block d-flex justify-content-center box-shadow--16dp" type="submit" name="recover_password" onclick="return passwordRecoveryValidation();" style="border-radius: 24px;">Send Mail</button>
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
}, 6000);
</script>