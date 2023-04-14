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

    <title>Sales requests</title>
</head>
<body>
<div class="content mx-4 px-4">
    <table class="table table-responsive-sm table-primary table-hover table-bordered">
        <thead>
        <tr><td class="text-center text-uppercase" colspan="6">Farmers requesting to sell their products</td></tr>
        <tr>
            <th>Type</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Total price</th>
            <th>User id</th>
            <th colspan="2">Operation</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $ordered_food="select * from sale where status='0'";
        $ordered_foodrun=mysqli_query($conn,$ordered_food);
        while($rows=mysqli_fetch_assoc($ordered_foodrun)){
            ?>
            <tr>
                <td><?php echo $rows['type']?></td>
                <td><?php echo $rows['quantity']?></td>
                <td><?php echo $rows['price']?></td>
                <td><?php echo $rows['description']?></td>
                <td><?php echo $rows['user_id']?></td>

                <td>
                    <a class="btn btn-success">Accept</a>
                    <a class="btn btn-success">Decline</a>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

</div>
<div style="background: blue; position: fixed;bottom: 0px; width: 100%;" class="header d-flex justify-content-around align-content-center pt-3">
    <p style="color: white; font-size: 23px;">Copyrights &copf; inventory system 2023</p>
</div>
</body>
</html>