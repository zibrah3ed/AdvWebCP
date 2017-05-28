<?php
$servername = 'us-cdbr-azure-southcentral-f.cloudapp.net';
$username = 'b618b9921664aa';
$password = 'd847c445';
$dbname = 'grocerydb';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql= "SELECT recipeid,userID,RecipeName,gfree,feeds,difficulty,directions FROM recipes";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Recipe ID: " . $row["recipeid"]. "<br>";
        echo "User ID: " . $row["userID"]. " " . $row["lname"]. "<br>";
        echo "Recipe Name :" . $row["RecipeName"]. "<br>";
        echo "Gluten Free? :" . $row["gfree"]."<br><hr>";
        echo "Feeds? :" . $row["feeds"]."<br><hr>";
        echo "Difficulty :" . $row["difficulty"]."<br><hr>";\
        echo "Directions :" . $row["directions"]."<br><hr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
