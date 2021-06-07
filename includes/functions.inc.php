<?php 

function emptyInputs($firstName, $lastName, $email, $username, $pwd, $pwdConfirm) {
  $result;
  if (empty($firstName) || empty($lastName) || empty($email) || empty($username) || empty($pwd) || empty($pwdConfirm)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function invalidUid($username) {
  $result;
  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $result = true;
  }
  else {
    $result = false;
  }
  echo $result;
  return $result;
}

function invalidEmail($email) {
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function mismatchedPassword($pwd, $pwdConfirm) {
  $result;
  if ($pwd !== $pwdConfirm) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function uidExists($conn, $email, $username) {
  $sql = "SELECT * FROM users WHERE userUid = ? or userEmail = ?;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('location: ../signup.view.php?error=stmtfailed');
    exit();
  }
  
  mysqli_stmt_bind_param($stmt, 'ss', $email, $username);

  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function createUser($conn, $firstName, $lastName, $email, $username, $pwd) {
  $startingBalance = 100;
  $sql = "INSERT INTO  users (userFirstName, userLastName, userEmail, userUid, userPwd, userBalance) VALUES (?, ?, ?, ?, ?, ?);";
  $stmt =mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('location: ../signup.view.php?error=stmtfailed');
    exit();
  }

  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  
  mysqli_stmt_bind_param($stmt, 'sssssd', $firstName, $lastName, $email, $username, $hashedPwd, $startingBalance);

  mysqli_stmt_execute($stmt);

  mysqli_stmt_close($stmt);

  header('location: ../signup.view.php?error=none');
}

function emptyInputsLogin($username, $pwd) {
  $result;
  if (empty($username) || empty($pwd)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function loginUser($conn, $username, $pwd) {
  $uidExists = uidExists($conn, $username, $username);

  
  if ($uidExists === false) {
    header('location: ../login.view.php?error=incorrectcredentials');
    exit();
  }
  
  $hashedPwd = $uidExists['userPwd'];
  
  $checkPwd = password_verify($pwd, $hashedPwd);
  
  if ($checkPwd === false) {
    header('location: ../login.view.php?error=incorrectcredentials');
    exit();
  }
  else if ($checkPwd === true) {
    session_start();
    $_SESSION['userid'] = $uidExists['userId'];
    $_SESSION['useruid'] = $uidExists['userUid'];
    $_SESSION['userfirstname'] = $uidExists['userFirstName'];
    $_SESSION['userlastname'] = $uidExists['userLastName'];
    $_SESSION['userbalance'] = $uidExists['userBalance'];
    $_SESSION['userbio'] = $uidExists['userBio'];

    header('location: ../');
    exit();
  }
}