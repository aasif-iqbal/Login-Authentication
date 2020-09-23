<?php
include "db_connection.php";
include "functions.php";

if (isset($_GET['delete']) && !empty($_GET['delete'])) {
	global $connection;
	$delete_id = (int) $_GET['delete'];

	$query = "DELETE FROM `tbl_users` WHERE user_id = " . mysqli_escape_string($connection, $_GET['delete']) . " ";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	setMessage("User Details Deleted Successfully");
	header("Location:welcome.php");
}
?>