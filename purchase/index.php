<?php
session_start();
include  '../connection.php';
//	 Redirect the user to login page if he is not logged in.
if(!isset($_SESSION['loggedIn'])){
    header('Location: login.php');
    exit();
}
$user_id=$_SESSION['user_id'];
if(isset($_POST['confirm_purchase'])){
    $type=$_POST['type'];
    $name=$_POST['name'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $totalprice=$price*$quantity;

    $buy="insert into purchase (type,name,quantity,price,totalprice,user_id) values ('$type','$name','$quantity','$price','$totalprice','$user_id')";
    $buyrun=mysqli_query($conn,$buy);
    if($buyrun){
//        session_start();
        $_SESSION['status'] = "You have ordered  it successfully";
        header("Location:index.php");
    }
}

?>
<body>
<link rel="stylesheet" href="../CSS/style.css">
<!-- Page Content -->
<div style="background: blue;" class="header d-flex justify-content-around align-content-center">
    <h2 class="text-white">Cereals Inventory system </h2>
    <h2 class="text-white"><?php if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
        }?>| <a  style="font-size:22px;" href="../logout.php" class="btn text-white">Logout</a></h2>
</div>
<style>
    .purchase{
        display: none;
        position: absolute;
        top: 7rem;
        left: 27rem;
        z-index: 1;
        background: #565e64;
        border: 1px solid beige;padding: 2rem; width: 27rem;
    }
    .active{
        display: block;
    }
</style>
<div class="container-fluid">
    <?php
    if(isset($_SESSION['status'])){
        ?>
        <div>
            <div style="z-index: 1;" class="bg-danger">
                <p class="bg-danger p-2 text-uppercase"><?php echo $_SESSION['status'] ?></p>
            </div>
        </div>
        <?php
        unset($_SESSION['status']);
    }
    ?>
    <div class="row">
        <div  style="background: #ff9ff3;height: 100vh;" class="col-lg-2">
            <h1 class="my-4"></h1>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-item-tab" data-toggle="pill" href="../index.php" role="tab" aria-controls="v-pills-item" aria-selected="true">Home</a>
                <a class="nav-link" id="v-pills-item-tab" data-toggle="pill" href="../profile.php" role="tab" aria-controls="v-pills-item" aria-selected="true">Profile</a>
                <a class="nav-link active" id="v-pills-purchase-tab" data-toggle="pill" href="index.php" role="tab" aria-controls="v-pills-purchase" aria-selected="false">Purchase</a>
                <a class="nav-link" id="v-pills-sale-tab" data-toggle="pill" href="../sale/index.php" role="tab" aria-controls="v-pills-sale" aria-selected="false">Sale</a>
                <a class="nav-link" id="v-pills-customer-tab" data-toggle="pill"  role="tab" aria-controls="v-pills-customer" aria-selected="false">Reports</a>
                <ul>
                    <li style="list-style: none;">
                        <span class="">   <a href="../farmer/purchasereport.php" >Purchase reports</a></span><br><br>
                    </li>
                    <li style="list-style: none;">
                        <span class="">   <a href="../farmer/salesreport.php" >Sales report</a></span><br><br>
                    </li>
                </ul>
                <a class="nav-link" id="v-pills-search-tab" data-toggle="pill" href="../feedback.php" role="tab" aria-controls="v-pills-search" aria-selected="false">Feedbacks</a>
            </div>
        </div>
        <div  class="col-lg-10">
            <div style="min-height:27rem; max-height:27rem; overflow: scroll;" class="contents">
                <div style="position: relative;" class="navigate  d-flex  bg-danger-subtle p-2  justify-content-between">
                    <h2>My purchases</h2>
                    <button id="purchase" class="btn btn-primary">Make a purchase</button>
                </div>
                <table style="border: solid 1px red;" class="">
           <thead>
                    <tr style="border: 1px solid red;">
                        <th style="border: 1px solid red;">Type</th>
                        <th style="border: 1px solid red;">Name</th>
                        <th style="border: 1px solid red;">Quantity</th>
                        <th style="border: 1px solid red;">price</th>
                        <th style="border: 1px solid red;">Total Price</th>
                        <th style="border: 1px solid red;">Status</th>
                        <th style="border: 1px solid red;">Payment Status</th>
                        <th rowspan="2" style="border: 1px solid red;">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $orders="select * from purchase where user_id ='$user_id'";
                    $ordersrun=mysqli_query($conn,$orders);
                    while($rows=mysqli_fetch_assoc($ordersrun)){
                        ?>
                        <tr style="border: 1px solid red;">
                            <td style="border: 1px solid red;"><?php echo $rows['type']?></td>
                            <td style="border: 1px solid red;"><?php echo $rows['name']?></td>
                            <td style="border: 1px solid red;"><?php echo $rows['quantity']?></td>
                            <td style="border: 1px solid red;"><?php echo $rows['price']?></td>
                            <td style="border: 1px solid red;"><?php echo $rows['totalprice']?></td>
                            <td style="border: 1px solid red;"><?php  if($rows['status']=='0'){
                                        echo 'Not Processed';
                                    }
                                    else if ($rows['status']=='1'){
                                        echo 'Processed';
                                    }
                                    else{
                                        echo 'Cancelled';
                                    }?></td>
                            <td style="border: 1px solid red;"><button class="btn btn-success">Paid</button></td>
                            <td colspan="" style="border: 1px solid red; margin-top: 1rem;padding-top:0.5rem ">
                                <form action="processor.php" method="post">
                                    <input type="number" hidden="" name="id" value="<?php echo $rows['id']?>">
                                    <?php if($rows['status']=='0'){
                                        echo ' <button type="submit" name="delete" class="btn  btn-danger">Cancel Order</button>';
                                    }
                                    else if ($rows['status']=='1'){
                                        echo 'Processed';
                                    }
                                    else{
                                         if($rows['status']=='2'){
                                            echo ' <button type="submit" name="delete" class="btn  btn-danger">Cancel Order</button>';
                                        }
                                    }
                                    ?>

                                </form>

                                </form>
                            </td>
                            <td><button class="btn btn-success">View</button></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>


            </div>
            <div  class="purchase" id="purchase_form">
                <div class="float-end" id="close"><button class="btn btn-danger">Close</button></div>
                <form method="post" action="index.php">
                    <div class="form-group">
                        <label for="name">Product type</label>
                        <select required id="type" class="form-control" name="type">
                            <option value="">--select type--</option>
                            <option value="fertilisers">Fertilisers</option>
                            <option value="inserticides">Inserticides</option>
                            <option value="seeds">Seeds</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <select id="name" name="name" class="form-control">

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Selling price each</label>
                        <input type="number" name="sellprice" id="sellprice">
                        <input type="number" hidden="" name="price" id="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number"  class="form-control" required name="quantity" id="quantity" placeholder="Enter quantity">
                    </div>

                    <button type="submit" name="confirm_purchase" class="btn my-4 p-2 w-50 btn-primary">Confirm Purchase </button>
                </form>

            </div>

        </div>
    </div>
</div>


<script>
    const purchase=document.getElementById('purchase')
    const purchase_form=document.getElementById('purchase_form')
    const close=document.getElementById('close')
    purchase.addEventListener('click',()=>{
        purchase_form.classList.toggle('active');
    })
    close.addEventListener('click',()=>{
        purchase_form.style.display = 'none';
    })


    var ptype_select = document.getElementById("type");
    var name_select = document.getElementById("name");


    // Populate the districts select element when the region is changed
    ptype_select.addEventListener("change", function() {
        var type= ptype_select.value;

        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Set up the Ajax request
        xhr.open("POST", "../backend/fertilisers.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Send the Ajax request with the selected region value
        xhr.send("type=" + type);

        // Handle the Ajax response
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                var names = JSON.parse(xhr.responseText);

                // Clear the districts select element and add the new options
                name_select.innerHTML = "";

                // Add a null/empty option as the first option
                var emptyOption = document.createElement("option");
                emptyOption.value = "";
                emptyOption.text = "--Select product name--";
                name_select.appendChild(emptyOption);

                for (var i = 0; i < names.length; i++) {
                    var option = document.createElement("option");
                    option.value = names[i];
                    option.text = names[i];
                    name_select.appendChild(option);
                }
            }
        }
    });
    var price = document.getElementById("price");
    var sellprice = document.getElementById("sellprice");
    name_select.addEventListener("change", function() {
        var name= name_select.value;

        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Set up the Ajax request
        xhr.open("POST", "../backend/price.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Send the Ajax request with the selected region value
        xhr.send("description=" + name);

        // Handle the Ajax response
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                price.value = JSON.parse(xhr.responseText);
                sellprice.value = JSON.parse(xhr.responseText);
            }
        }
    });



</script>
<div style="background: blue; position: fixed;bottom: 0px; width: 100%;" >
    <div style="display: grid;justify-content: center; align-items: center;" class="my-1">
        <h2 class="text-white">Send feedback|inquiries</h2>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Write to us" aria-label="Search">
            <button class="btn btn-outline-info" type="submit">Search</button>
        </form>
    </div>

    <div class="header d-flex justify-content-around align-content-center pt-0">
        <p style="color: white; font-size: 23px;">Copyrights &copf; inventory system 2023</p>
    </div>
</div>
</body>
</html>
