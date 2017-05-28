<?php
ini_set('display_errors',1);

      // Connect to MySQL
      include 'config.php';
      //include 'opendb.php';

$conn = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    //User ID is hardcoded for now to show functionality
    $userID = '1633040277499'
    $RecipeName = (isset($_POST['recipeTitle'])    ? $_POST['recipeTitle']   : '');
    $gfree = (isset($_POST['gfree'])    ? $_POST['gfree']   : '');
    $feeds = (isset($_POST['feeds'])    ? $_POST['feeds']   : '');
    $difficulty = (isset($_POST['difficulty'])    ? $_POST['difficulty']   : '');
    $directions = (isset($_POST['directions'])    ? $_POST['directions']   : '');

// Insert our data
$sql = "INSERT INTO recipes( userID,RecipeName,gfree,feeds,difficulty,directions)
  -- VALUES ($userID,$RecipeName,'$gfree','$feeds','$difficulty','$directions')";
  VALUES (
  '{$mysqli->real_escape_string(isset($_POST['userID'])    ? $_POST['userID']   : '')}' ,
  '{$mysqli->real_escape_string(isset($_POST['RecipeName'])    ? $_POST['RecipeName']   : '')}'	,
  '{$mysqli->real_escape_string(isset($_POST['gfree'])    ? $_POST['gfree']   : '')}' 	,
  '{$mysqli->real_escape_string(isset($_POST['feeds'])    ? $_POST['feeds']   : '')}'	,
  '{$mysqli->real_escape_string(isset($_POST['difficulty'])    ? $_POST['difficulty']   : '')}'	,
  '{$mysqli->real_escape_string(isset($_POST['directions'])    ? $_POST['directions']   : '')}'
  )";


$insert = $conn->query($sql);

// Print response from MySQL
if ( $insert === TRUE ) {
echo "Recipe Submission Success!";
} else {
echo "Error: ". $sql ."<br>" . $conn-error;
}


  ?>
