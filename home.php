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
  <div id="main_page" data-role="page" data-theme="a">
    <div data-role="header">
      <h1>Grocery Getter</h1>
      </div>
  <div class="logo">
        <center>
            <img src="themes/images/banner.png" class="img-rounded img-responsive" width="264" height="85" alt="">
      </center>
      </div>
 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.codingcage.com">Coding Cage</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html">Back to Article</a></li>
            <li><a href="http://www.codingcage.com/search/label/jQuery">jQuery</a></li>
            <li><a href="http://www.codingcage.com/search/label/PHP">PHP</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['userEmail']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

 <div id="wrapper">

 <div class="container">

     <div class="page-header">
     <h3>Coding Cage - Programming Blog</h3>
     </div>

        <div class="row">
        <div class="col-lg-12">
        <h1>Focuses on PHP, MySQL, Ajax, jQuery, Web Design and more...</h1>
        </div>
        </div>

    </div>

    </div>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>
