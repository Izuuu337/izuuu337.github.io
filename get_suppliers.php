<?php

$connection = mysqli_connect("localhost", "root", "", "warehouse_db");
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}


$query = "SELECT id, name FROM suppliers";
$result = mysqli_query($connection, $query);


$options = "<option value=''>-- Select Supplier --</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}


mysqli_close($connection);


echo $options;
?>
