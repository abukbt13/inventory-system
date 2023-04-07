<?php
include '../connection.php';

$type = $_POST['type'];

// Query the database for the districts that belong to the selected region
$sql = "SELECT description FROM products_description WHERE description='$type'";
$result = mysqli_query($conn, $sql);

// Create an array of district names
$names = array();
while ($row = mysqli_fetch_assoc($result)) {
    $names[] = $row['description'];
}


// Return the district names as a JSON object
echo json_encode($names);