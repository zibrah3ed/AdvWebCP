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
    		<h1>Ingredient List</h1>
  		</div>
  		<div class="logo">
    		<center>
        	<img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
      	</center>
   		</div>
			<div data-role="content" data-theme="d" style="max-width: 100%;">
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

								//Create Table Header
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
                        echo "<tr data-theme='c'>";
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
