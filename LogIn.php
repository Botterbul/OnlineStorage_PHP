<?php include "includes/header.php"; ?>

  <?php  include "includes/navigationBar.php"; ?>

<br>
<br>
  <div class="container">
    <div class="row">
      <div class="col-sm">
      </div>
      <div class="col-sm">
        <h1 style="text-align: center">Login</h1>
        <form action="includes/login.php" method="post">
          <div class="form-group">
            <label>Email address</label>
            <input type="text" style="width:100%;"  class="form-control" placeholder="E-Mail address" name="email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword">Password</label>
            <input type="password" style="width:100%;"  class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>
          <div>
            <input class="btn btn-primary" type="submit" name="login" value="Log In" style="margin-left: 38%;">
          </div>
        </form>
      </div> 
      <div class="col-sm">
      </div>
    </div>
  </div>


<?php include "includes/footer.php"; ?>