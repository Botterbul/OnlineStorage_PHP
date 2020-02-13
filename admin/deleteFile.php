<?php ob_start(); ?>
<?php include "./../includes/db.php"; ?>
<?php session_start(); ?>

<?php

$email = $_GET['email'];
$fileName = $_GET['path'];
$path = "Uploads/" . $email . "/" . $fileName;
if(!unlink($path)) {
    echo "You have an error!";
}
else {
    $userID = $_SESSION['id'];
    $queryNew = "SELECT * FROM files WHERE filePath = '{$fileName}'";
    $select_user_query = mysqli_query($connection, $queryNew);
    while ($row = mysqli_fetch_array($select_user_query)) {
        $fileID = $row['id'];
    }

    $query = "DELETE FROM usershare WHERE id_User = '{$userID}' AND fileID = {$fileID}";
    $select_user_query = mysqli_query($connection, $query);

    $query = "DELETE FROM files WHERE filePath = '{$fileName}' ";
    $select_user_query = mysqli_query($connection, $query);

    $query = "DELETE FROM usergroups WHERE id_User = '{$userID}' AND fileID = {$fileID}";
    $select_user_query = mysqli_query($connection, $query);

    header("Location: deleteSuccess.php");
}

?>