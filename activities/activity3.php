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
	     Team Members
		</h1>
  </div>
				<div data-role="content" data-theme="a" >

          <div data-role="content" data-theme="a" style="max-width: 100%;">


                <?php
                // Create connection

                include 'config.php';
                include 'opendb.php';


                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                // TEAM ID hardcoded atm,
                $sql= "SELECT act2table.fname, act2table.lname, act2table.phone, act2table.email, act3table.teamName,act3table.teamMotto
													FROM act3table
    									INNER JOIN act2table ON act3table.teamID = act2table.team_id
    											WHERE team_id = 55
                        ";
                $result = mysqli_query($conn, $sql);
								$result2 = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {

											echo "<div class='text-center'><h2>Team Name</h2>";
											echo "<H3>" . mysqli_fetch_assoc($result2)["teamName"] 	. "</H3>";
											echo "<p><i>" .	mysqli_fetch_assoc($result2)["teamMotto"] . "</i></p>";
											echo "</div>";
											echo "<h4>Team Members</h4>";
											echo "<ul data-role='listview' data-inset='true' data-theme='d'>";

                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        //echo "<li><a href'#'>"	. "<h3>Team Name --  "	. $row["teamName"]. "</h3>";
												//echo "<p>Team Motto: "	. 												$row["teamMotto"]."</p>";
												echo "<li><a href'#'>";
												echo "<p>First Name : "	. 												$row["fname"]. "</p>";
                        echo "<p>Last Name : "		. 												$row["lname"]."</p>";
												echo "<p>Phone : "		. 												$row["phone"]."</p>";
												echo "<p>Email : "		. 												$row["email"]."</p>";
                        echo "</a><a href='#'></a></li>";
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);

                ?>
        </ul>
      </div>
      <!-- AddToAny BEGIN Code adapted from code provided by https://www.addtoany.com/buttons/for/website -->
                  <div class="a2a_kit a2a_kit_size_32 a2a_default_style text-center">
                  <!-- 	1. Required float and margin edits to render properly
                  		2. Privacy Badger blocked button rendering and had to be disabled.
                  -->
                  <p style="float:left; margin: 0em 1em 1em 1em;">Share Team Info: </p>
                  <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                  <a class="a2a_button_twitter"></a>
                  <a class="a2a_button_facebook"></a>
                  <a class="a2a_button_google_plus"></a>
                  <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true" ></div>

    </div>
                  </div>
                  <script async src="https://static.addtoany.com/menu/page.js"></script>
  			<!-- AddToAny END -->


    <div data-role="footer">
      <h4>Tyson Funk&copy; 2016</h4>
    </div>
  </div>
    </div>
  </div>
  </body>
</html>
