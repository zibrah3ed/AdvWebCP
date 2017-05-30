<?php
  // Connection String working
  include 'config.php';
  $conn = new mysqli($dbhost, $dbuser, $dbpass);

  /* check connection */
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  } else {
    echo "<h1>Successful Recipe Addtion!</h1>";
  }
  
  // Use Hard coded values to check functionality
  $sql = "INSERT INTO recipes( userID,RecipeName,gfree,feeds,difficulty,directions)
   VALUES (1234567890,'Help',1,1,1,"hello world")";

  mysqli_close($conn);
?>
