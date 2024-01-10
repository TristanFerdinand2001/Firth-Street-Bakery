<?php
include "connect.php";
$searchQuery = "";
$whereClause = "";
// Check if a search query has been submitted
if(isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $whereClause = " WHERE name LIKE '%$searchQuery%'";
}
// Query the database with the search condition
$query = "SELECT id, name FROM `cakes`" . $whereClause;
$resultset = $conn->query($query);
$cakes = $resultset->fetchAll();
$conn = NULL;
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>List of Cakes</title>
    <link rel="stylesheet" href="stylesheet.css">
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<body>
    <h2><strong><u>Firth Streets Finest Cakes: </u></strong></h2>
    <!-- Search form -->
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Search Cakes" value="<?php echo htmlentities($searchQuery); ?>">
        <input type="submit" value="Search">
    </form>
    <?php
    // Display results
    if($cakes){
        foreach($cakes as $cake){
            echo "<p>";
            echo "<a href='cakedetails.php?id={$cake['id']}'>";
            echo "{$cake['name']}";
            echo "</a>";
            echo "</p>";
        }
    } else {
        echo "<p>No cakes found</p>";
    }
    ?>
    <!-- Back to index -->
   <button> <a href="index.php"><p><strong>Back</strong></p></a></button>
</body>
</html>
