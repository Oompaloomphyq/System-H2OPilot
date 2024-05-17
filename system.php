<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["area"]) && isset($_POST["pressure"])) {
        $area = $_POST["area"];
        $pressure = $_POST["pressure"];

        try {
            // Adjust the path as necessary
            require_once "dbconnect.php";

            $query = "INSERT INTO systeminfo (area, pressure) VALUES (:area, :pressure)";
            
            $stmt = $pdo->prepare($query);

            // Bind parameters
            $stmt->bindParam(':area', $area);
            $stmt->bindParam(':pressure', $pressure);

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
