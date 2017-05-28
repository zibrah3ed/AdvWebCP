<html>
		<head>
<title>Find a Contact</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/custom.css" />
<link rel="stylesheet" href="themes/rasmussenthemeroller.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="javascript/storage.js"></script>
<style>
	table, th, td {
		border: 1px solid white;
		border-collapse: collapse;
		padding: 5px;

	}
</style>
</head>
	<body>
		<div id="page" data-role="page" data-theme="a" >
	<div data-role="header" data-theme="a">
<h1>
	Find your contact
		</h1>	</div>
				<div data-role="content" >
<?php
/*
$servername = 'us-cdbr-azure-southcentral-f.cloudapp.net';
$username = 'b618b9921664aa';
$password = 'd847c445';
$dbname = 'grocerydb';
*/
// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
include 'config.php';
include 'opendb.php';


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql= "SELECT recipeid,userID,RecipeName,gfree,feeds,difficulty,directions
        FROM recipes
        ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Recipe ID: " . $row["recipeid"]. "<br>";
        echo "User ID: " . $row["userID"]. " " . $row["lname"]. "<br>";
        echo "Recipe Name :" . $row["RecipeName"]. "<br>";
        echo "Gluten Free? :" . $row["gfree"]."<br><hr>";
        echo "Feeds? :" . $row["feeds"]."<br><hr>";
        echo "Difficulty :" . $row["difficulty"]."<br><hr>";
        echo "Directions :" . $row["directions"]."<br><hr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
</div>
</body>
</html>
