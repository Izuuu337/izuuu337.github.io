<?php

$connection = mysqli_connect("localhost", "root", "", "warehouse_db") or die("Unable to connect!");


$query = "SELECT i.id, i.product_name, i.category, i.stock_qty, s.name AS supplier_name
          FROM inventory i
          JOIN suppliers s ON i.supplier_name = s.id";

$result = mysqli_query($connection, $query);


echo "<html>
<head>
    <title>View Inventory</title>
</head>
<body>
    <h1>Warehouse Inventory</h1>
    <table border='1' width='60%'>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Stock Quantity</th>
            <th>Supplier Name</th>
        </tr>";


while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['product_name'] . "</td>";
    echo "<td>" . $row['category'] . "</td>";
    echo "<td>" . $row['stock_qty'] . "</td>";
    echo "<td>" . (!empty($row['supplier_name']) ? $row['supplier_name'] : 'N/A') . "</td>";
    echo "</tr>";
}

echo "</table></body></html>";


mysqli_close($connection);
?>

<p><a href="index.html">Home</a></p>
