<?php ob_start(); ?>
<?php include "../../includes/db.php"; ?>
<?php session_start(); ?>

<?php

if(isset($_POST['share'])) {

    //User Permissions
    $path = $_GET['path'];
    $emailSharing = $_POST['emailSharing'];
    $userID = $_SESSION['id'];
    $queryUserMade = "SELECT * FROM users WHERE email = '{$emailSharing}'";
    $select_user_query = mysqli_query($connection, $queryUserMade);
    $rowUserMade = mysqli_fetch_array($select_user_query);
    $SharedWithID = $rowUserMade['id'];

    $queryUserMadeFileNew = "SELECT * FROM files WHERE filePath = '{$path}'";
    $select_user_queryOtherSecond = mysqli_query($connection, $queryUserMadeFileNew);
	$rowUserMadeFileSecond = mysqli_fetch_array($select_user_queryOtherSecond);
	$fileID = $rowUserMadeFileSecond['id'];

    $queryUserMadeFile = "INSERT INTO usershare (id_User, id_UserSharedWith, fileID) VALUES ({$userID}, $SharedWithID, $fileID)";
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

if(isset($_POST['createGroup'])) {
    $groupName = $_POST['groupName'];
	$query = "INSERT INTO groups (group_Name) VALUES ('{$groupName}')";
    $result = mysqli_query($connection, $query);
    header("Location: ../groupCreatedSuccess.php");
}

?>