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

          <div data-role="content" data-theme="a" style="max-width: 100%;">
              <ul data-role="listview" data-inset="true" data-theme="d">
                <?php
                // Create connection

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

                <li><a href="#">
                  <h3>Goat Cheese Pancakes</h3>
                  <p>Added : 10/23/15</p>
                </a><a href="#">Default</a></li>

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<li><a href'#'>". "<h3>Recipe Name: " . $row["RecipeName"]. "</h3><br>";
                        echo "<p>User ID: " . $row["userID"]. " " . $row["lname"]. "</p><br>";
                        echo "<p>Recipe ID:" . $row["recipeid"]. "</p><br>";
                        echo "<p>Gluten Free? :" . $row["gfree"]."</p><br>";
                        echo "<p>Feeds? :" . $row["feeds"]."</p><br>";
                        echo "<p>Difficulty :" . $row["difficulty"]."</p><br>";
                        echo "<p>Directions :" . $row["directions"]."</p><br>";
                        echo "</a><a href='#'></a></li>";
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);

                ?>
        </ul>
      </div>
    </div>
  </body>
</html>
