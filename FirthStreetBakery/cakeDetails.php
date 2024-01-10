<?php
//Connect to database
include "connect.php";
session_start();
$cakeId = $_GET["id"]; //GET id and bind to a variable

//query the database
$query = "SELECT cakes.*, flavours.name AS flavour_name 
          FROM cakes 
          INNER JOIN flavours ON cakes.flavour_id = flavours.id 
          WHERE cakes.id = :id";
$stmt = $conn->prepare($query); 
$stmt->bindValue(':id',$cakeId);  //Binding the value to a variable
$stmt->execute();
$chosenCake = $stmt->fetch();
$conn=NULL;
?>
<html>
    <head>
        <title>Cake Details</title> 
        <link rel="stylesheet" href="stylesheet.css">
        <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<?php  
if($chosenCake){ 
    echo"<h1><u>{$chosenCake['name']}</u></h1>";
    echo "<p>{$chosenCake['description']}</p>";
    echo "<p>Serves: {$chosenCake['servings']} people</p>";
    echo "<p>Flavour: {$chosenCake['flavour_name']}</p>";
}else{
    "<p>No cakes were found</p>";
}
//Checking if the cake is Vegan
if($chosenCake['vegan'] == 1){
    echo "<strong>Vegan</strong>";
}else{
    echo "<strong>Not Vegan</strong>\n";
}
?>
<p>            

 </p>
<button><a href="cakeList.php">Back</a></button>
</body>
</html>