<?php include "../../includes/db.php"; ?>
<?php session_start(); ?>
<?php 

if(isset($_POST['submit']))
{

    $file = $_FILES['file']; // Hier is die filepath
    $emailUser = $_SESSION['email'];
    $userID = $_SESSION['id'];
    $filepath = "../Uploads/" . $emailUser;
    $fileSizeFolder = GetDirectorySize($filepath);

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    if (($fileSize + $fileSizeFolder) > 200000000) 
    {
        header("Location: ../uploadFailureDriveTooFull.php");
    }

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if ($fileError === 0) {
        if ($fileSize < 100000000) // Verander max size van files
        {
            $fileNameNew = $fileName;
            $fileDestination = '../Uploads/' . $emailUser . '/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);

            $query = "INSERT INTO files (filePath, userCreated, worldPermission) VALUES ('" . $fileNameNew .  "' , '{$userID}' , 'F');";
            $select_user_query = mysqli_query($connection, $query);

            if(!$select_user_query) {
                die("Query Failed" . mysqli_error($connection));
            }

            header("Location: ../uploadSuccess.php");
        } else {
            header("Location: ../uploadFailure.php"); // File is too big, make sure php in htdocs is changed, otherwise max is set to under 40MB or so per file [PHP default settings of Xampp]
        }
        
    } else {
        header("Location: ../uploadFailure.php");
    }
}

function GetDirectorySize($path){
    $bytestotal = 0;
    $path = realpath($path);
    if($path!==false && $path!='' && file_exists($path)){
            foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
                    $bytestotal += $object->getSize();
            }
    }
    return $bytestotal/1000000; // Vir MB grootte want gee dit in bytes en bytes na KB = /1000 en dan van KB na MB /1000
}
 ?>