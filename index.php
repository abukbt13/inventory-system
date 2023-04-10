<?php
	session_start();
	include 'connection.php';
//	 Redirect the user to login page if he is not logged in.
	 if(!isset($_SESSION['loggedIn'])){
	 	header('Location: login.php');
	 	exit();
	 }
	 $user_id=$_SESSION['user_id'];
	require_once('header.php');
?>
  <body>
<div style="background: blue;" class="header d-flex justify-content-around align-content-center">
	<h2 class="text-white">Cereals Inventory system </h2>
	<h2 class="text-white"><?php if(isset($_SESSION['username'])){
		echo $_SESSION['username'];
		}?>| <a  style="font-size:22px;" href="logout.php" class="btn text-white">Logout</a></h2>
</div>
    <!-- Page Content -->
    <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-2">
		<h1 class="my-4"></h1>
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			  <a class="nav-link active" id="v-pills-item-tab" data-toggle="pill" href="" role="tab" aria-controls="v-pills-item" aria-selected="true">Home</a>
			  <a class="nav-link" id="v-pills-item-tab" data-toggle="pill" href="profile.php" role="tab" aria-controls="v-pills-item" aria-selected="true">Profile</a>
			  <a class="nav-link" id="v-pills-purchase-tab" data-toggle="pill" href="purchase/index.php" role="tab" aria-controls="v-pills-purchase" aria-selected="false">Purchase</a>
			  <a class="nav-link" id="v-pills-sale-tab" data-toggle="pill" href="sale/index.php" role="tab" aria-controls="v-pills-sale" aria-selected="false">Sale</a>
			  <a class="nav-link" id="v-pills-customer-tab" data-toggle="pill"  role="tab" aria-controls="v-pills-customer" aria-selected="false">Reports</a>
				<ul>
					<li style="list-style: none;">
						<a class="nav-link" id="v-pills-customer-tab" data-toggle="pill" href="#v-pills-customer" role="tab" aria-controls="v-pills-customer" aria-selected="false">My sales</a>
					</li>
					<li style="list-style: none;">
						<a class="nav-link" id="v-pills-customer-tab" data-toggle="pill" href="#v-pills-customer" role="tab" aria-controls="v-pills-customer" aria-selected="false">My purchases</a>
					</li>
				</ul>
			  <a class="nav-link" id="v-pills-search-tab" data-toggle="pill" href="feedback.php" role="tab" aria-controls="v-pills-search" aria-selected="false">Feedbacks</a>
			</div>
		</div>
		 <div style="display: grid; grid-template-columns: 1fr 1fr;align-items: center; justify-content: center;" class="col-lg-10">
			 <div  style="width: 28rem;margin-top: 1rem; border:1px solid grey;display: grid;justify-content: center;align-items: center;" class="mypurchases rounded-3">
				 <h2 class="text-primary text-decoration-underline p-2">My puchases</h2>
				 <p>Worth of My purchase this year</p>
				 <?php
				 $purchase="select * from purchase where user_id ='$user_id' and status =0";
				 $purchaserun=mysqli_query($conn,$purchase);
				 $number=mysqli_num_rows($purchaserun);
				 echo '<p>'.$number.'</p>';
				 ?>

			 </div>
			 <div  style="width: 28rem;margin-top: 1rem; border:1px solid grey;display: grid;justify-content: center;align-items: center;" class="mypurchases rounded-3">
				 <h2 class="text-primary text-decoration-underline p-2">My sales this year</h2>
				 <p>Worth of My sale this year</p>
				 <?php
				 $sale="select * from sale where user_id ='$user_id' and status =0";
				 $salerun=mysqli_query($conn,$sale);
				 $numbersale=mysqli_num_rows($salerun);
				 echo '<p>'.$numbersale.'</p>';
				 ?>
			 </div>

		 </div>
	  </div>
    </div>
<p>Footer here</p>


  </body>
</html>
