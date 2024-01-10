<?php
//Connect to database
include "connect.php";

// Retrieve using $_POST and assign to variable
$cakeName = $_POST['name'];
$cakeDes = $_POST['description'];
$cakeServ = $_POST['servings'];
$flavourId = $_POST['flavour_id'];
$cakeVeg = $_POST['vegan'];
$catId = $_POST['category_id'];

// Query the database
$query = "INSERT INTO cakes (id, name, description, servings, flavour_id, vegan, category_id) 
VALUES (NULL, :name, :description, :servings, :flavour_id, :vegan, :category_id)";
$stmt = $conn->prepare($query); //?
//Bind the values to varibales
$stmt->bindValue(':name', $cakeName);
$stmt->bindValue(':description', $cakeDes);
$stmt->bindValue(':servings', $cakeServ);
$stmt->bindValue(':flavour_id', $flavourId);
$stmt->bindValue(':vegan', $cakeVeg);
$stmt->bindValue(':category_id', $catId);

//Verifying if the cake has been added or not
if ($stmt->execute()) {
    echo "Details for {$cakeName} have been added\n.";
} else {
    echo "There was an issue saving the cake";
}

$conn = null; // Close connection
 
?>
<html>
    <!--Link to Stylesheet -->
<link rel="stylesheet" href="stylesheet.css">      
<title>SaveCake</title> 
<p>
<!-- Button to return to index  -->
<button><p><a href="index.php">Click here to return to index</a></p></button>
<button><p><a href="createCake.php">Click here to create another cake</a></p></button>
</p>
</html>

