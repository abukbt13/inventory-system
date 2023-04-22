
<?php
session_start();

include '../connection.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Admin view</title>
</head>
<body>
<div style="background: blue;" class="header d-flex justify-content-around align-content-center">
    <h2 class="text-white">Cereals Inventory system </h2>
    <h2 class="text-white"><?php if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
        }?>| <a  style="font-size:22px;" href="logout.php" class="btn text-white">Logout</a></h2>
</div>
<style>
    body{
        /*background:#ddd;*/
    }
    .sidebar{
        width:20vw;height:100vh;background:#F0DDDA;
    }
    .main_content{
        width:68vw;height:100vh;
    }
    .link a{
        text-decoration: none;
        font-size: 18px;
        padding: 0.5rem;
    }
    span{
        /*background: #00A8FF;*/
        padding: 0.6rem;
    }

    .link a:hover{
        background: whitesmoke;
    }

</style>
<?php
if(isset($_SESSION['status'])){
    ?>
    <p style="font-size: 27px;" class="text-center p-3 bg-secondary text-uppercase"><?php echo $_SESSION['status'] ?></p>
    <?php
    unset($_SESSION['status']);
}
?>
<div class="mainbody d-flex">
    <div class="sidebar">
        <h3 class="text-center text-primary">Dashboard</h3>
        <div class="form-group ms-4">
            <h4>Purchase orders</h4>
            <div class="link">
                <span class="">   <a href="purchase.php">Purchase Request</a></span><br><br>
                <span class="my-5">   <a href="orders.php">Processed purchases</a></span><br><br>
            </div>

        </div>
        <div class="form-group ms-4">
            <h4>Sell Orders</h4>
            <div class="link">
                <span class="">   <a href="sale.php" >Active Orders</a></span><br><br>
                <span class="my-5">   <a href="cleared.php" >Cleared orders</a></span><br><br>
            </div>

        </div>
        <div class="form-group ms-4">
            <h4>Feedbacks</h4>
            <div class="link">
                <span class="">   <a href="feedback.php">Unread Feedback</a></span><br><br>
            </div>

        </div>
        <div class="form-group ms-4">
            <h4>Reports</h4>
            <div class="link">
                <span class="">   <a href="reports.php" >Generate reports</a></span><br><br>
            </div>

        </div>


    </div>
    <div class="main_content">
        <table class="table table-responsive-sm table-primary table-hover table-bordered">
            <thead>
            <tr><td class="text-center text-uppercase" colspan="7">Farmers requesting to sell their products</td></tr>
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Total price</th>
                <th>User id</th>
                <th colspan="">Accept</th>
                <th colspan="">Decline</th>
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
                        <form action="processor.php" method="post">
                            <input type="number" name="id" hidden="" value="<?php echo $rows['id']?>">
                            <button type="submit" name="acceptsale" class="btn btn-success">Accept</button>
                        </form>

                    </td>
                    <td>
                        <form action="processor.php" method="post">
                            <input type="number" name="id" hidden="" value="<?php echo $rows['id']?>">

                            <button type="submit" name="declinesale" class="btn btn-success">Decline</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

    </div>
</div>
<div style="background: blue; position: fixed;bottom: 0px; width: 100%;" class="header d-flex justify-content-around align-content-center pt-3">
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <p style="color: white; font-size: 23px;">Copyrights &copf; inventory system 2023</p>
</div>
</body>
</html>

