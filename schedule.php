<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["timedate"]) && isset($_POST["amount"])) {
        $timedate = $_POST["timedate"];
        $amount = $_POST["amount"];

        try {
            // Adjust the path as necessary
            require_once "dbconnect.php";

            $query = "INSERT INTO sprinklingsched (timedate, amount) VALUES (:timedate, :amount)";
            
            $stmt = $pdo->prepare($query);

            // Bind parameters
            $stmt->bindParam(':timedate', $timedate);
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
