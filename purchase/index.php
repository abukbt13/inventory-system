<?php
session_start();
include  '../connection.php';
//	 Redirect the user to login page if he is not logged in.
if(!isset($_SESSION['loggedIn'])){
    header('Location: login.php');
    exit();
}
if(isset($_POST['confirm_purchase'])){
    $type=$_POST['type'];
    $name=$_POST['name'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $payment=$_POST['payment'];
    $totalprice=$_POST['totalprice'];
    $buy="insert into purchase (type,name,quantity,price,payment,totalprice,user_id) values ('$type','$name','$quantity','$price','$payment','$totalprice',1)";
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
<div class="container-fluid">
    <?php
    if(isset($_SESSION['status'])){
        ?>
        <div>
            <div class="bg-danger">
                <p class="bg-danger p-2 text-uppercase"><?php echo $_SESSION['status'] ?></p>
            </div>
        </div>
        <?php
        unset($_SESSION['status']);
    }
    ?>
    <div class="row">
        <div class="col-lg-2">
            <h1 class="my-4"></h1>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-item-tab" data-toggle="pill" href="../index.php" role="tab" aria-controls="v-pills-item" aria-selected="true">Home</a>
                <a class="nav-link" id="v-pills-item-tab" data-toggle="pill" href="../profile.php" role="tab" aria-controls="v-pills-item" aria-selected="true">Profile</a>
                <a class="nav-link active" id="v-pills-purchase-tab" data-toggle="pill" href="index.php" role="tab" aria-controls="v-pills-purchase" aria-selected="false">Purchase</a>
                <a class="nav-link" id="v-pills-sale-tab" data-toggle="pill" href="../sale/index.php" role="tab" aria-controls="v-pills-sale" aria-selected="false">Sale</a>
                <a class="nav-link" id="v-pills-customer-tab" data-toggle="pill"  role="tab" aria-controls="v-pills-customer" aria-selected="false">Reports</a>
                <ul>
                    <li style="list-style: none;">
                        <a class="nav-link" id="v-pills-customer-tab" data-toggle="pill" href="#v-pills-customer" role="tab" aria-controls="v-pills-customer" aria-selected="false">My sales</a>
                    </li>
                    <li style="list-style: none;">
                        <a class="nav-link" id="v-pills-customer-tab" data-toggle="pill" href="#v-pills-customer" role="tab" aria-controls="v-pills-customer" aria-selected="false">My purchases</a>
                    </li>
                </ul>
                <a class="nav-link" id="v-pills-search-tab" data-toggle="pill" href="../feedback.php" role="tab" aria-controls="v-pills-search" aria-selected="false">Feedbacks</a>
            </div>
        </div>
        <div class="col-lg-10">
            <table class="table m-2 w-100  px-1 table-responsive-sm table-primary table-hover table-bordered">
                <thead>
                <tr><td class="text-center text-uppercase" colspan="6">My Purchases</td></tr>
                <tr>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>price</th>
                    <th>Total Price</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $orders="select * from purchase";
                $ordersrun=mysqli_query($conn,$orders);
                while($rows=mysqli_fetch_assoc($ordersrun)){
                    ?>
                    <tr>
                        <td><?php echo $rows['type']?></td>
                        <td><?php echo $rows['name']?></td>
                        <td><?php echo $rows['quantity']?></td>
                        <td><?php echo $rows['price']?></td>
                        <td><?php echo $rows['totalprice']?></td>
                        <td>
                            <form action="cleastudentprocessor.php" method="post">

                                <button type="submit" class="btn btn-success" name="clearstudent">Pending</button>


                            </form>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

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
                    <select id="name" name="name" class="form-control"></select>
                </div>



                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" onchange="myFunc()" class="form-control" required name="quantity" id="quantity" placeholder="Enter quantity">
                </div>

                <div class="form-group">
                    <label for="quantity">Price per Bag 6000</label>
                    <input type="number" hidden="" class="form-control"  name="price" id="price" value="6000" placeholder="Enter quantity">
                </div>

                <div class="form-group">
                    <label for="payment">Payment method</label>
                    <select class="form-control" id="payment" name="payment">
                        <option>Credit card</option>
                        <option>Debit card</option>
                        <option>Cash</option>
                    </select>
                </div>
                <p>Total Amount <input type="text" style="display: block;" name="totalprice" id="totalprice" val=""></p>
                <button type="submit" name="confirm_purchase" class="btn my-4 p-2 w-50 btn-primary">Confirm Purchase </button>
            </form>

        </div>
    </div>
</div>
<p>Footer here</p>


<script>

    var quantity=document.getElementById('quantity');
    var price=document.getElementById('price');
    var totalprice=document.getElementById('totalprice');


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


function myFunc(){
    // totalprice.style.display="block"
    quantity=quantity.value;
    price=price.value;
    totalprice.value = price*quantity
}

</script>
</body>
</html>
