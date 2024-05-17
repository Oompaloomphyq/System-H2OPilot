<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["schedule"]) && isset($_POST["amount"]) && isset($_POST["userinfoID"])) {
        $schedule = $_POST["schedule"];
        $amount = $_POST["amount"];
        $userinfoID = $_POST["userinfoID"];  // Retrieve the user ID from the form

        try {
            // Adjust the path as necessary
            require_once "dbconnect.php";

            $query = "UPDATE userinfo SET schedule = :schedule, amount = :amount WHERE userinfoID = :userinfoID;";
            
            $stmt = $pdo->prepare($query);

            // Bind parameters
            $stmt->bindParam(':schedule', $schedule);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':userinfoID', $userinfoID);

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
