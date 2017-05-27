<?php
// Connect to MySQL
include 'config.php';
include 'opendb.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql= "SELECT Userid, Username, fname, lname, email, FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Userid : " . $row["Userid"]. "<br>";
        echo "Username : " . $row["Username"]. " " . $row["lname"]. "<br>";
        echo "First Name : " . $row["fname"]. "<br>";
        echo "Last Name : " . $row["lname"]."<br><hr>";
        echo "Email : " . $row["email"]."<br><hr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
