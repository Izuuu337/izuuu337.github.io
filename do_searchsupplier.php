<?php

$connection = mysqli_connect("localhost", "root", "", "warehouse_db") or die("Unable to connect!");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['txtsuppliername'])) {
    $supplier_name = $_POST['txtsuppliername'];


    $query = "SELECT name, contact FROM suppliers WHERE name LIKE '%$supplier_name%'";

    $result = mysqli_query($connection, $query);


    echo "<h2>Supplier Search Results</h2>";

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' width='50%'>
                <tr>
                    <th>Supplier Name</th>
                    <th>Contact</th>
                </tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['contact'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<h2>No supplier found for '$supplier_name'.</h2>";
    }
} else {
    echo "<h2>Please enter a supplier name.</h2>";
}


mysqli_close($connection);
?>
<p><a href="index.html">Home</a></p>
