<html>
		<head>
<title>Recipe Add</title>
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
	     		Recipe Add
				</h1>
  		</div>
  	<div class="logo">
    	<center>
        <img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
      </center>
   	</div>
		<div data-role="content" data-theme="a" >
				<?php
				// Create connection
				$dbhost = 'us-cdbr-azure-southcentral-f.cloudapp.net';
        $dbuser = 'b618b9921664aa';
        $dbpass = 'd847c445';
        $dbname = 'grocerydb';

				$conn = new mysqli( $dbhost, $dbuser, $dbpass, $dbname );
				//include 'opendb.php';

				// Check connection
				if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
				}
				// User ID hardcoded atm, login page will need to be added

				    //User ID is hardcoded for now to show functionality
				    $userID = '1633040277499';
				    $RecipeName = (isset($_POST['recipeTitle'])    ? $_POST['recipeTitle']   : '');
				    $gfree = (isset($_POST['gfree'])    ? $_POST['gfree']   : '');
				    $feeds = (isset($_POST['feeds'])    ? $_POST['feeds']   : '');
				    $difficulty = (isset($_POST['difficulty'])    ? $_POST['difficulty']   : '');
				    $directions = (isset($_POST['directions'])    ? $_POST['directions']   : '');

				// Insert our data
				$sql = "INSERT INTO recipes( userID,RecipeName,gfree,feeds,difficulty,directions)
				  VALUES (mysqli->real_escape_string($userID),
									mysqli->real_escape_string($RecipeName),
									mysqli->real_escape_string($gfree),
									mysqli->real_escape_string($feeds),
									mysqli->real_escape_string($difficulty),
									mysqli->real_escape_string($directions)
								)";
				  //VALUES (
				  //'{$mysqli->real_escape_string(isset($_POST['userID'])    ? $_POST['userID']   : '')}' ,
				  //'{$mysqli->real_escape_string(isset($_POST['RecipeName'])    ? $_POST['RecipeName']   : '')}'	,
				  //'{$mysqli->real_escape_string(isset($_POST['gfree'])    ? $_POST['gfree']   : '')}' 	,
				  //'{$mysqli->real_escape_string(isset($_POST['feeds'])    ? $_POST['feeds']   : '')}'	,
				  //'{$mysqli->real_escape_string(isset($_POST['difficulty'])    ? $_POST['difficulty']   : '')}'	,
				  //'{$mysqli->real_escape_string(isset($_POST['directions'])    ? $_POST['directions']   : '')}'
				  //)";


				$insert = $conn->query($sql);

				// Print response from MySQL
				if ( mysqli_query($conn,$sql) ) {
					echo "<h2>Recipe Submission Success!</h2>";
				} else {
					echo "Error: ". $sql ."<br>" . $conn-error;
				}

				//mysqli_close($conn);
				  ?>
				<div data-role="footer">
					<h4>Tyson Funk&copy; 2016</h4>
				</div>
			</div>
		</div>
	</body>
	</html>
