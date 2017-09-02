<?php
 ob_start();
 session_start();
 include 'config.php';
 include 'opendb.php';
 include 'defaultPageParts.php';
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($conn,"SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
?>
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
	     Recipe Search
		</h1>
  </div>
  <div class="logo">
    	<center>
        <img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
      </center>
   </div>
				<div data-role="content" data-theme="a" >

					<div data-role="fieldcontain" style="margin: 0 auto; max-width: 90%;">
						<form action="searchRecipes.php"
						 <label for="search" style="text-align:center;">Recipe Search:</label>
						 <input type="search" name="query" id="search" value="recipe name" />
					 </form>
							</div>

				<div data-role="content" data-theme="a" style="max-width: 100%;">
              <center>
								<ul data-role="listview" data-inset="true" data-theme="d">
                <?php
                // Create connection

                include 'config.php';
                include 'opendb.php';
								include 'defaultPageParts.php';

								$query = $_GET['query'];

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                // Check for input, string will be empty on first run(i.e. Navigations)

								if (strlen($query) > 0){
									$sql = "SELECT * from recipes where recipeName ='$query'";
								} else {
									$sql= "SELECT *
													FROM recipes LIMIT 5";
								}

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
									echo "<li>
									<h3>0 results</h3>
									<p>
									Try again.
									</p>
									</li>";
                }

                mysqli_close($conn);
                ?>
        </ul>
				</center>
      </div>
			<?php createFooter(); ?>
      </div>
  </body>
</html>
<?php ob_end_flush(); ?>
