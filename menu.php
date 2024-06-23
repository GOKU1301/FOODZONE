<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Check out our menu items at Foodzone and order your favorite food.">
    <title>Foodzone - Menu Items</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles3.css">
</head>

<body>
    <header>
        <h1>FOODZONE</h1>
        <p>Your Ultimate Food Delivery</p>
    </header>

    <section>
        <h2>Menu Items</h2>

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

        // Query to fetch menu items
        $restaurant_id = $_GET['restaurant'];  // Assuming you pass restaurant ID via URL
        $sql = "SELECT * FROM menu_items WHERE restaurant_id = $restaurant_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="menu-item">';
                echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                echo '<p>Price: ' . htmlspecialchars($row['price']) . '</p>';
                echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                echo '</div>';
            }
        } else {
            echo "No menu items found for this restaurant.";
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
