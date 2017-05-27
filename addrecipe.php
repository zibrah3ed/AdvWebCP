<?php

      // Connect to MySQL
      include 'config.php';
      include 'opendb.php';

$mysqli = mysqli_connect( dbhost, dbuser,dbpass, dbname );


    //User ID is hardcoded for now to show functionality
    $userID = '1633040277499'
    $RecipeName = (isset($_POST['recipeTitle'])    ? $_POST['recipeTitle']   : '');
    $gfree = (isset($_POST['gfree'])    ? $_POST['gfree']   : '');
    $feeds = (isset($_POST['feeds'])    ? $_POST['feeds']   : '');
    $difficulty = (isset($_POST['difficulty'])    ? $_POST['difficulty']   : '');
    $directions = (isset($_POST['directions'])    ? $_POST['directions']   : '');

// Insert our data
$sql = "INSERT INTO [recipes] ( userID,RecipeName,gfree,feeds,difficulty,directions)
  VALUES (
  '{$mysqli->real_escape_string(isset($_POST['userID'])    ? $_POST['userID']   : '')}' ,
  '{$mysqli->real_escape_string(isset($_POST['RecipeName'])    ? $_POST['RecipeName']   : '')}'	,
  '{$mysqli->real_escape_string(isset($_POST['gfree'])    ? $_POST['gfree']   : '')}' 	,
  '{$mysqli->real_escape_string(isset($_POST['feeds'])    ? $_POST['feeds']   : '')}'	,
  '{$mysqli->real_escape_string(isset($_POST['difficulty'])    ? $_POST['difficulty']   : '')}'	,
  '{$mysqli->real_escape_string(isset($_POST['directions'])    ? $_POST['directions']   : '')}'
  )";


$insert = $mysqli->query($sql);

// Print response from MySQL
if ( $insert ) {
echo "Success! Row ID: {$mysqli->insert_id}";
} else {
die("Error: {$mysqli->errno} : {$mysqli->error}");
}


  ?>
