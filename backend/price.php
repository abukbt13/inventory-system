<?php
include '../connection.php';

$description = $_POST['description'];

// Query the database for the price per quantity of the selected product description
$sql = "SELECT price_per_quantity FROM products_description WHERE description='$description'";
$result = mysqli_query($conn, $sql);

// Get the price per quantity value from the result
$row = mysqli_fetch_assoc($result);
$price_per_quantity = $row['price_per_quantity'];

// Return the price per quantity as the response
echo json_encode($price_per_quantity);

