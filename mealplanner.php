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

 $userID = $_SESSION['user'];
 $planDate = $_GET['date'];

 $bfastsql ="SELECT recipeName from mealplans
              INNER JOIN recipes
              ON recipes.recipeID = mealplans.planBreakfast
              WHERE mealplans.users_userID = '$userID' and mealplans.planDate = '$planDate'";
$bfast = mysqli_query($conn, $bfastsql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if ($row = mysqli_fetch_assoc($result)) {
      $bfastEcho = "<p>
      Recipe Name :".$row['recipeName']."
      </p>";
    }
} else {
    $bfastEcho = "Select a recipe.";
}

$lunchsql ="SELECT recipeName from mealplans
             INNER JOIN recipes
             ON recipes.recipeID = mealplans.planLunch
             WHERE mealplans.users_userID = '$userID' and mealplans.planDate = '$planDate'";

$lunch = mysqli_query($conn, $lunchsql);

if (mysqli_num_rows($result) > 0) {
   // output data of each row
   if ($row = mysqli_fetch_assoc($result)) {
     $lunchEcho = "<p>
     Recipe Name :".$row['recipeName']."
     </p>";
   }
} else {
   $lunchEcho = "Select a recipe.";
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
<!-- Jquery header data -->
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="https://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css" rel="stylesheet" type="text/css"/>
<link href="styles/custom.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js" type="text/javascript"></script>
<script src="javascript/storage.js"></script>

<!-- Google Login -->
<meta name="google-signin-client_id" content="581882503556-jbvkik4j01gng4cm05sgcabftpkaov2u.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="icon" href="images/favicon.png">

</head>
<body>
<div data-role="page" id="mealplanner" data-theme="a" data-add-back-btn="true">
  <div data-role="header" data-add-back-btn="true">
    <h1>Grocery Getter - Meal Planner</h1>
  </div>
  <div class="logo">
   	<center>
            	<img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
	</center>
  </div>
  <div data-role="content"></div>
  <div data-role="fieldcontain" style="width: 85%; margin: 0 auto;" data-theme="d">
    <label for="date">Date:</label>
    <input type="date" name="date" id="date" value="<?PHP date('Y-m-d')?>"  />
  </div>
  <ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
  <li class="ui-btn ui-li ui-corner-all" data-theme="d" style="width: 90%; margin: 0 auto; margin-top: 5px;">
      <div class="ui-btn-inner ui-li ui-corner-top">
          <div class="ui-btn-text">
            <h3 style="font-size:1.5em;" class="ui-li-heading"> Monday</h3>
            <p style="font-size:1em;" class="ui-li-desc">Breakfast : <a href="searchRecipes.php?breakfast" data-role="button" data-theme="d"><?php echo $bfastEcho;?></a></p>
            <p style="font-size:1em;" class="ui-li-desc">Lunch : <a href="searchRecipes.php?lunch" data-role="button" data-theme="d"><?php echo $lunchEcho;?></a></p>
            <p style="font-size:1em;" class="ui-li-desc">Dinner : <a href="searchRecipes.php?dinner" data-role="button" data-theme="d">Add Recipe</a></p>
            <p style="font-size:1em;" class="ui-li-desc">Snacks : <a href="searchRecipes.php?snack" data-role="button" data-theme="d">Add Recipe</a></p>
        </div>
       </div>
   </li>
  </ul>
<?php createFooter();


?>
</div>
</body>
</html>
<?php ob_end_flush();
mysqli_close($conn);?>
