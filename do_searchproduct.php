<?php 

$connection = mysqli_connect("localhost", "root", "", "warehouse_db") or die("Unable to connect!");


$product_name = $_POST['txtproductname'];


$query = "SELECT i.id, i.product_name, i.category, i.stock_qty, s.name AS supplier_name
          FROM inventory i
          JOIN suppliers s ON i.supplier_name = s.id
          WHERE i.product_name LIKE '%$product_name%'";

$result = mysqli_query($connection, $query);


if (mysqli_num_rows($result) > 0) {
    echo "<h2>Search Results</h2>";
    echo "<table border='1' width='60%'>
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
        echo "<td>" . $row['supplier_name'] . "</td>"; // Now it should show the actual supplier name
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "<h2>No products found for '$product_name'.</h2>";
}


mysqli_close($connection);
?>

<p><a href="index.html">Home</a></p>
