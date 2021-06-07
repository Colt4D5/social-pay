<?php 
  include 'views/header.view.php';
?>
  
<h1>Log In Here</h1>

<form id="login-form" action="includes/login.inc.php" method="post">
  <input type="text" name="username" placeholder="Username or Email...">
  <input type="password" name="pwd" placeholder="Password...">
  <button type="submit" name="submit">Log In</button>
</form>


<?php 
  if (isset($_GET['error'])) {
    if ($_GET['error'] == 'emptyinput') {
      echo '<p class="error-msg">You must fill out all fields.</p>';
    }
    if ($_GET['error'] == 'incorrectcredentials') {
      echo '<p class="error-msg">Your login data does not match our records.</p>';
    }
  }
?>


<?php 
  include 'views/footer.view.php';
?>