<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["cropsize"]) && isset($_POST["schedule"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $cropsize = $_POST["cropsize"];
        $schedule = $_POST["schedule"];

        try {
            // Adjust the path as necessary
            require_once "dbconnect.php";

            $query = "INSERT INTO userinfo (username, email, cropsize, schedule) VALUES (:username, :email, :cropsize, :schedule)";
            
            $stmt = $pdo->prepare($query);

            // Bind parameters
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cropsize', $cropsize);
            $stmt->bindParam(':schedule', $schedule);

            // Execute the statement
            $stmt->execute();

            // Clear the PDO and statement objects
            $pdo = null;
            $stmt = null;

            // Redirect
            header("Location: sprinkle.php");
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        die("Required fields are missing.");
    }
} else {
    header("Location: ../sprinkle.php");
}
