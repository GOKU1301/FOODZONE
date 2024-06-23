<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore the best restaurants in town with Foodzone and order your favorite meals.">
    <title>Foodzone - Restaurants</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles2.css">
</head>

<body>
    <header>
        <h1>FOODZONE</h1>
        <p>Your Ultimate Food Delivery</p>
    </header>

    <section>
        <h2>Available Restaurants</h2>

        <?php
        // Database credentials
        $hostname = 'localhost';  // or '127.0.0.1'
        $username = 'root';       // default username for XAMPP MariaDB
        $password = '';           // default password is blank
        $database = 'foodzone_db'; // replace with your actual database name

        // Create connection
        $conn = new mysqli($hostname, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch restaurants
        $sql = "SELECT * FROM restaurants";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="restaurant">';
                echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                echo '<a href="menu.php?restaurant=' . htmlspecialchars($row['id']) . '">View Menu</a>';
                echo '</div>';
            }
        } else {
            echo "No restaurants found.";
        }

        // Close connection
        $conn->close();
        ?>
    </section>

    <footer>
        &copy; 2023 Foodzone. All rights reserved.
    </footer>
    <script src="scripts.js"></script>
</body>

</html>
