<?php
include 'config.php';
include 'opendb.php';

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}



mysqli_close($conn);
?>
