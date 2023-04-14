<?php
    include '../connection.php';
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="shortcut icon" href="icons/favicon.png">

    <title>Purchase requests</title>
</head>
<body>
<table class="table m-2 w-100  px-1 table-responsive-sm table-primary table-hover table-bordered">
    <thead>
    <tr><td class="text-center text-uppercase" colspan="5">Farmers requesting to buy from the company</td></tr>
    <tr>
        <th>Type</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Total price</th>
        <th colspan="2">Operation</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $ordered_food="select * from purchase where status='0'";
    $ordered_foodrun=mysqli_query($conn,$ordered_food);
    while($rows=mysqli_fetch_assoc($ordered_foodrun)){
        ?>
        <tr>
            <td><?php echo $rows['type']?></td>
            <td><?php echo $rows['name']?></td>
            <td><?php echo $rows['quantity']?></td>
            <td><?php echo $rows['totalprice']?></td>

            <td>
                <a class="btn btn-success">Accept</a>
                <a class="btn btn-success">Decline</a>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

</body>
</html>