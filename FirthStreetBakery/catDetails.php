<!DOCTYPE HTML>
<html>
<head>
    <title>Category Details</title>
    <link rel="stylesheet" href="stylesheet.css">
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<body>
    <?php
    // Connect to database
    include "connect.php";
    $chosenCat = $_GET["id"]; // GET id and store in a variable
    // Query the database
    $query = "SELECT * FROM cakes WHERE category_id = :id";  
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':id', $chosenCat);  //Binding :id to variable
    $stmt->execute();
    $chosenCat = $stmt->fetch();
    $conn = NULL;

    if ($chosenCat) {
        echo "<h1><u>{$chosenCat['name']}</u></h1>";
        echo "<p>{$chosenCat['description']}</p>";
        echo "<p>Servings: {$chosenCat['servings']}</p>";
        echo "<p>Vegan Versions: {$chosenCat['vegan']}</p>";
        echo "<p>Flavour: {$chosenCat['flavour_id']}</p>";
    } else {
        echo "<p>No cakes were found</p>";
    }
    ?>
</body>
</html>
