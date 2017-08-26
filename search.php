<?php
$query = $_GET['query'];

$query = mysqli_real_escape_string($query);
$query = "%".$query."%";

$sql2 = "SELECT * from recipes where recipeName LIKE '$query'";

$searchResults = mysqli_query($conn,$sql2);

if (mysqli_num_rows($searchResults) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($searchResults)) {
        echo "<li><a href'#'>". "<h3>Recipe Name: " . $row["recipeName"]. "</h3>";
        echo "<p>Recipe ID:" . $row["recipeID"]. "</p>";
        echo "<p>Gluten Free :" . $row["gfree"] . "</p>";
        echo "<p>Feeds :" . $row["feeds"]."</p>";
        echo "<p>Difficulty :" . $row["difficulty"]."</p>";
        echo "<p>Directions :" . $row["directions"]."</p>";
        echo "</a><a href='#'></a></li>";
    }
} else {
    echo "No recipes with that name";
}

mysqli_close($conn);
?>
