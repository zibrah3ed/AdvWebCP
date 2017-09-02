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
		<div class="logo">
	   		<center>
	            	<img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
			</center>
	  	</div>

    <h2 class="text-center">
	     Gluten Free Recipes
		</h2>
  </div>
				<div data-role="content" data-theme="a" >

          <div data-role="content" data-theme="a" style="max-width: 100%;">

						<ul data-role='listview' data-inset='true' data-theme='d'>

                <?php
                // Create connection

                include 'config.php';
                include 'opendb.php';


                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                // Select u
                $sql= "SELECT users.fname,users.lname, users.username, recipes.recipeName, recipes.gfree, recipes.difficulty
													FROM recipes INNER JOIN users
													ON recipes.users_userID = users.userID WHERE gfree = 1
                        ";
                $result = mysqli_query($conn, $sql);
								$result2 = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        //echo "<li><a href'#'>"	. "<h3>Team Name --  "	. $row["teamName"]. "</h3>";
												//echo "<p>Team Motto: "	. 												$row["teamMotto"]."</p>";
												echo "<li><a href'#'>";
												echo "<H3>Recipe Name: "	. 				 								$row["recipeName"]. "</h3>";
												echo "<p>Difficulty : "		. 												$row["difficulty"]."</p>";
												echo "<p>First Name : "		. 												$row["fname"]."</p>";
												echo "<p>Last Name : "		. 												$row["lname"]."</p>";
												echo "<p>Username : "		. 												$row["username"]."</p>";
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
    </div>
  <?PHP createFooter(); ?>
  </body>
</html>
<?php ob_end_flush(); ?>
