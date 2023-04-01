<?php
session_start();

include '../inc/config/db.php';

$user_id=$_SESSION['user_id'];
//	 Redirect the user to login page if he is not logged in.
if(!isset($_SESSION['loggedIn'])){
    header('Location: login.php');
    exit();
}

// require_once('inc/config/constants.php');
// require_once('inc/config/db.php');
require_once('../inc/header.html');
?>
<body>

<link href="../css/style.css" rel="stylesheet">
<?php
require '../inc/navigation.php';
?>
<!-- Page Content -->

<div class="container-fluid">
    <br>
    <br>
    <div class="row">
        <div class="col-lg-2">
            <h4 class="my-4">My Dashboard</h4>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-item-tab" data-toggle="pill" href="" role="tab" aria-controls="v-pills-item" aria-selected="true">Item</a>
                <a class="nav-link" id="v-pills-purchase-tab" data-toggle="pill" href="purchase.php" role="tab" aria-controls="v-pills-purchase" aria-selected="true">Purchase</a>
                <a class="nav-link" id="v-pills-vendor-tab" data-toggle="pill" href="#v-pills-vendor" role="tab" aria-controls="v-pills-vendor" aria-selected="false">Vendor</a>
                <a class="nav-link active" id="v-pills-sale-tab" data-toggle="pill" href="sales.php" role="tab" aria-controls="v-pills-sale" aria-selected="false">Sale</a>
                <a class="nav-link" id="v-pills-customer-tab" data-toggle="pill" href="#v-pills-customer" role="tab" aria-controls="v-pills-customer" aria-selected="false">Customer</a>
                <a class="nav-link" id="v-pills-search-tab" data-toggle="pill" href="#v-pills-search" role="tab" aria-controls="v-pills-search" aria-selected="false">Search</a>
                <a class="nav-link" id="v-pills-reports-tab" data-toggle="pill" href="reports.php" role="tab" aria-controls="v-pills-reports" aria-selected="false">Reports</a>
                <a class="nav-link" id="v-pills-reports-tab" data-toggle="pill" href="reports.php" role="tab" aria-controls="v-pills-reports" aria-selected="false">Reports</a>
            </div>
        </div>
        <div class="col-lg-10">
            <h2>My purchase Menu</h2>
            <table class="table table-hover table-bordered text-center">
                <tr class="text-center">
                    <th>id</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th colspan="2">Actions</th>
                </tr>

                <?php
                $items="select * from sale where user_id = '$user_id'";

                $items_run=mysqli_query($conn,$items);
                while($posts=mysqli_fetch_assoc($items_run)) {
                    ?>

                    <tr>
                        <td><?php echo $posts['id']?></td>
                        <td id="post_name"><?php echo $posts['type']?></td>

                        <td><?php echo $posts['quantity']?></td>

                        <td>
                            <form action="customerprocessor.php"  method="post">
                                <input type="text" name="idno" hidden="" value="<?php echo $posts['id']?>">
                                <button type="submit" class="btn btn-danger" name="delete">Cancel Sale</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>


            </table>

            <hr>
            <form action="customerprocessor.php" method="post">
                <h2>Enter Grain  details</h2>
                <div class="form-group">
                    <label for="">Product type</label>
                    <select name="type" class="form-control" id="">
                        <option value="maize">maize</option>
                        <option value="beans">beans</option>
                        <option value="groundnuts">groundnuts</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" class="form-control">
                </div>
                <div class="form-group">

                    <label for="">Quantity per bag</label>
                    <p>90 kg per every bag</p>
                </div>
                <div class="form-group">
                    <button name="sale" type="submit" class="btn btn-primary"> Request Sale </button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php
require '../inc/footer.php';
?>
</body>
</html>
