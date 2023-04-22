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
		<?php
		if(isset($_SESSION['error'])){
			?>

					<p style="font-size: 28px;" class="text-center bg-white text-danger"><?php echo $_SESSION['error'] ?></p>




			<?php
			unset($_SESSION['error']);
		}
		?>
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
						<span class="">   <a href="farmer/purchasereport.php" >Purchase reports</a></span><br><br>
					</li>
					<li style="list-style: none;">
						<span class="">   <a href="farmer/salesreport.php" >Sales report</a></span><br><br>
					</li>
				</ul>
			  <a class="nav-link" id="v-pills-search-tab" data-toggle="pill" href="feedback.php" role="tab" aria-controls="v-pills-search" aria-selected="false">Feedbacks</a>
			</div>
		</div>
		 <div style="display: grid; grid-template-columns: 1fr 1fr;align-items: center; justify-content: center;" class="col-lg-10">

			 <div  style="width: 28rem;margin-top: 1rem; border:1px solid grey;display: grid;justify-content: center;align-items: center;" class="mypurchases rounded-3">
				 <h2 class="text-primary text-decoration-underline p-2">Unprocessed puchases</h2>
				 <?php
				 $purchase="select * from purchase where user_id ='$user_id' and status =0";
				 $purchaserun=mysqli_query($conn,$purchase);
				 $number=mysqli_num_rows($purchaserun);
				 echo '<p class="text-center">'.$number.'</p>';

				 ?>

			 </div>
			 <div  style="width: 28rem;margin-top: 1rem; border:1px solid grey;display: grid;justify-content: center;align-items: center;" class="mypurchases rounded-3">
				 <h2 class="text-primary text-decoration-underline p-2">Unprocessed orders </h2>
				 <?php
				 $sale="select * from sale where user_id ='$user_id' and status =0";
				 $salerun=mysqli_query($conn,$sale);
				 $numbersale=mysqli_num_rows($salerun);
				 if($numbersale==0){
					 echo "<p class='text-center'>It seems you have not done any transaction or all your sales orders have been processed</p>";
				 }
				 echo '<p class="text-center">'.$numbersale.'</p>';
				 ?>
			 </div>

		 </div>
	  </div>
    </div>

<div style="background: blue; position: fixed;bottom: 0px; width: 100%;" class="header d-flex justify-content-around align-content-center pt-3">
<p style="color: white; font-size: 23px;">Copyrights &copf; inventory system 2023</p>
</div>


  </body>
</html>
