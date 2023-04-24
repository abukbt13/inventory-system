<?php
include '../connection.php';

$type = $_POST['type'];

// Query the database for the districts that belong to the selected region
$sql = "SELECT * FROM products_description WHERE product_name='$type'";
$result = mysqli_query($conn, $sql);

// Create an array of district names
$names = array();
$price = array();
while ($row = mysqli_fetch_assoc($result)) {
    $names[] = $row['description'];
    $price [] = $row['price_per_quantity'];

}

echo json_encode($names);