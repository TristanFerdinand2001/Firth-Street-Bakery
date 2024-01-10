<html>
<link rel="stylesheet" href="stylesheet.css">
<head>
    <?php
    session_start();
    include "connect.php";
    // Only Admins can access create cakes
    if($_SESSION["role"] != 2){
        echo "<strong><p><u>Only admins can access this page</u></p></strong>";
        echo "</body>";
        echo "</html>";
        exit;
    } ?>
<html>
<link rel="stylesheet" href="stylesheet.css">
<head>
<title>Add new Cake</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
    <!--Add cakes form -->
<h1><strong><u>Add a new Cake</u></strong></h1>
<form action="saveCake.php" method="post">
<div>
<label for="name">Name:</label>
<input type="text" id="name" name="name">
</div>
<div>
<label for="description">Description:</label>
<input type="text" id="description" name="description">
</div>
<div>
<label for="servings">Servings:</label>
<input type="text" id="servings" name="servings">
</div>
<div>
<label for="flavour_id">Flavour_id: </label>
<input type="text" id="flavour_id" name="flavour_id">
</div>
<div>
<label for="vegan">Vegan: </label>
<input type="text" id="vegan" name="vegan">
</div>
<label for="category_id">Category_id:</label>
<input type="text" id="category_id" name="category_id">
</div> 

<!--Submit Cake  -->
<input type="submit" name="submitBtn" value="Add Cake">
</form>

<button><a href="index.php">Back</a></button>
</body>
</html>

