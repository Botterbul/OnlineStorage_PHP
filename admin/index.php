<?php include "includes/admin_header.php";
 			include "includes/navigationBar.php"; ?>
	<br>
<?php 
	$university = '';
 ?> 

<div class="jumbotron container text-center" style="background-color: #FFFFFF;">
  <h1 class="display-4">Welcome back <?php echo $_SESSION['name']; ?></h1>

	<?php
		$emailUser = $_SESSION['email'];
		$filepath = "Uploads/" . $emailUser;

		$fileSize = GetDirectorySize($filepath);

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

  <p class="lead">You still have <?php echo ROUND(100 - ($fileSize/200*100),2) ?>% space left (<?php echo ROUND(200 - $fileSize,2); ?>MB) on your drive</p> <!-- 200MB per persoon -->
  <div class="progress">
  	<div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="<?php echo ROUND($fileSize/200*100,2)?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ROUND($fileSize/200*100,2)?>%"><?php echo ROUND($fileSize/200*100,2)?>%</div>
		<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="<?php echo ROUND(100 - ($fileSize/200*100),2) ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ROUND(100 - ($fileSize/200*100),2) ?>%"><?php echo ROUND(100 - ($fileSize/200*100),2) ?>%</div>
  </div>
	<hr>
  <h1 class="display-4">Upload Files</h1>
	<form action="includes/UploadFile.php" method="post" enctype="multipart/form-data" onsubmit="return Validate()" name="vform">
		<div>
			<label id="upload">Select file to upload: 
			</label>
			<input type="file" name="file"/>
			<button class="btn btn-primary btn-lg" type="submit" name="submit">UPLOAD</button>
			<div id="noFileChosen_error" class="val_error"></div>
			<div id="driveTooFull_error" class="val_error"></div>
		</div> 
  	</form>
  </div>
</div>


<div class="jumbotron container text-center" style="background-color: #FFFFFF;">
	<h1 class="display-4">My Files</h1>
	<table style="width:100%">
  <tr>
    <th>Filename</th>
		<th>Filesize</th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
	<?php

    $userID = $_SESSION['id'];
    $userEmail = $_SESSION['email'];

    $query = "SELECT * FROM files WHERE userCreated = '{$userID}' ";
		$select_user_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_query)) {

			$fullFilePath = "Uploads/". $userEmail . '/' . $row['filePath'];
			echo "<tr>";
			echo "<th>";
			echo $row['filePath'];
			echo "</th>";

			echo "<th>";
			echo (ROUND(filesize($fullFilePath)/1024/1024,2)) . " MB";
			echo "</th>";

			echo "<th>";
			echo '<a class="btn btn-primary" href="shareOptions.php?path=' . $row['filePath'] . '">Share</a>';
			echo "</th>";

			echo "<th>";
			echo '<a class="btn btn-danger" href="deleteFile.php?email=' . $userEmail . '&path=' . $row['filePath'] . '">Delete</a>';
			echo "</th>";

			echo "<th>";
			echo '<a href="' . $fullFilePath . '" class="btn btn-secondary" >Download</a>';
			echo "</th>";

			echo "</tr>";
    }
	?>
</table>
</div>

<div class="jumbotron container text-center" style="background-color: #FFFFFF;">
	<h1 class="display-4">Shared Files</h1>
	<table style="width:100%">
  <tr>
    <th>Filename</th>
		<th>Filesize</th>
		<th>Sharing With</th>
		<th></th>
	</tr>
	<?php

		$userID = $_SESSION['id'];
		$userEmail = $_SESSION['email'];

    $query = "SELECT * FROM usershare WHERE id_User = '{$userID}' ";
		$select_user_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_query)) {
			$FileID = $row['fileID'];
			$userID = $_SESSION['id'];
			$sharingToID =  $row['id_UserSharedWith'];
			$queryUserMadeFile = "SELECT * FROM files WHERE id = '{$FileID}'";
    	$select_user_queryOther = mysqli_query($connection, $queryUserMadeFile);
			$rowUserMadeFile = mysqli_fetch_array($select_user_queryOther);

			$queryUserMadeFourth = "SELECT * FROM users WHERE id = '{$sharingToID}'";
    	$select_user_queryFourth = mysqli_query($connection, $queryUserMadeFourth);
			$rowUserMadeFileFourth = mysqli_fetch_array($select_user_queryFourth);

			$fullFilePath = "Uploads/". $userEmail . '/' . $rowUserMadeFile['filePath'];
			echo "<tr>";
			echo "<th>";
			echo $rowUserMadeFile['filePath'];
			echo "</th>";

			echo "<th>";
			echo (ROUND(filesize($fullFilePath)/1024/1024,2)) . " MB";
			echo "</th>";

			echo "<th>";
			echo $rowUserMadeFileFourth['email'];
			echo "</th>";

			echo "<th>";
			echo '<a class="btn btn-danger" href="includes/stopSharing.php?path=' . $rowUserMadeFile['filePath'] . '&sharingWith=' . $rowUserMadeFileFourth['email'] . '">Stop Sharing</a>';
			echo "</th>";

			echo "</tr>";
    }
	?>
</table>
</div>

<div class="jumbotron container text-center" style="background-color: #FFFFFF;">
	<h1 class="display-4">Files Shared With Me</h1>
	<table style="width:100%">
  <tr>
    <th>Filename</th>
		<th>Filesize</th>
		<th>File Owner</th>
		<th></th>
	</tr>
	<?php

		$userID = $_SESSION['id'];
		$userEmail = $_SESSION['email'];
    $query = "SELECT * FROM usershare WHERE id_UserSharedWith = '{$userID}' ";
		$select_user_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_query)) {
			$idSharer = $row['id_User'];
			$fileShared = $row['fileID'];
			$queryUserMadeFile = "SELECT * FROM files WHERE id = '{$fileShared}'";
    	$select_user_queryOther = mysqli_query($connection, $queryUserMadeFile);
			$rowUserMadeFile = mysqli_fetch_array($select_user_queryOther);

			//Moet die oorspronlike eienaar kry
			$queryUserMadeFileNew = "SELECT * FROM users WHERE id = '{$idSharer}'";
    	$select_user_queryOtherSecond = mysqli_query($connection, $queryUserMadeFileNew);
			$rowUserMadeFileSecond = mysqli_fetch_array($select_user_queryOtherSecond);
			$sharerEmail = $rowUserMadeFileSecond['email'];

			$fullFilePath = "Uploads/". $sharerEmail . '/' . $rowUserMadeFile['filePath'];
			echo "<tr>";
			echo "<th>";
			echo $rowUserMadeFile['filePath'];
			echo "</th>";

			echo "<th>";
			echo (ROUND(filesize($fullFilePath)/1024/1024,2)) . " MB";
			echo "</th>";

			echo "<th>";
			echo $sharerEmail;
			echo "</th>";

			echo "<th>";
			echo '<a href="' . $fullFilePath . '" class="btn btn-secondary" >Download</a>';
			echo "</th>";

			echo "</tr>";
    }
	?>
</table>
</div>

<div class="jumbotron container text-center" style="background-color: #FFFFFF;">
	<h1 class="display-4">Sharing To Groups</h1>
	<table style="width:100%">
  <tr>
    <th>Filename</th>
		<th>Filesize</th>
		<th>Group Shared With</th>
		<th></th>
		<th></th>
	</tr>
	<?php

    $userID = $_SESSION['id'];
    $userEmail = $_SESSION['email'];

    $query = "SELECT * FROM usergroups WHERE id_User = '{$userID}' ";
		$select_user_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_query)) {
			$idGroupSharedWith = $row['id_Group'];
			$queryNewThird = "SELECT * FROM groups WHERE id = '{$idGroupSharedWith}' ";
			$select_user_queryNewThird = mysqli_query($connection, $queryNewThird);
			$rowNewThird = mysqli_fetch_array($select_user_queryNewThird);
			$groupNameSHaredWith = $rowNewThird['group_Name'];


			$fileID = $row['fileID'];
			$queryNew = "SELECT * FROM files WHERE id = '{$fileID}' ";
			$select_user_queryNew = mysqli_query($connection, $queryNew);
			$rowNew = mysqli_fetch_array($select_user_queryNew);
			$filepath = $rowNew['filePath'];

			$fullFilePath = "Uploads/". $userEmail . '/' . $filepath;
			echo "<tr>";
			echo "<th>";
			echo $filepath;
			echo "</th>";

			echo "<th>";
			echo (ROUND(filesize($fullFilePath)/1024/1024,2)) . " MB";
			echo "</th>";

			echo "<th>";
			echo 	$groupNameSHaredWith;
			echo "</th>";

			echo "<th>";
			echo "";
			echo "</th>";

			echo "<th>";
			echo '<a class="btn btn-danger" href="includes/stopSharingGroup.php?path=' . $filepath . '&sharingWith=' . $groupNameSHaredWith . '">Stop Sharing</a>';
			echo "</th>";

			echo "</tr>";
    }
	?>
</table>
</div>

<div class="jumbotron container text-center" style="background-color: #FFFFFF;">
	<h1 class="display-4">Groups Shared With Me</h1>
	<table style="width:100%">
  <tr>
    <th>Filename</th>
		<th>Filesize</th>
		<th>Group Name</th>
		<th></th>
	</tr>
	<?php

		$userID = $_SESSION['id'];
		$userEmail = $_SESSION['email'];
    $query = "SELECT * FROM usergroupslink WHERE id_User = '{$userID}' ";
		$select_user_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_query)) {
			$idGroup = $row['id_Group'];
			$queryUserMadeFile = "SELECT * FROM groups WHERE id = '{$idGroup}'";
    	$select_user_queryOther = mysqli_query($connection, $queryUserMadeFile);
			$rowUserMadeFile = mysqli_fetch_array($select_user_queryOther);
			$groupName = $rowUserMadeFile['group_Name'];

			$queryNewThird = "SELECT * FROM usergroups WHERE id_Group = '{$idGroup}' ";
			$select_user_queryNewThird = mysqli_query($connection, $queryNewThird);
			$rowNewThird = mysqli_fetch_array($select_user_queryNewThird);
			$fileID = $rowNewThird['fileID'];

			$queryNewFourth = "SELECT * FROM files WHERE id = '{$fileID}' ";
			$select_user_queryNewFourth = mysqli_query($connection, $queryNewFourth);
			$rowNewFourth = mysqli_fetch_array($select_user_queryNewFourth);
			$userCreated = $rowNewFourth['userCreated'];
			$filePathNew = $rowNewFourth['filePath'];;

			$queryNewFith = "SELECT * FROM users WHERE id = '{$userCreated}' ";
			$select_user_queryNewFith = mysqli_query($connection, $queryNewFith);
			$rowNewFith = mysqli_fetch_array($select_user_queryNewFith);
			$sharerEmail = $rowNewFith['email'];

			$fullFilePath = "Uploads/". $sharerEmail . '/' . 	$filePathNew;
			echo "<tr>";
			echo "<th>";
			echo 	$filePathNew;
			echo "</th>";

			echo "<th>";
			echo (ROUND(filesize($fullFilePath)/1024/1024,2)) . " MB";
			echo "</th>";

			echo "<th>";
			echo $groupName;
			echo "</th>";

			echo "<th>";
			if ($rowNewThird['id'] == NULL) {

			} else {
				echo '<a href="' . $fullFilePath . '" class="btn btn-secondary" >Download</a>';
			}
			echo "</th>";

			echo "</tr>";
    }
	?>
</table>
</div>

<div class="jumbotron container text-center" style="background-color: #FFFFFF;">
	<h1 class="display-4">Explore World Files(Public Files)</h1>
	<table style="width:100%">
  <tr>
    <th>Filename</th>
		<th>Filesize</th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
	<?php

    $query = "SELECT * FROM files WHERE worldPermission = 'T'";
    $select_user_query = mysqli_query($connection, $query);
    
    while ($row = mysqli_fetch_array($select_user_query)) {
			$CreatorID = $row['userCreated'];
			$queryUserMadeFileThird = "SELECT * FROM users WHERE id = '{$CreatorID}'";
    	$select_user_queryOtherThird = mysqli_query($connection, $queryUserMadeFileThird);
			$rowUserMadeFileThird = mysqli_fetch_array($select_user_queryOtherThird);
			$fullFilePathThird = "Uploads/". $rowUserMadeFileThird['email'] . '/' . $row['filePath'];

			echo "<tr>";
			echo "<th>";
			echo $row['filePath'];
			echo "</th>";

			echo "<th>";
			echo (ROUND(filesize($fullFilePathThird)/1024/1024,2)) . " MB";
			echo "</th>";

			echo "<th>";
			echo '<a href="' . $fullFilePathThird . '" class="btn btn-secondary" >Download</a>';
			echo "</th>";

			echo "</tr>";

    }
	?>
</table>
</div>

<script type="text/javascript">

	var university = '<?php echo $university ?>';

	window.onload = function() {
  		changeBackground();
	};
	
	function changeBackground(){
		$("body").addClass("default");
	}

</script>


<script type="text/javascript">
  var file = document.forms["vform"]["file"];
  var noFileChosen_error = document.getElementById("noFileChosen_error");
	var driveTooFull_error = document.getElementById("driveTooFull_error");
  function Validate(){
		if (<?php echo ROUND($fileSize/200*100,2)?> >= 99) {
      driveTooFull_error.textContent = "Drive is too full! Delete some files to free up some space.";
      return false;
    }	

    if (file.value == "") {
      noFileChosen_error.textContent = "Choose file to upload before pressing Upload button";
      return false;
    }	
  }

</script>

<?php include "includes/admin_footer.php" ?>
