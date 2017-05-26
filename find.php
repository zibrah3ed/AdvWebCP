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

					<table style='width:95%'>
								<tr style="font-size: 1.25em; font-weight: bold;">
									<th>ID Number</th>
									<th>First Name</th> 
									<th>Last Name</th>
									<th>Email</th>
								</tr>
					<?php
					
					include 'config.php';
					include 'opendb.php';

					$fname = (isset($_POST['fname'])    ? $_POST['fname']   : '');
					$lname = (isset($_POST['lname'])    ? $_POST['lname']   : '');

					$sql= "SELECT id, fname, lname, email
					FROM mytable
					WHERE fname LIKE '$fname' AND lname LIKE '$lname' LIMIT 1";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result)) {
							
							echo "<td>" . $row["id"] . "</td>";
							echo "<td>" . $row["fname"] . "</td>";
							echo "<td>" . $row["lname"] . "</td>";
							echo "<td>" . $row["email"] . "</td>";
							
							/*
							echo "ID: " . $row["id"]. "<br><hr>";
					        echo "First Name: " . $row["fname"]. "<br>";
					        echo "Last Name: " . $row["lname"]. "<br><hr>";
							echo "Email: " . $row["email"] . "<br><hr>";
							*/
					    }
					} else {
					    echo "<td> No Contacts Matching Search Criteria</td>";
					}

					mysqli_close($conn);

					?>
					</table>
			</div>

	<div data-role="footer" data-theme="a">
	  <h4>Darice Corey-Gilbert &copy; 2016</h4>
	</div>
	</body>
</html>
