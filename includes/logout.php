<?php include "db.php"; ?>
<?php 
	session_start();
	$id = $_SESSION['id'];
	$my_date = date("M,d,Y h:i:s A");
	$query = "UPDATE sessionsTable SET clockoutTime = '$my_date' WHERE userID = {$id};";
	$select_user_query = mysqli_query($connection, $query);

	header("Location: ../index.php");

	$_SESSION['email'] = null;
	$_SESSION['name'] = null;
	$_SESSION['id'] = null;
 ?>