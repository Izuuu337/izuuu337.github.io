<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "warehouse_db");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Fetch suppliers
$result = $conn->query("SELECT name, contact FROM suppliers");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Supplier List</title>
</head>
<body>

    <h2>Supplier List</h2>
    <table border="1">
        <tr>
            <th>Supplier Name</th>
            <th>Contact</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row["name"] ?></td>
            <td><?= $row["contact"] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>

<?php $conn->close(); ?>
<br><a href="index.html">Back to Home</a>