<?php include "includes/admin_header.php" ?>

<?php include "includes/navigationBar.php"; ?>
<br>
<?php 
	$university = '';
 ?> 

<br>
<br>

<div class="container">
		<div class="jumbotron text-center">
			<h3>Upload was unsuccessful! Your drive is too full, please delete some files to free enough space for this file.</h3>
      		<br>
      		<div style="text-align: center">
      			<a href="index.php" class="btn btn-primary">Go back to your homepage</a>
      		</div>
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