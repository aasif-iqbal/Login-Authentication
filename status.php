<?php
include "db_connection.php";

if (isset($_POST['value'])) {
	$value = $_POST['value'];
}
if (isset($_POST['user_id'])) {
	$user_id = $_POST['user_id'];
}

$update_status = mysqli_query($connection, "UPDATE `tbl_users` SET status='" . $value . "' WHERE user_id='" . $user_id . "' ");
var_dump($update_status);
if ($update_status) {
	$query = mysqli_query($connection, "SELECT * FROM `tbl_users` WHERE user_id = '" . $user_id . "' ");
	$data = mysqli_fetch_assoc($query);

	header('location:welcome.php');
}
?>