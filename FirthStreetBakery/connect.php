<html>
       <body>
<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=webdevelopment', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo "Oh no, there was a problem" . $exception->getMessage();
}
?>
</body>

<footer>
       
</footer>
