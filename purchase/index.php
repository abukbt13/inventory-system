<?php
session_start();
//	 Redirect the user to login page if he is not logged in.
if(!isset($_SESSION['loggedIn'])){
    header('Location: login.php');
    exit();
}
?>
<body>
<link rel="stylesheet" href="../CSS/style.css">
<!-- Page Content -->
<div class="container-fluid">
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
            <form>
                <div class="form-group">
                    <label for="name">Product type</label>
                    <select required id="type" class="form-control" id="type">
                        <option value="fertiliser">Fertilisers</option>
                        <option value="inserticides">Inserticides</option>
                        <option value="seeds">Seeds</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Product Name</label>
                    <select id="name" name="name" class="form-control"></select>
                </div>
                <div class="form-group">
                    <label for="address">Description</label>
                    <textarea class="form-control" required name="description" id="address" rows="3" placeholder="Enter your address"></textarea>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" required name="quantity" id="quantity" placeholder="Enter quantity">
                </div>

                <div class="form-group">
                    <label for="payment">Payment method</label>
                    <select class="form-control" id="payment">
                        <option>Credit card</option>
                        <option>Debit card</option>
                        <option>Cash</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
<p>Footer here</p>


<script>
    var ptype_select = document.getElementById("type");
    var name_select = document.getElementById("name");

    // Populate the districts select element when the region is changed
    type.addEventListener("change", function() {
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
                for (var i = 0; i < names.length; i++) {
                    var option = document.createElement("option");
                    option.value = names[i];
                    option.text = names[i];
                    name_select.appendChild(option);
                }
            }
        }
    });
</script>
</body>
</html>
