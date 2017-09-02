<html>
		<head>
<title>My Recipes</title>
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
		<div id="page" data-role="page" data-theme="a" data-add-back-btn="true">
	<div data-role="header" data-theme="a">
    <h1>
	     User Recipes
		</h1>
  </div>
  <div class="logo">
    	<center>
        <img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
      </center>
   </div>
				<div data-role="content" data-theme="a" >

          <div data-role="content" data-theme="a" style="max-width: 100%;">
              <ul data-role="listview" data-inset="true" data-theme="d">
                <?php
                // Create connection

                include 'config.php';
                include 'opendb.php';
								include 'defaultPageParts.php';
								$userID = 1;


                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                // User ID hardcoded atm, login page will need to be added

                $sql= "SELECT *
                        FROM recipes
                        WHERE users_userID = $userID
                        ";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<li><a href'#'>". "<h3>Recipe Name: " . $row["recipeName"]. "</h3>";
                        echo "<p>Recipe ID:" . $row["recipeID"]. "</p>";
                        echo "<p>Gluten Free :" . $row["gfree"] . "</p>";
                        echo "<p>Feeds :" . $row["feeds"]."</p>";
                        echo "<p>Difficulty :" . $row["difficulty"]."</p>";
                        echo "<p>Directions :" . $row["directions"]."</p>";
                        echo "</a><a href='#'></a></li>";
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);

                ?>
        </ul>
      </div>
				<?php createFooter(); ?>
  </div>
  </body>
</html>
