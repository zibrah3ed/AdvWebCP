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
		<div id="page" data-role="page" data-theme="a" >
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

					</div>

				<div data-role="content" data-theme="a" style="max-width: 90%;">
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
      <!-- AddToAny BEGIN Code adapted from code provided by https://www.addtoany.com/buttons/for/website -->
                  <div class="a2a_kit a2a_kit_size_32 a2a_default_style text-center">
                  <!-- 	1. Required float and margin edits to render properly
                  		2. Privacy Badger blocked button rendering and had to be disabled.
                  -->
                  <p style="float:left; margin: 0em 1em 1em 1em;">Share Recipes: </p>
                  <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                  <a class="a2a_button_twitter"></a>
                  <a class="a2a_button_facebook"></a>
                  <a class="a2a_button_google_plus"></a>
                  <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true" ></div>
									<script async src="https://static.addtoany.com/menu/page.js"></script>
    						</div>
			<!-- AddToAny END -->

			<?php createFooter(); ?>
      </div>
  </body>
</html>
