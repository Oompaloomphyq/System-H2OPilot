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
<body style="background: url('../system/pics/home.png') no-repeat center center fixed;
            background-size: cover;" >
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

</body>
</html>