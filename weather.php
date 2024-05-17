<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["temperature"]) && isset($_POST["soildata"]) ) {
        $temperature = $_POST["temperature"];
        $soildata = $_POST["soildata"];

        try {
            // Adjust the path as necessary
            require_once "dbconnect.php";

            $query = "INSERT INTO weatherdata (temperature, soildata) VALUES (:temperature, :soildata)";
            
            $stmt = $pdo->prepare($query);

            // Bind parameters
            $stmt->bindParam(':temperature', $temperature);
            $stmt->bindParam(':soildata', $soildata);

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
