<?php 
  include 'views/header.view.php';
  include 'includes/dbh.inc.php';
?>
  
<h1>Search Results</h1>

<?php 
  $query = $_GET['query'];

  $sql = 'SELECT * FROM users WHERE userFirstName = ? OR userLastName = ?;';

  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('location: ../index.php?error=searchfailed');
    exit();
  }
  
  mysqli_stmt_bind_param($stmt, 'ss', $query, $query);

  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    foreach ($resultData as $rowData) {
      echo '<pre>';
      print_r($rowData);
      echo '</pre>';
    }
  }
  else {
    echo 'Sorry, could not find ' . $query . '<br/>';
  }

  echo 'Query: ' . $query . '<br/>';

  mysqli_stmt_close($stmt);
?>

<?php 
  include 'views/footer.view.php';
?>