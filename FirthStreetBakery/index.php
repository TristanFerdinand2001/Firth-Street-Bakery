<?php
include "connect.php";
session_start();
//Must be user or an admin to access page
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
//Note their role at the top
if($_SESSION["role"] == 2){
    echo "<strong><p><u>*You are logged in as an Admin*</u></p></strong>";
    echo "</body>";
    echo "</html>";
}else{
    echo "<strong><p><u>*You are logged in as a User*</u></p></strong>";
} ?>
<html>
    <!--Link to Stylesheet -->
    <link rel="stylesheet" href="stylesheet.css">
<head>
<div class="header">
<title>Firth Street Bakery</title>
</head>
</div>
<body>
    <header style ="background-color:red">
            <!--User logged in noted at top of page -->
    <?php echo "<p>You are logged in as :<strong> {$_SESSION['user']}</strong></p>"; ?>
    <u><strong><h1>Firth Street Bakery</h1></strong></u>

        <main> </main>

    </header>
<p>Discover all the different flavours of cake from Victoria Sponge to Tea Loaf.</p>
<p>We have wide range of products, all made fresh everyday and served to our loveley customers.</p>
<p> Firth Street Bakery has all of the cake you could possibly need! </p>
 <p><strong>Family Bakery since 1904!</strong></p>
<nav>
        <!--List of pages -->
        <li><a href="cakelist.php">Cakes</a></li>
        <li><a href="createCake.php">Add new cake</a></li>
        <li><a href="cakeCat.php">Cake's coming soon</a></li>
        <li><a href="404-view.php">Click Here for help</a></li>
    
        <!-- Sign out  -->
      <button><strong><li><a href="login.php">Sign out</a></strong></li></button>
</nav>
<div class="footer">  
</div>

</body>
</html>
