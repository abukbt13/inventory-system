<?php
session_start();
include  '../connection.php';
//	 Redirect the user to login page if he is not logged in.
if(!isset($_SESSION['loggedIn'])){
    header('Location: login.php');
    exit();
}
$user_id=$_SESSION['user_id'];
if(isset($_POST['confirm_sell'])){
    $type=$_POST['type'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $total=$price* $quantity;
    $buy="insert into sale (type,quantity,price,description,user_id,total) values ('$type','$quantity','$price','$description','$user_id','$total')";
    $buyrun=mysqli_query($conn,$buy);
    if($buyrun){
        session_start();
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
        <div style="background: #ff9ff3;height: 100vh;" class="col-lg-2">
            <h1 class="my-4"></h1>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-item-tab" data-toggle="pill" href="../index.php" role="tab" aria-controls="v-pills-item" aria-selected="true">Home</a>
                <a class="nav-link" id="v-pills-item-tab" data-toggle="pill" href="../profile.php" role="tab" aria-controls="v-pills-item" aria-selected="true">Profile</a>
                <a class="nav-link" id="v-pills-purchase-tab" data-toggle="pill" href="../purchase/index.php" role="tab" aria-controls="v-pills-purchase" aria-selected="false">Purchase</a>
                <a class="nav-link active" id="v-pills-sale-tab" data-toggle="pill" href="index.php" role="tab" aria-controls="v-pills-sale" aria-selected="false">Sale</a>
                <a class="nav-link" id="v-pills-customer-tab" data-toggle="pill"  role="tab" aria-controls="v-pills-customer" aria-selected="false">Reports</a>
                <ul>
                    <ul>
                        <li style="list-style: none;">
                            <span class="">   <a href="../farmer/purchasereport.php" >Purchase reports</a></span><br><br>
                        </li>
                        <li style="list-style: none;">
                            <span class="">   <a href="../farmer/salesreport.php" >Sales report</a></span><br><br>
                        </li>
                    </ul>
                </ul>
                <a class="nav-link" id="v-pills-search-tab" data-toggle="pill" href="../feedback.php" role="tab" aria-controls="v-pills-search" aria-selected="false">Feedbacks</a>
            </div>
        </div>
        <div class="col-lg-10">
            <table class="table m-2 w-100  px-1 table-responsive-sm table-primary table-hover table-bordered">
                <div class="navigate  d-flex  bg-danger-subtle p-2  justify-content-between">
                    <h2>My purchases</h2>
                    <button id="purchase" class="btn btn-primary">Request Sale</button>
                </div>
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>price</th>
                    <th> Description</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $orders="select * from sale where user_id ='$user_id'";
                $ordersrun=mysqli_query($conn,$orders);
                while($rows=mysqli_fetch_assoc($ordersrun)){
                    ?>
                    <tr>
                        <td><?php echo $rows['type']?></td>
                        <td><?php echo $rows['quantity']?></td>
                        <td><?php echo $rows['price']?></td>
                        <td><?php echo $rows['description']?></td>
                        <td><form action="processor.php" method="post">
                                <input type="number" hidden="" name="id" value="<?php echo $rows['id']?>">
                                <?php if($rows['status']=='0'){
                                    echo ' <button type="submit" name="deletesaleorder" class="btn  btn-danger">Cancel Order</button>';
                                }
                                else if ($rows['status']=='1'){
                                    echo 'Processed';
                                }
                                else{
                                    echo 'Cancelled';
                                }
                                ?>

                            </form>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <div  class="purchase" id="purchase_form">
                <div class="float-end" id="close"><button class="btn btn-danger">Close</button></div>
                <form method="post" action="index.php">
                    <div class="form-group">
                        <label for="name">Product type</label>
                        <select required id="type" class="form-control" name="type">
                            <option value="">--select product typ--</option>
                            <?php
                            $types="select * from sales_description";
                            $typesrun=mysqli_query($conn,$types);
                             while ($row = mysqli_fetch_assoc($typesrun)){
                                 ?>
                                 <option value="<?php echo $row['name'];?>">
                                     <?php echo $row['name'];?>
                                 </option>
                                 <?php
                             }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Buying price</label>
                        <input type="number" name="price" class="form-control" id="price">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" required name="quantity" id="quantity" placeholder="Enter quantity">
                    </div>

                    <div class="form-group">
                        <label for="payment">Description</label>
                            <textarea name="description" required id="" cols="30" rows="8"></textarea>
                    </div>

                    <button type="submit" name="confirm_sell" class="btn my-4 p-2 w-50 btn-primary">Confirm Purchase </button>
                </form>

            </div>

        </div>
    </div>
</div>
<div style="background: blue; position: fixed;bottom: 0px; width: 100%;" class="header d-flex justify-content-around align-content-center pt-3">
    <p style="color: white; font-size: 23px;">Copyrights &copf; inventory system 2023</p>
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


    const ptype_select=document.getElementById('type')
    var price=document.getElementById('price')

    ptype_select.addEventListener("change", function() {
        var type= ptype_select.value;
        var xhr = new XMLHttpRequest();

        // Set up the Ajax request
        xhr.open("POST", "../backend/sales.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Send the Ajax request with the selected region value
        xhr.send("price=" + type);

        // Handle the Ajax response
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                price.value = JSON.parse(xhr.responseText);
                // sellprice.value = JSON.parse(xhr.responseText);
            }
        }
      // alert('Please select')
    })





</script>

</body>
</html>
