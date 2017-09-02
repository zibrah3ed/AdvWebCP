<?php
 ob_start();
 session_start();
 include 'config.php';
 include 'opendb.php';
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($conn,"SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
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
<body>
<!-- Scripts -->

<!-- Notification Script -->
<script>
		// Set Welcome notifcation on page load

		window.onload = show();

		var profile = "";

		var signedInUser = function onSignIn(googleUser) {
			// Useful data for your client-side scripts:
			profile = googleUser.getBasicProfile();
			//console.log("ID: " + profile.getId()); // Don't send this directly to your server!
			//console.log('Full Name: ' + profile.getName());
			//console.log('Given Name: ' + profile.getGivenName());
			//console.log('Family Name: ' + profile.getFamilyName());
			//console.log("Image URL: " + profile.getImageUrl());
			//console.log("Email: " + profile.getEmail());

			// The ID token you need to pass to your backend:
			var id_token = googleUser.getAuthResponse().id_token;
			//console.log("ID Token: " + id_token);
		};

		var Notification = window.Notification || window.mozNotification || window.webkitNotification;

		Notification.requestPermission(function (permission) {
			// console.log(permission);
		});

		function show() {
			window.setTimeout(function () {

				var instance = new Notification(
					"Welcome Message", {
						icon: profile.getImageUrl(),
						body: "Hello " + profile.getGivenName() + " " + profile.getFamilyName() +"! Your friends have added 5 new recipes."
					}
				);

				instance.onclick = function () {
					// Woo
				};
				instance.onerror = function () {
					// Something to do
				};
				instance.onshow = function () {
					// Something to do
				};
				instance.onclose = function () {
					// Something to do
				};
			}, 3000);
		}
</script>
<script>
function signOut() {
	var auth2 = gapi.auth2.getAuthInstance();

	auth2.signOut().then(function () {
		console.log('User signed out.');
	});
};
</script>
<!-- phonegap script -->
<script type="text/javascript" src="cordova.js"></script>

<!-- Facebook Like button Script -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div id="main_page" data-role="page" data-theme="a">
      <div data-role="header">
        <h1>Grocery Getter</h1>
        </div>
  <div class="logo">
        	<center>
            	<img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
    		</center>
      	</div>
	<div data-role="content">
    <div class="container" style="myButton">
  		<div data-role="controlgroup">
					<center>
							<li><a href="searchRecipes.php" class="mainButton" data-inline="true" data-role="button" data-transition="flip">Search Recipes</a></li>
            	<li><a href="displayRecipes.php" class="mainButton" data-inline="true" data-role="button" data-transition="flip">My Recipes</a></li>
   	  	  		<li><a href="#mealplanner" data-role="button" data-inline="true" class="mainButton" data-transition="flip">Meal Planner</a></li>
       	  		<li><a href="groceryList.php" data-role="button" data-inline="true" class="mainButton">List Generator</a></li>
            	<li><a href="#addrecipe2" data-role="button" data-inline="true" class="mainButton" data-transition="pop">Add Recipe</a></li>
              <li><a href="allgfree.php" data-role="button" data-inline="true" class="mainButton" data-transition="pop">Gluten Free List</a></li>
              <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
					</center>
  		</div>
      <center>
        <!-- Google signin button, redundant but part of assignment -->
        <div class="g-signin2" data-onsuccess="signedInUser"></div>
				</div>
      </center>
	</div>
	<div data-role="footer" data-position="fixed" data-fullscreen="true" class="footer">
	    <p>Tyson Funk&copy; 2017</p><button onclick='signOut()' type="button" class="btn">Sign Out</button>
	</div>
</div>

<!--Start Recipes Page -->
<div data-role="page" id="recipes" data-theme="a" data-add-back-btn="true">
  <div data-role="header" data-add-back-btn="true">
    <h1>Grocery Getter - Recipes</h1>
  </div>
  <div class="logo">
    <center>
			<img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
		</center>
  </div>

 <div data-role="content">
   <div data-role="fieldcontain" style="margin: 0 auto; max-width: 90%;">
     	<label for="search" style="text-align:center;">Recipe Search:</label>
     	<input type="search" name="search" id="search" value=""  />
   </div>

  <ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow" style="margin: 0 auto;width:97%;margin-top: 10px;margin-bottom: 10px;">
      <li class="ui-btn ui-li ui-corner-all" data-theme="d">
          <div class="ui-btn-inner ui-li ui-corner-top">
              <div class="ui-btn-text" style="text-align: center">
                <h3 style="font-size:1.25em;" class="ui-li-heading">Recent Recipes</h3>
              </div>
           </div>
       </li>
        <li class="ui-btn ui-li ui-corner-all" data-theme="d" style="margin-top:5px;">
          <div class="ui-btn-inner ui-li ui-corner-top">
              <div class="ui-btn-text" style="text-align:center">
                <p style="font-size:1em;" class="ui-li-desc">Gluten Free Tacos <a href="#mealplanner" data-role="button" data-theme="d">Add to Meal Plan</a>
                </p>
              </div>
           </div>
       </li>
       <li class="ui-btn ui-li ui-corner-all" data-theme="d" style="margin-top:5px;">
          <div class="ui-btn-inner ui-li ui-corner-top">
              <div class="ui-btn-text" style="text-align:center">
                <p style="font-size:1em;" class="ui-li-desc">Gluten Free Tortillas <a href="#mealplanner" data-role="button" data-theme="d">Add to Meal Plan</a></p>
              </div>
           </div>
       </li>
       <li class="ui-btn ui-li ui-corner-all" data-theme="d" style="margin-top:5px;">
          <div class="ui-btn-inner ui-li ui-corner-top">
              <div class="ui-btn-text" style="text-align:center">
                <p style="font-size:1em;" class="ui-li-desc">Gluten Free Baking Mix<a href="#mealplanner" data-role="button" data-theme="d">Add to Meal Plan</a></p>
              </div>
           </div>
       </li>
   </ul>
<a href="#addrecipe" data-role="button" data-theme="d" class="themeButton">Add Recipe</a>

 </div>
	<div data-role="footer" data-position="fixed" data-fullscreen="true">
   	  <h4>Tyson Funk&copy; 2017</h4>
</div>
</div>
<!-- End Recipes page -->

<!-- Pantry Page -->
<div data-role="page" id="pantry" data-theme="a" data-add-back-btn="true">
  <div data-role="header" data-add-back-btn="true">
    <h1>Grocery Getter - Pantry Items</h1>
  </div>
  <div class="logo">
   	<center>
            	<img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
	</center>
  </div>
  <div data-role="content"></div>
  <ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
  <li class="ui-btn ui-li ui-corner-all" data-theme="d" style="width: 95%; margin: 0 auto; margin-top: 5px;">
      <div class="ui-btn-inner ui-li ui-corner-top">
          <div class="ui-btn-text">
            <h3 style="font-size:1.25em;" class="ui-li-heading"> Taco Shells</h3>
            <p style="font-size:1em;" class="ui-li-desc">Current Quantity : 2 boxes</p>
            <p style="font-size:1em;" class="ui-li-desc">Needed for weekly meal plan : 2 boxes</p>
          </div>
       </div>
   </li>
   <li class="ui-btn ui-li ui-corner-all" data-theme="d" style="width: 95%; margin: 0 auto; margin-top: 2px;">
      <div class="ui-btn-inner ui-li ui-corner-top">
          <div class="ui-btn-text">
            <h3 style="font-size:1.25em;" class="ui-li-heading"> Tortillas</h3>
            <p style="font-size:1em;" class="ui-li-desc">Current Quantity : 12 pieces</p>
            <p style="font-size:1em;" class="ui-li-desc">Needed for weekly meal plan : 12 pieces</p>
          </div>
       </div>
   </li>
   <li class="ui-btn ui-li ui-corner-all" data-theme="d" style="width: 95%; margin: 0 auto; margin-top: 2px;">
      <div class="ui-btn-inner ui-li ui-corner-top">
          <div class="ui-btn-text">
            <h3 style="font-size:1.25em;" class="ui-li-heading"> Red Chiles </h3>
            <p style="font-size:1em;" class="ui-li-desc">Current Quantity : 5 peppers</p>
            <p style="font-size:1em;" class="ui-li-desc">Needed for weekly meal plan : 12 peppers</p>
          </div>
       </div>
   </li>
   <li class="ui-btn ui-li ui-corner-all" data-theme="d" style="width: 95%; margin: 0 auto; margin-top: 2px;">
      <div class="ui-btn-inner ui-li ui-corner-top">
          <div class="ui-btn-text">
            <h3 style="font-size:1.25em;" class="ui-li-heading">Chicken</h3>
            <p style="font-size:1em;" class="ui-li-desc">Current Quantity : 0 chickens</p>
            <p style="font-size:1em;" class="ui-li-desc">Needed for weekly meal plan : 2 chickens</p>
          </div>
       </div>
   </li>
   </ul>

  <div data-role="content"></div>
  <div data-role="footer" data-position="fixed" data-fullscreen="true">
   	  <h4>Tyson Funk&copy; 2017</h4>
</div>
</div>
<!-- End Pantry-->

<!-- Meal Planner Page -->
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
    <input type="date" name="date" id="date" value=""  />
  </div>
  <ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
  <li class="ui-btn ui-li ui-corner-all" data-theme="d" style="width: 90%; margin: 0 auto; margin-top: 5px;">
      <div class="ui-btn-inner ui-li ui-corner-top">
          <div class="ui-btn-text">
            <h3 style="font-size:1.5em;" class="ui-li-heading"> Monday</h3>
            <p style="font-size:1em;" class="ui-li-desc">Breakfast : <a href="#recipes" data-role="button" data-theme="d">Add Recipe</a></p>
            <p style="font-size:1em;" class="ui-li-desc">Lunch : <a href="#recipes" data-role="button" data-theme="d">Add Recipe</a></p>
            <p style="font-size:1em;" class="ui-li-desc">Dinner : <a href="#recipes" data-role="button" data-theme="d">Add Recipe</a></p>
            <p style="font-size:1em;" class="ui-li-desc">Snacks : <a href="#recipes" data-role="button" data-theme="d">Add Recipe</a></p>
            <!-- AddToAny BEGIN Code adapted from code provided by https://www.addtoany.com/buttons/for/website -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style text-center">
                <!-- 	1. Required float and margin edits to render properly
                		2. Privacy Badger blocked button rendering and had to be disabled.
                -->
                <p style="float:left; margin: 0em 1em 1em 1em;">Share Recipes: </p>
                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_google_plus"></a>
                <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true" ></div>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
			<!-- AddToAny END -->
        </div>
       </div>
   </li>
  </ul>

  <div data-role="footer" data-position="fixed" data-fullscreen="true">
   	  <h4>Tyson Funk&copy; 2017</h4>
</div>
</div>
<!--End Meal Planner -->

<!-- My Recipes Page Start -->
<div data-role="page" id="myrecipes" data-add-back-btn="true" data-theme="a">
<div data-role="header">
    <h1>GG - My Recipes</h1>
  </div>

 <div class="logo">
   	<center>
            	<img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
	</center>
  </div>

<div data-role="content" data-theme="a" style="max-width: 100%;">
    <ul data-role="listview" data-inset="true" data-theme="d">
      <li><a href="#">
        <h3>Goat Cheese Pancakes</h3>
        <p>Added : 10/23/15</p>
      </a><a href="#">Default</a></li>
      <li><a href="displayRecipes.php">
        <h3>Falafel Hamburgers</h3>
        <p>Added : 11/01/16</p>
      </a><a href="#"></a></li>
      <li><a href="#">
        <h3>Double Chocolate Brownies</h3>
        <p>Added : 11/02/16</p>
      </a><a href="#">Default</a></li>
    </ul>

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

  </div>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
			<!-- AddToAny END -->


  <div data-role="footer" data-position="fixed" data-fullscreen="true">
    <h4>Tyson Funk&copy; 2017</h4>
  </div>
</div>
<!-- My Recipes Page END -->

<!-- Add recipe 2-->
<div data-role="page" id="addrecipe2" data-add-back-btn="true" data-theme="a">
	<div data-role="header">
    <h1>GG - Add Recipe</h1>
  	</div>

 	<div class="logo">
   		<center>
            	<img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
		</center>
  	</div>

	<div data-role="content" data-theme="a" style="max-width: 100%;">
   	<div class="ui-body-d ui-body img-rounded" data-theme="d" >
    	<form method="post" action="addrecipe.php" class="formArea" style="width: 90%; margin: 0 auto; margin-top: 1em;" data-theme="a">

                  <table width="400" border="0" cellspacing="1" cellpadding="2" align="center">
                     <tr>
                        <td width="100">Recipe Title</td>
                        <td><input name="recipeTitle" type="text" id="recipeTitle"></td>
                     </tr>
                     <tr>
                        <td width="100">Gluten Free</td>
                        <td><input name="gfree" type="text" id="gfree"></td>
                     </tr>
                     <tr>
                        <td width="100">Feeds</td>
                        <td><input name="feeds" type="number" id="feeds"></td>
                     </tr>
                     <tr>
                        <td width="100">Difficulty</td>
                        <td><input name="difficulty" type="text" id="difficulty"></td>
                     </tr>
                     <tr>
                        <td width="100">Directions</td>
                        <td><input name="directions" type="text" id="directions"></td>
                     </tr>
                     <tr>
                        <td width="100"> </td>
                        <td>
                           <input name="add" type="submit" id="add" value="Add Recipe">
                        </td>
                     </tr>
                  </table>
               </form>
		</div>
  <div data-role="footer" data-position="fixed" >
		<!-- data-fullscreen="true" -->
    <h4>Tyson Funk&copy; 2017</h4>
  </div>
</div>
</div>
<!-- End add recipe2 -->
</body>
</html>
<?php ob_end_flush(); ?>
