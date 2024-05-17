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
            <img src="../system/pics/ogol.png" style="height: 30px; width: auto;">
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
    <table>
        <tr>
            <td class="column">
                <div class="container">
                    <form action="userinfo.php" method="POST" width="auto">
                        <h3>User Information</h3>
                        <label>Name: <input type="text" name="username"></label>
                        <label>Email: <input type="email" name="email"></label>
                        <label>Coverage Area (sqm): <input type="number" name="area"></label>
                        <label>Water Pressure: <input type="number" name="pressure"></label>
                        <label>Preferred Irrigation Schedule: <input type="time" name="schedule"></label>
                        <label>Amount of Water (L): <input type="number" name="amount"></label>
                        <button>Add User</button>
                    </form>
                </div>
                    <br>
                <div class="container">
                    <form action="weather.php" method="POST">
                        <h3>Soil Condition</h3>
                        <label>Temperature (°C) <input type="number" name="temperature"></label>
                        <label>Soil Data<input type="text" name="soildata"></label>
                        <button>Add Weather Data</button>
                    </form>
                </div>  
            </td>
            <td class="column">
                <div class="container">
                        <form style="text-align:left;"  action="systemupdate.php" method="POST">
                            <h3 style="margin-left:4px">Sprinkler System Information</h3>
                            <label style="margin-left:4px">User Information ID: <input type="number" name="userinfoID"></label>
                            <label style="margin-left:4px">Coverage Area (sqm): <input type="number" name="area"></label>
                            <label style="margin-left:4px">Water Pressure: <input type="number" name="pressure"></label>
                            <button style="margin-left:4px">Update</button>
                        </form>
                </div>    
                    <br>
                <div class="container">
                    <form  style="text-align:left;" action="scheduleupdate.php" method="POST">
                        <h3 style="margin-left:4px">Sprinkling Schedule</h3>
                        <label style="margin-left:4px;">User Information ID: <input type="number" name="userinfoID"></label>
                        <label style="margin-left:4px">Preferred Irrigation Schedule: <input type="time" name="schedule"></label>
                        <label style="margin-left:4px">Amount of Water (L): <input type="number" name="amount"></label>
                        <button style="margin-left:4px">Update</button>
                    </form>
                </div>
            </td>
        </tr>
    </table>
    <br><br>
    <h1>User Info Table</h1>
    <table>
        <thead>
            <tr>
                <th style="text-align:center;">ID</th>
                <th style="text-align:center;">Username</th>
                <th style="text-align:center;">Email</th>
                <th style="text-align:center;">Area</th>
                <th style="text-align:center;">Pressure</th>
                <th style="text-align:center;">Schedule</th>
                <th style="text-align:center;">Amount</th>
                <th style="text-align:center;">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userinfo as $user): ?>
                <tr>
                    <td style="text-align:center;"><?php echo htmlspecialchars($user['userinfoID']); ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td style="text-align:center;"><?php echo htmlspecialchars($user['area']); ?></td>
                    <td style="text-align:center;"><?php echo htmlspecialchars($user['pressure']); ?></td>
                    <td style="text-align:center;"><?php echo htmlspecialchars($user['schedule']); ?></td>
                    <td style="text-align:center;"><?php echo htmlspecialchars($user['amount']); ?></td>
                    <td>
                        <form  method="post" action="delete.php" onsubmit="return confirm('Are you sure you want to delete this record?');">
                            <input  type="hidden" name="userinfoID" value="<?php echo htmlspecialchars($user['userinfoID']); ?>">
                            <input style="background-color: #698ea2;" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><br>
    <footer>
        <p>© 2024 H20Pilot. All rights reserved.</p>
    </footer>
</body>
</html>