<?php
session_start();
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
<?php
require 'inc/navigation.php';
?>
<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">
            <h1 class="my-4"></h1>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-item-tab" data-toggle="pill" href="" role="tab" aria-controls="v-pills-item" aria-selected="true">Item</a>
                <a class="nav-link" id="v-pills-purchase-tab" data-toggle="pill" href="purchase.php" role="tab" aria-controls="v-pills-purchase" aria-selected="false">Purchase</a>
                <a class="nav-link" id="v-pills-vendor-tab" data-toggle="pill" href="#v-pills-vendor" role="tab" aria-controls="v-pills-vendor" aria-selected="false">Vendor</a>
                <a class="nav-link" id="v-pills-sale-tab" data-toggle="pill" href="sales.php" role="tab" aria-controls="v-pills-sale" aria-selected="false">Sale</a>
                <a class="nav-link" id="v-pills-customer-tab" data-toggle="pill" href="#v-pills-customer" role="tab" aria-controls="v-pills-customer" aria-selected="false">Customer</a>
                <a class="nav-link" id="v-pills-search-tab" data-toggle="pill" href="#v-pills-search" role="tab" aria-controls="v-pills-search" aria-selected="false">Search</a>
                <a class="nav-link" id="v-pills-reports-tab" data-toggle="pill" href="reports.php" role="tab" aria-controls="v-pills-reports" aria-selected="false">Reports</a>
            </div>
        </div>
        <div class="col-lg-10">
            <h3>My sales Report</h3>
        </div>
    </div>
</div>
<?php
require '../inc/footer.php';
?>
</body>
</html>
