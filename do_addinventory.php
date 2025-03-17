<?php 
// Open database connection 
$connection = mysqli_connect("localhost", "root", "", "warehouse_db") or die("Unable to connect!");

// Get form data 
$product_name = $_POST['txtproductname']; 
$category = $_POST['txtcategory']; 
$stock_qty = $_POST['txtstockqty']; 
$supplier_name = $_POST['txtsuppliername']; 

// Insert into database 
$query = "INSERT INTO inventory (product_name, category, stock_qty, supplier_name) 
          VALUES ('$product_name', '$category', '$stock_qty', '$supplier_name')"; 

$result = mysqli_query($connection, $query) or die("Error in query: $query. " . mysqli_error($connection)); 

echo '<br>'; 
echo '<font size=-1 color="red">Inventory item was added successfully.</font><br><br>'; 

// Close database connection 
mysqli_close($connection); 
?>
<p><a href="index.html">Home</a></p>

