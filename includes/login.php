<?php include "db.php"; ?>

<?php session_start(); ?>

<?php 

	if(isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$email = mysqli_real_escape_string($connection, $email );   
		$password = mysqli_real_escape_string($connection, $password );

		$query = "SELECT * FROM users WHERE email = '{$email}' ";
		$select_user_query = mysqli_query($connection, $query);

		if(!$select_user_query) {
			die("Query Failed" . mysqli_error($connection));
		}

		while ($row = mysqli_fetch_array($select_user_query)) {
			$db_name = $row['name'];
			$db_email = $row['email'];
			$db_password = $row['password'];
			$db_id = $row['id'];
		}

		$password = crypt($password, $db_password); 

		if($email === $db_email && $password === $db_password)
		{
			$_SESSION['email'] = $db_email;
			$_SESSION['name'] = $db_name;
			$_SESSION['id'] = $db_id;

			$my_date = date("M,d,Y h:i:s A");
			$query = "INSERT INTO sessionsTable (userID, clockinTime) VALUES ('{$db_id}', '$my_date');";
            $select_user_query = mysqli_query($connection, $query);
			
			header("Location: ../admin");
		}  else if ($email === $db_email && $password !== $db_password) 
		{
			header("Location: ../loginFailedPasswordWrong.php");
		}
		else {
			header("Location: ../loginFailedDBNoEmail.php");
		}


	}

 ?>