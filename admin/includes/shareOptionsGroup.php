<?php ob_start(); ?>
<?php include "../../includes/db.php"; ?>
<?php session_start(); ?>

<?php

if(isset($_POST['share'])) {
    $userID = $_SESSION['id'];
    $path = $_GET['path'];
    $queryUserMadeFileNew = "SELECT * FROM files WHERE filePath = '{$path}'";
    $select_user_queryOtherSecond = mysqli_query($connection, $queryUserMadeFileNew);
	$rowUserMadeFileSecond = mysqli_fetch_array($select_user_queryOtherSecond);
	$fileID = $rowUserMadeFileSecond['id'];

    //Group Permissions
    $groupPermission = $_POST['groupPermission'];
    $queryUserMadeFile = "SELECT * FROM groups WHERE group_Name = '{$groupPermission}'";
    $select_user_queryOther = mysqli_query($connection, $queryUserMadeFile);
	$rowUserMadeFile = mysqli_fetch_array($select_user_queryOther);
	$groupID = $rowUserMadeFile['id'];


	$queryUserMadeFile = "INSERT INTO usergroups (id_User, id_Group, fileID) VALUES ({$userID}, {$groupID}, {$fileID})";
    $select_user_queryOther = mysqli_query($connection, $queryUserMadeFile);

    header("Location: ../sharingUpdated.php");
}

?>