<?php 
  include 'views/header.view.php';
?>



<div class="profile-wrapper">
  <div class="left-col">
    <div class="img-container">
      <img src="./assets/profile-img.png" alt="Profile Pic">
    </div>
    <h2>Current Balance: <?php echo $_SESSION['userbalance']; ?></h2>
  </div>
  <div class="right-col">
    <h1 id="profile-name"><?php echo $_SESSION['userfirstname'] . ' ' . $_SESSION['userlastname']; ?>'s Profile</h1>
    <?php 
      if ($_SESSION['userbio'] === null) {
        echo '<button class="btn__add-bio">Add Bio</button>';
      }
      else {
        echo $_SESSION['userbio'];
      }
    ?>
  </div>
</div>


<?php 
  include 'views/footer.view.php';
?>