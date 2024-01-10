<?php
session_start();
include "connect.php";
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="stylesheet.css">
<head>
<title>Login Process</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>
<body>
  <?php
  if(isset($_POST['login']))
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindValue(':email', $email);    //Swap PlaceHolder for $email from DB
    $stmt->execute();
    $login = false;
    if($row = $stmt->fetch()){
      //Check if the password is correct
      if(password_verify($password, $row["password"])) {
         //Correct username and password, so the email address is assigned to a session variable
         $_SESSION["user"] = $email;
         $_SESSION["role"] = $row['role']; //store the user's role
         echo "<p>Correct details, you can now go to <a href='index.php'>homepage</a></p>";
     }else{
         // Wrong username/password
         echo "<p>That's the wrong username/password</p>";
     }    
    } }else{
       header( "Location: login.php" );
    }  
?>
</body>
</html>
