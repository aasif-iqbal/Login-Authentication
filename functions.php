<?php
include "db_connection.php";
ob_start(); //ob_start() turns on output buffering.

if (!isset($_SESSION)) {
	session_start();
}

function setMessage($message) {

	if (!empty($message)) {
		$_SESSION['message'] = $message;
	} else {
		$message = "";
	}
}

function displayMessage() {

	if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
		echo ("<div class='alert alert-danger text-center' role='alert' id='message'>");
		echo ($_SESSION['message']);
		unset($_SESSION['message']);
		echo ("</div>");
	}
}

function createAccount() {
	global $connection;

	if (isset($_POST['create'])) {
		$user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
		$user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);
		$confirm_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);
		$status = 1; //active status by default
		$password = md5($password);
		$confirm_password = md5($confirm_password);
		$token = bin2hex(random_bytes(15));

		if (empty($user_name)) {
			setMessage("Username is required");
		}
		if (empty($user_email)) {
			setMessage("Email address is required");
		}
		if (empty($password)) {
			setMessage("Password is required");
		}

		$prepare_statement = mysqli_prepare($connection, "INSERT INTO `tbl_users` (username,email,password,confirm_password,token,status) VALUES(?, ?, ?, ?, ?, ?)");

		if (false === $prepare_statement) {
			die('prepare() failed: ' . htmlspecialchars($mysqli->error));
		}

		$bind_value = $prepare_statement->bind_param("sssssi", $user_name, $user_email, $password, $confirm_password, $token, $status);

		if (false === $bind_value) {
			die('bind_param() failed: ' . htmlspecialchars($prepare_statement->error));
		}

		$bind_value = $prepare_statement->execute();

		if (false === $bind_value) {
			die('execute() failed: ' . htmlspecialchars($prepare_statement->error));
		}
		$prepare_statement->close();
		header("location:index.php");
	}
}

function userLogin() {
	global $connection;
	$_SESSION['success'] = "";

	if (isset($_POST['login'])) {

		$userName = mysqli_real_escape_string($connection, $_POST['userName']);
		$userPassword = mysqli_real_escape_string($connection, $_POST['userPassword']);

		//Error check
		if (empty($userName)) {
			setMessage("Username is required");
		}
		if (empty($userPassword)) {
			setMessage("Password is required");
		}
		$userPassword = md5($userPassword);
		$query = "SELECT * FROM `tbl_users` WHERE
								username = '$userName' AND password = '$userPassword'";
		$results = mysqli_query($connection, $query) or die(mysqli_error($connection));

		$row = mysqli_num_rows($results);

		$users = mysqli_fetch_assoc($results);
		$status = $users['status'];

		// row == 1 mean unique username&Password in db

		if ($row == 1 && $status == 1) {

			$_SESSION['userId'] = $users['user_id'];
			$_SESSION['userName'] = $userName;
			$_SESSION['email'] = $users['email'];
			// Welcome message
			$_SESSION['success'] = "You have logged in!";

			header('location: welcome.php');
		} else if ($row == 1 && $status == 0) {
			setMessage("You Are <strong>Blocked</strong>.Please Contact <strong>Admin</strong> to Activate your Account.");
		} else {
			setMessage("Wrong Username Or Password");
		}
	}
}

function resetPassword() {
	global $connection;
	if (isset($_POST['reset_password'])) {
		$new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';
		$confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

		$new_password = mysqli_real_escape_string($connection, $new_password);
		$confirm_password = mysqli_real_escape_string($connection, $confirm_password);

		if (empty($new_password)) {
			setMessage("Required Password");
		}
		if (empty($confirm_password)) {
			setMessage("Required Password");
		}
		$new_password = md5($new_password);
		$confirm_password = md5($confirm_password);

		if (isset($_GET['token'])) {
			$token_id = $_GET['token'];
			if ($new_password != $confirm_password && !empty($new_password) && !empty($confirm_password)) {
				setMessage("Password Mismatch");
			} else {
				$query = "UPDATE `tbl_users` SET
							`password` = '$new_password',
							`confirm_password` ='$confirm_password'
						WHERE token = '$token_id'";
				$results = mysqli_query($connection, $query) or die(mysqli_error($connection));
				setMessage("New Password Updated");
			}
		} else {
			setMessage("Token Not Found");
		}
	}
}
?>