<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["area"]) && isset($_POST["pressure"]) && isset($_POST["schedule"]) && isset($_POST["amount"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $area = $_POST["area"];
        $pressure = $_POST["pressure"];
        $schedule = $_POST["schedule"];
        $amount = $_POST["amount"];

        try {
            // Adjust the path as necessary
            require_once "dbconnect.php";

            $query = "INSERT INTO userinfo (username, email, area, pressure, schedule, amount) VALUES (:username, :email, :area, :pressure, :schedule, :amount)";
            
            $stmt = $pdo->prepare($query);

            // Bind parameters
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':area', $area);
            $stmt->bindParam(':pressure', $pressure);
            $stmt->bindParam(':schedule', $schedule);
            $stmt->bindParam(':amount', $amount);

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
