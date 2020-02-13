<?php ob_start(); ?>
<?php include "./../includes/db.php"; ?>
<?php session_start(); ?>

<?php

    $userID = $_SESSION['id'];
    $userEmail = $_SESSION['email'];

    $query = "SELECT * FROM files WHERE userCreated = '{$userID}' ";
    $select_user_query = mysqli_query($connection, $query);
    
    if(!$select_user_query) {
        die("Query Failed" . mysqli_error($connection));
    }
    
    while ($row = mysqli_fetch_array($select_user_query)) {
        echo $row['filePath'];
        echo $row['worldPermission'];
    }

?>