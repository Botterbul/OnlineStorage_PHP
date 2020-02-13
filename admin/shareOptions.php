<?php include "includes/admin_header.php" ?>

<?php include "includes/navigationBar.php"; ?>
<br>
<?php 
	$university = '';
 ?> 

<br>
<br>

<?php

$path = $_GET['path'];
$userID = $_SESSION['id'];

?>

<div class="container">
		<div class="jumbotron text-center">
        <?php
        echo '<form action="includes/shareOptions.php?path=' . $path . '" method="post">'
        ?>
            <h3>Sharing Options:</h3>
            <br>
                <div>
                <label>User:</label>
                <input type="text" placeholder="Email" name="emailSharing">
                </div>
                <div style="text-align: center">
                <?php
                  echo '<input class="btn btn-primary" type="submit" name="share" value="Share To User"';
                ?>
                  </div>
                <hr>
        </form>
        <?php
        echo '<form action="includes/shareOptionsGroup.php?path=' . $path . '" method="post">'
        ?>
                <div>
                <label>Groups:</label>
                <select name="groupPermission">
                    <?php 
                        $query = "SELECT * FROM groups";
                        $select_user_query = mysqli_query($connection, $query);
                    
                        while ($row = mysqli_fetch_array($select_user_query)) {
                            echo '<option value="' . $row['group_Name'] . '">' . $row['group_Name'] . '</option>';
                        }
                    ?>
                </select>
                <div style="text-align: center">
                <?php
                  echo '<input class="btn btn-primary" type="submit" name="share" value="Share To Group"';
                ?>
                  </div>
        </form>
        <?php
        echo '<form action="includes/shareOptionsWorld.php?path=' . $path . '" method="post">'
        ?>
                <div>
                    <hr>
                <div>
                <label>World:</label>
                <select name="worldPermissions">
                    <?php
                    $queryUserMadeFile = "SELECT * FROM files WHERE userCreated = '{$userID}' AND filePath = '{$path}'";
                    $select_user_queryOther = mysqli_query($connection, $queryUserMadeFile);
                    $rowUserMadeFile = mysqli_fetch_array($select_user_queryOther);
                    $options = $rowUserMadeFile['worldPermission'];
                    ?>
                    <option value="T" <?php if($options=="T") echo 'selected="selected"' ?>>Yes</option>
                    <option value="F" <?php if($options=="F") echo 'selected="selected"' ?>>No</option>
                </select>
                <div style="text-align: center">
                <?php
                  echo '<input class="btn btn-primary" type="submit" name="share" value="Share"';
                ?>
                  </div>
                </div>
            </form>
            <?php
        echo '<form action="includes/shareOptions.php?path=' . $path . '" method="post">'
        ?>
                <hr>
                <div>
                <label>Create New Group:</label>
                <input type="text" placeholder="Group Name" name="groupName">
                </div>
                <div style="text-align: center">
                <?php
      			   echo '<input class="btn btn-primary" type="submit" name="createGroup" value="Create New Group"';
                ?>
                    </div>
        </form>
              <br>
                <hr>
                <br>
                <div style="text-align: center">
      			  <a href="index.php" class="btn btn-primary">Go back to your homepage</a>
              </div>
            </form>
		</div>
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

<?php include "includes/admin_footer.php" ?>