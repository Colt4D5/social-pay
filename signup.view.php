<?php 
  include 'views/header.view.php';
?>
  
<h1>Sign Up Here</h1>

<form id="signup-form" action="includes/signup.inc.php" method="post">
  <input type="text" name="firstname" placeholder="First Name...">
  <input type="text" name="lastname" placeholder="Last Name...">
  <input type="text" name="email" placeholder="Email Address...">
  <input type="text" name="username" placeholder="Desired Username...">
  <input type="password" name="pwd" placeholder="Password...">
  <input type="password" name="pwdconfirm" placeholder="Confirm Password...">
  <button type="submit" name="submit">Sign Up</button>
</form>

<?php 
  if (isset($_GET['error'])) {
    if ($_GET['error'] == 'emptyinput') {
      echo '<p class="error-msg">You must fill out all fields.</p>';
    } 
    else if ($_GET['error'] == 'invalidusername') {
      echo '<p class="error-msg">That username is not valid.</p>';
    } 
    else if ($_GET['error'] == 'invalidemail') {
      echo '<p class="error-msg">That is not a valid email address.</p>';
    } 
    else if ($_GET['error'] == 'invalidemail') {
      echo '<p class="error-msg">That is not a valid email address.</p>';
    } 
    else if ($_GET['error'] == 'mismatchedpassword') {
      echo '<p class="error-msg">Your passwords do not match.</p>';
    }
    else if ($_GET['error'] == 'usernameunavailable') {
      echo '<p class="error-msg">Your username is not available.</p>';
    }
    else if ($_GET['error'] == 'none') {
      echo '<p class="error-msg">You have successfully signed up!</p>';
    }
  }
?>

<?php 
  include 'views/footer.view.php';
?>