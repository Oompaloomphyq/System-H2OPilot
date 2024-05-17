<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["userinfoID"])) {
        $userinfoID = $_POST["userinfoID"];

        try {
            // Adjust the path as necessary
            require_once "dbconnect.php";

            // Delete the row with the specified userinfoID
            $query = "DELETE FROM userinfo WHERE userinfoID = :userinfoID";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':userinfoID', $userinfoID);
            $stmt->execute();

            // Clear the PDO object
            $pdo = null;

            // Redirect
            header("Location: sprinkle.php");
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        die("Required field is missing.");
    }
} else {
    header("Location: sprinkle.php");
}
?>
