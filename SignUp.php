<?php include "includes/header.php"; ?>

  <?php  include "includes/navigationBar.php"; ?>

<br>
<br>
  <div class="container">
    <div class="row">
      <div class="col-sm">
      </div>
      <div class="col-sm">
        <h1 style="text-align: center;">Sign Up</h1>
        <br>
        <form action="includes/SignUp.php" method="post" onsubmit="return Validate()" name="vform">
          <div class="form-group">
            <label>Enter your name:</label>
            <input type="text" style="width:100%;" class="form-control" placeholder="Name" name="namePerson">
            <div id="namePerson_error" class="val_error"></div>
          </div>
          <div class="form-group">
            <label>Enter your Email address:</label>
            <input type="text" style="width:100%;" class="form-control" placeholder="E-mail" name="email">
          </div>
          <div class="form-group">
            <label>Re-enter Email address:</label>
            <input type="text" style="width:100%;" class="form-control" placeholder="E-mail Confirmation" name="email_confirmation">
            <div id="email_error" class="val_error"></div>
          </div>
          <div class="form-group">
            <label>Enter your Password:</label>
            <input type="password" style="width:100%;" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>
          <div class="form-group">
            <label>Re-enter your Password:</label>
            <input type="password" style="width:100%;" class="form-control" id="exampleInputPassword1" placeholder="Password Confirmation" name="password_confirmation">
            <div id="password_error" class="val_error"></div>
          </div>
          <div>
            <input class="btn btn-primary" type="submit" name="submit" value="CREATE" style="margin-left: 38%;">
          </div>
        </form>
      </div>
      <div class="col-sm">
      </div> 
    </div>
  </div>

  <br>
  <br>
<?php include "includes/footer.php"; ?>

<script type="text/javascript">
  var namePerson = document.forms["vform"]["namePerson"];
  var email = document.forms["vform"]["email"];
  var email_confirmation = document.forms["vform"]["email_confirmation"];
  var password = document.forms["vform"]["password"];
  var password_confirmation = document.forms["vform"]["password_confirmation"];

  var namePerson_error = document.getElementById("namePerson_error");
  var email_error = document.getElementById("email_error");
  var password_error = document.getElementById("password_error");

  namePerson.addEventListener("blur", namePersonVerify, true);
  email_confirmation.addEventListener("blur", emailVerify, true);
  password_confirmation.addEventListener("blur", passwordVerify, true);

  function Validate(){
    if (namePerson.value == "") {
      namePerson.style.border = "1px solid red";
      namePerson_error.textContent = "A name is required";
      namePerson.focus();
      return false;
    }
    if (email.value == "" || email_confirmation.value == "") {
      email.style.border = "1px solid red";
      email_confirmation.style.border = "1px solid red";
      email_error.textContent = "E-mail is required";
      email.focus();
      return false;
    }
    if (email.value != email_confirmation.value) {
      email.style.border = "1px solid red";
      email_confirmation.style.border = "1px solid red";
      email_error.innerHTML = "The two e-mails do not match";
      return false;
    }
    if (password.value == "" || password_confirmation.value == "") {
      password.style.border = "1px solid red";
      password_confirmation.style.border = "1px solid red";
      password_error.textContent = "Password is required";
      password.focus();
      return false;
    }
    if (password.value != password_confirmation.value) {
      password.style.border = "1px solid red";
      password_confirmation.style.border = "1px solid red";
      password_error.innerHTML = "The two passwords do not match";
      return false;
    }
  }

  function namePersonVerify() {
    if (namePerson.value != "") {
      namePerson.style.border = "1px solid #00ff08";
      namePerson_error.innerHTML = "";
      return true;
    }
  }
  function emailVerify() {
    if (email.value != "" || email_confirmation.value != "") {
      email.style.border = "1px solid #00ff08";
      email_confirmation.style.border = "1px solid #00ff08";
      email_error.innerHTML = "";
      return true;
    }
  }
  function passwordVerify() {
    if (password.value != "" || password_confirmation.value != "") {
      password.style.border = "1px solid #00ff08";
      password_confirmation.style.border = "1px solid #00ff08";
      password_error.innerHTML = "";
      return true;
    }
  }

</script>