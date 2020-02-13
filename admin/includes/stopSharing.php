<?php ob_start(); ?>
<?php include "../../includes/db.php"; ?>
<?php session_start(); ?>

<?php
    $path = $_GET['path'];
    $sharingWith = $_GET['sharingWith'];
    $userID = $_SESSION['id'];

    $query = "SELECT * FROM users WHERE email = '{$sharingWith}'";
    $select_user_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($select_user_query)) {
        $sharingWithID = $row['id'];
    }

    $query = "SELECT * FROM files WHERE filePath = '{$path}'";
    $select_user_query = mysqli_query($connection, $query);
    while ($result = mysqli_fetch_array($select_user_query)) {
        $fileID = $result['id'];
    }

    $query = "DELETE FROM usershare WHERE id_User = '{$userID}' AND id_UserSharedWith = '{$sharingWithID}' AND fileID = '{$fileID}'";
    $select_user_query = mysqli_query($connection, $query);

    header("Location: ../fileStoppedSharing.php");
?>