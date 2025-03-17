<?php 

$connection = mysqli_connect("localhost", "root", "", "warehouse_db") or die("Unable to connect!");


$supplier_name = $_POST['txtsuppliername']; 
$contact = $_POST['txtcontact']; 


$query = "INSERT INTO suppliers (name, contact) VALUES ('$supplier_name', '$contact')"; 
$result = mysqli_query($connection, $query) or die("Error in query: $query. " . mysqli_error($connection)); 

echo '<br>'; 
echo '<font size=-1 color="red">Supplier was added successfully.</font><br><br>'; 

 
mysqli_close($connection); 
?>

<p><a href="index.html">Home</a></p>
