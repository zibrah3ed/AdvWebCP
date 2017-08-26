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
		<div class="logo">
	   		<center>
	            	<img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
			</center>
	  	</div>

    <h2 class="text-center">
	     Ingredient List
		</h2>
  </div>
				<div data-role="content" data-theme="a" >

          <div data-role="content" data-theme="a" style="max-width: 100%;">

						<ul data-role='listview' data-inset='true' data-theme='d'>
						<li>

                <?php
                // Create connection

                include 'config.php';
                include 'opendb.php';
								include 'defaultPageParts.php';

								$query = 2; // Recipe ID

								$sql = "SELECT ing_name, quantity, uom, recipes.recipeName
												FROM `ingredients`
												INNER JOIN recipes ON recipes_recipeID = recipes.recipeID
												WHERE recipes_recipeID = 2";

                $result = mysqli_query($conn, $sql);

                echo "<center><table data-role='table' class='ui-responsive ui-shadow' data-theme='d'>";
								echo "<thead>";
								echo "<tr><th colspan='3'>Recipe Name ".$row["recipename"]."</th></tr>";
								echo "<tr>
												<th>Ingredient</th>
												<th>Qty.</th>
												<th>UoM</th>
											</tr></thead><tbody>";

                if (mysqli_num_rows($result) > 0) {
									//	Fill table with every row retruned by query
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
												echo "<td>".$row["ing_name"]."</td>";
												echo "<td>".$row["quantity"]."</td>";
												echo "<td>".$row["uom"]."</td>";
												echo "</tr>";
                    }
                } else {
										// Insert error message when a null result is return from the query
                    echo "<tr>
										<td colspan='3'>
										Error
										</td>
										</tr>";
                }

								// Close Connection
                mysqli_close($conn);
                ?>
								</tbody>
							</table>
						</center>
						<li>
        </ul>
      </div>
    <?php
    	include 'defaultPageParts.php';
    	createFooter();
    ?>
  </div>
    </div>
  </div>
  </body>
</html>
