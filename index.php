<?php
	session_start();
//	 Redirect the user to login page if he is not logged in.
	 if(!isset($_SESSION['loggedIn'])){
	 	header('Location: login.php');
	 	exit();
	 }
	require_once('header.php');
?>
  <body>

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
		 <div class="col-lg-10">
			 <h4>Here are visually interpretation for easily making judgement </h4>
		 </div>
	  </div>
    </div>
<p>Footer here</p>


  </body>
</html>
