<?php
try {
    // Adjust the path as necessary
    require_once "dbconnect.php";

    // Fetch data from the userinfo table
    $query = "SELECT * FROM userinfo";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $userinfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Clear the PDO object
    $pdo = null;
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <img src="../system/pics/title3.png" style="max-width: 100%; height: auto; margin-top:20px; margin-bottom:20px;">
    <nav>
        <div class="logo">
            <img src="../system/pics/ogol.png" style="height: 30px; width: auto; margin: 0 auto;">
        </div>

        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="sprinkle.php">System</a>
        <a href="contact.php">Contact</a>
        <div class="search">
            <input type="text" placeholder="____________________________________________________">
            <button type="submit"></button>
        </div>
    </nav>
    <img src="../system/pics/about1.png" style="max-width: 100%; height: auto; margin-top:20px;">
    <img src="../system/pics/about2.png" style="max-width: 100%; height: auto; margin-top:20px; margin-bottom:20px;">
    <br><br>
    <p style="text-align: center; font-size:18px;">
        <b> Join us on our mission to make agriculture more  sustainable and productive.<br> Together, we can make a difference.
    </p>
    <br><br>
    <footer>
        <p>© 2024 H20Pilot. All rights reserved.</p>
    </footer>

</body>
</html>