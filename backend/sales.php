<?php
include '../connection.php';

$price = $_POST['price'];

// Query the database for the price per quantity of the selected product description
$sql = "SELECT price FROM sales_description WHERE name='$price'";
$result = mysqli_query($conn, $sql);

// Get the price per quantity value from the result
$row = mysqli_fetch_assoc($result);
$price= $row['price'];

// Return the price per quantity as the response
echo json_encode($price);

