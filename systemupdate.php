<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["area"]) && isset($_POST["pressure"]) && isset($_POST["userinfoID"])) {
        $area = $_POST["area"];
        $pressure = $_POST["pressure"];
        $userinfoID = $_POST["userinfoID"];

        try {
            require_once "dbconnect.php";

            $query = "UPDATE userinfo SET area = :area, pressure = :pressure WHERE userinfoID = :userinfoID;";
            
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':area', $area);
            $stmt->bindParam(':pressure', $pressure);
            $stmt->bindParam(':userinfoID', $userinfoID);


            $stmt->execute();
         
            $pdo = null;
            $stmt = null;

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
