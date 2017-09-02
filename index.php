<?php
 ob_start();
 session_start();
 include 'config.php';
 include 'opendb.php';
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }
 $error = false;
 if( isset($_POST['btn-login']) ) {
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  // if there's no error, continue to login
  if (!$error) {
   $password = hash('sha256', $pass); // password hashing using SHA256
   $res=mysqli_query($conn,"SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
   $row=mysqli_fetch_array($res);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: home.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
  }
 }
?>
<!DOCTYPE html>
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
<div id="main_page" data-role="page" data-theme="a">
  <div data-role="header">
    <h1>Grocery Getter</h1>
    </div>
<div class="logo">
      <center>
          <img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
    </center>
    </div>
<div class="container">

 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

     <div class="col-md-12">

         <div class="form-group">
             <h2 class="">Sign In.</h2>
            </div>

         <div class="form-group">
             <hr />
            </div>

            <?php
   if ( isset($errMSG) ) {
    ?>
    <div class="form-group">
             <div class="alert alert-danger">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>

            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>

            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>

            <div class="form-group">
             <hr />
            </div>

            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>

            <div class="form-group">
             <hr />
            </div>

            <div class="form-group">
             <a href="register.php">Sign Up Here...</a>
            </div>

        </div>

    </form>
    </div>

</div>
<div data-role="footer" data-position="fixed" >
  <!-- data-fullscreen="true" -->
  <h4>Tyson Funk&copy; 2017</h4>
</div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>
