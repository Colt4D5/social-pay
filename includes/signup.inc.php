<?php 

if (isset($_POST['submit'])) {
  $firstName = $_POST['firstname'];
  $lastName = $_POST['lastname'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];
  $pwdConfirm= $_POST['pwdconfirm'];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputs($firstName, $lastName, $email, $username, $pwd, $pwdConfirm) !== false) {
    header('Location: ../signup.view.php?error=emptyinput');
    exit();
  }

  if (invalidUid($username) !== false) {
    header('Location: ../signup.view.php?error=invalidusername');
    exit();
  }

  if (invalidEmail($email) !== false) {
    header('Location: ../signup.view.php?error=invalidemail');
    exit();
  }

  if (mismatchedPassword($pwd, $pwdConfirm) !== false) {
    header('Location: ../signup.view.php?error=mismatchedpassword');
    exit();
  }

  if (uidExists($conn, $email, $username) !== false) {
    header('Location: ../signup.view.php?error=usernameunavailable');
    exit();
  }

  createUser($conn, $firstName, $lastName, $email, $username, $pwd);

}
else {
  header('Location: ../signup.view.php');
  exit();
}