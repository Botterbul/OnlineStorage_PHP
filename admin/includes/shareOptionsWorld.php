<?php ob_start(); ?>
<?php include "../../includes/db.php"; ?>
<?php session_start(); ?>

<?php

if(isset($_POST['share'])) {

    //World Permissions
    $path = $_GET['path'];
    $selectWorldPermissions = $_POST['worldPermissions'];
    $userID = $_SESSION['id'];
	$queryUserMadeFile = "SELECT * FROM files WHERE userCreated = {$userID} AND filePath = '{$path}'";
    $select_user_queryOther = mysqli_query($connection, $queryUserMadeFile);
    if (!$select_user_queryOther) {
        printf("Error: %s\n", mysqli_error($connection));
        exit();
    }
	$rowUserMadeFile = mysqli_fetch_array($select_user_queryOther);
    $query = "UPDATE files SET worldPermission = '" . $selectWorldPermissions . "' WHERE id = " . $rowUserMadeFile['id'] . ";";
    $select_user_query = mysqli_query($connection, $query);

    header("Location: ../sharingUpdated.php");
}

?>