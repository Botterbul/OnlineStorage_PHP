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
			<h3>Delete was unsuccessful! There was an error with the udeleting of the file, please try again and if problem persists, contact admin!</h3>
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