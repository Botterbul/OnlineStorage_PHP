<?php ob_start(); ?>
<?php include "db.php"; ?>

<?php 
  createRows();

  function createRows() {

  if(isset($_POST['submit'])) {
  global $connection;
  
  $name = $_POST['namePerson'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if(!empty($name) && !empty($email) && !empty($password)) {

      $name = mysqli_real_escape_string($connection, $name);
      $email = mysqli_real_escape_string($connection, $email);   
      $password = mysqli_real_escape_string($connection, $password);
       
      $query = "SELECT randSalt FROM users";
      $select_randsalt_query = mysqli_query($connection, $query);
      $row = mysqli_fetch_array($select_randsalt_query);
      $salt = $row['randSalt'];

      $password = crypt($password, $salt);  
        
      $query = "INSERT INTO users(email,password,name) ";
      $query .= "VALUES ('$email','$password', '$name')";
        
      $result = mysqli_query($connection, $query);
      if(!$result) {
        header("Location: ../SignUpFailure.php");
      } else {
        header("Location: ../SignUpSuccess.php");
        mkdir("../admin/Uploads/" . $email,0777);
      }
  }
    
}
}

?>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>