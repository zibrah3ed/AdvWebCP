<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Grocery Getter</title>
<!-- Jquery header data -->
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="https://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css" rel="stylesheet" type="text/css"/>
<link href="styles/custom.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js" type="text/javascript"></script>

<!-- Google Login -->
<meta name="google-signin-client_id" content="766184885385-eb4lt7s8tsshtu4j84rsmpo76t7if9tv.apps.googleusercontent.com">
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
  <div id="sign_in_process" data-role="page" data-theme="a">
<?php
  // Create connection

  include 'config.php';
  include 'opendb.php';

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  function login() {
    $username = $_GET['uname'];
    $psw = $_GET['psw'];

    $sql = "SELECT username, password FROM users WHERE username='$username' and password='psw'";

    $result = mysqli_query($conn,$sql);

    if(!$result || mysql_num_rows($result) <= 0)
       {
           echo "<p>Error logging in. The username or password does not match</p>";
           return false;
       } else {
         echo "<p>
         Thanks for signing in
         </p>";

         return true;
       }

      //  $row = mysqli_fetch_assoc($result);
       //
      //   $_SESSION['name_of_user']  = $row['name'];
      //   $_SESSION['email_of_user'] = $row['email'];


     }
 ?>

  <div data-role="footer" data-position="fixed" data-fullscreen="true">
    <h4>Tyson Funk&copy; 2017</h4>
  </div>
  </div>
</body>
