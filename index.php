<?php 
  include 'views/header.view.php';
?>
  
<h1>Pay-A-Pal</h1>

<?php 
  if (isset($_SESSION['userid'])) {
    echo 'Hello, ' . $_SESSION['userfirstname'] . '<br/>';
    echo 'This is a secret message only for you';
  }
?>

<?php 
  include 'views/footer.view.php';
?>