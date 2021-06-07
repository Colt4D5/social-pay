<?php if (!isset($_SESSION)) { session_start(); } ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">

  <!-- FONT -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">

  <title>Pay-A-Pal</title>
</head>
<body>

  <header>
    <nav>
      <h2 class="logo">Pay-A-Pal</h2>
      <div class="search-wrapper">
        <form action="searchResults.view.php" method="get">
          <input type="search" name="query" id="search">
          <button type="submit">Search</button>
        </form>
      </div>
      <div class="nav-link-wrapper">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.view.php">About</a></li>
          <li><a href="blog.view.php">Blog</a></li>
          <?php 
            if (isset($_SESSION['userid'])) {
              echo '<li><a class="btn__profile-name" href="profile.view.php">' . $_SESSION['userfirstname'] . '</a></li>';
              echo '<li><a class="btn__login" href="includes/logout.inc.php">Log Out</a></li>';
            } else {
              echo '<li><a href="signup.view.php">Sign Up</a></li>';
              echo '<li><a class="btn__login" href="login.view.php">Log In</a></li>';
            }
          ?>
          
        </ul>
      </div>
    </nav>
  </header>

  <main>