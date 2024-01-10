<!DOCTYPE html>
<html>
<head>
    <title>Cake Categories</title>
    <link rel="stylesheet" href="stylesheet.css">
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<body>
<?php
session_start();
// Connect to database
include "connect.php";

// Query the database
$query = "SELECT * FROM categories";
$stmt = $conn->prepare($query);
$stmt->execute();
$selectCat = $stmt->fetchAll();
$conn = NULL; // Close the database connection
?>
<h2><strong><u>Firth Streets Finest Cakes: </u></strong></h2>
<u><h3>Please select one of the Cake Categories below:</h3></u>
<?php
//Retreive Categories
if($selectCat){
    foreach($selectCat as $selectCat){
        echo "<p>";
        echo "<a href='cakesComingSoon.php?id={$selectCat['name']}'>";
        echo "{$selectCat['name']}";  
        echo "</a>";
        echo "</p>";
    }
} else {
    echo "<p>No cakes found</p>";
}
?>
<button><a href="index.php">Back</a></button>
</body>
</html>
