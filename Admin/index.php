
<?php

include '../connection.php';
session_start();
if(!$_SESSION['role']){
    session_start();
    $_SESSION['error']='Login to view this page';
    header("Location:../login.php");
}
if(!$_SESSION['role']=='superadmin'){
    session_start();
    $_SESSION['error']='You are not allowed to view that  page';
    header("Location:../index.php");
}


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
        }?>| <a  style="font-size:22px;" href="../logout.php" class="btn text-white">Logout</a></h2>
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

    <div style="display: flex; padding-right: 2rem; background: #0f5132;padding-left: 2rem; align-items: center; justify-content: space-between;" class="">
        <div class="">
            <p style="font-size: 27px;" class="text-center p-3 bg-secondary text-uppercase"><?php echo $_SESSION['status'] ?></p>

        </div>
    </div>

    <?php
    unset($_SESSION['status']);
}
?>
<div class="mainbody d-flex">
    <div class="sidebar">
        <div class="form-group ms-4">
            <h4>Purchase orders</h4>
            <div class="link">
                <span class="">   <a href="purchase.php">Purchase Request</a></span><br><br>
                <span class="my-5">   <a href="purchaseorders.php">Processed purchases orders</a></span><br><br>
            </div>

        </div>
        <div class="form-group ms-4">
            <h4>Sell Orders</h4>
            <div class="link">
                <span class="">   <a href="sale.php" >Active Orders</a></span><br><br>
                <span class="my-5">   <a href="saleorders.php" >processed sale orders</a></span><br><br>
            </div>

        </div>
        <div class="form-group ms-4">
            <h4>Feedbacks</h4>
            <div class="link">
                <span class="">   <a href="feedbacks.php">Unread Feedback</a></span><br><br>
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
        <h2>dashboard</h2>
        <div class="students p-4 bg-info m-2" >
            <p class="text-center">Sales that have been sold to customers so far</p>
            <p class="text-center">
                <?php
                $academics="select * from sale";
                $academicsrun=mysqli_query($conn,$academics);
                $academicsnum=mysqli_num_rows($academicsrun);
                echo $academicsnum;
                ?>
            </p>

        </div>
        <div class="students m-2 p-4 bg-info" >
            <p class="text-center">Number of customers who have sold us their items so far</p>
            <p class="text-center"><?php
                $data="select * from purchase";
                $datarun=mysqli_query($conn,$data);
                $datarunnum=mysqli_num_rows($datarun);
                echo $datarunnum;
                ?>
            </p>
        </div>
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