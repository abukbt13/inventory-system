<?php
session_start();
//	 Redirect the user to login page if he is not logged in.
if(!isset($_SESSION['loggedIn'])){
    header('Location: login.php');
    exit();
}
include "connection.php";
$user_id=$_SESSION['user_id'];
$user="select * from users where id='$user_id'";
$user_run=mysqli_query($conn,$user);
$num=mysqli_num_rows($user_run);
//echo $num;

$users=mysqli_fetch_all($user_run,MYSQLI_ASSOC);
foreach ($users as $user){
    $username=$user["username"];
    $phone=$user["phone"];
    $location=$user["location"];
    $profile_image=$user["profile_image"];
}

if(isset($_POST['update_profile'])) {

    $newusername = $_POST['username'];
    $newphone = $_POST['phone'];
    $location = $_POST['location'];

    $initialpicture = $_POST['image'];


    $profile = $_FILES['profile']['name'];
    $profiletmp = $_FILES['profile']['tmp_name'];
    $profile_new_name = rand() . $profile;

    $path="profiles/";
    $fullpath=$path.$initialpicture;


    if(empty($profile)){

        $update = "update users set  username='$newusername',phone='$newphone',location='$location' where id='$user_id'";
        $update_run = mysqli_query($conn, $update);
        if ($update_run) {
            session_start();
            $_SESSION['status'] = 'Profile details updated successfully';
            header('Location:profile.php');
            die();
        }
    }
    else{


        $update = "update users set profile_image='$profile_new_name', username='$newusername',phone='$newphone' where id='$user_id'";
        $update_run = mysqli_query($conn, $update);
        if ($update_run){
            session_start();
            move_uploaded_file($profiletmp,"profiles/".  $profile_new_name);
            unlink($fullpath);

            $_SESSION['status'] = "Profile Updated";
            header("Location:profile.php");
        }

    }

}
require_once('header.php');
?>
<body>

<!-- Page Content -->
<div style="background: blue;" class="header d-flex justify-content-around align-content-center">
    <h2 class="text-white">Cereals Inventory system </h2>
    <h2 class="text-white"><?php if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
        }?>| <a  style="font-size:22px;" href="logout.php" class="btn text-white">Logout</a></h2>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">
            <h1 class="my-4"></h1>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-item-tab" data-toggle="pill" href="index.php" role="tab" aria-controls="v-pills-item" aria-selected="true">Home</a>
                <a class="nav-link active" id="v-pills-item-tab" data-toggle="pill" href="profile.php" role="tab" aria-controls="v-pills-item" aria-selected="true">Profile</a>
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
            <form  action="profile.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="image" hidden="" value="<?php echo $profile_image; ?>">
                </div>
                <div class="form-group">
                    <h2 style="text-align: center;">Edit profile Info</h2>
                    <div class="" style="display: flex;align-items: center;justify-content: center;">
                        <img style="border-radius: 50%;" src="profiles/<?php echo $profile_image; ?>" alt="profiles pic" width="100" height="100">
                    </div>
                    <div class="form-group d-flex align-items-center flex-column m-2">
                        <p>Change profile pic</p>
                        <input class="inputs" class="form-control" type="file" name="profile">
                    </div>

                    <div class="form-group d-flex align-items-center flex-column m-2">
                        <p>User Name</p>
                        <input class="inputs"  type="text" name="username" value="<?php echo $username; ?>">

                    </div>
                    <div class="form-group d-flex align-items-center flex-column m-2">
                        <p style="text-align: center; font-size: 17px;text-transform: uppercase;">Phone Number</p>
                        <input  class="inputs"  type="number" required name="phone" value="<?php echo $phone; ?>"><br>
                    </div>
                    <div class="form-group d-flex align-items-center flex-column m-2">
                        <p style="text-align: center; font-size: 17px;text-transform: uppercase;">Location</p>
                        <input  class="inputs"  type="text" required name="location" value="<?php echo $location; ?>"><br>
                    </div>
                    <div class="form-group d-flex align-items-center flex-column m-2">
                        <button type="submit"  class="btn btn-success"  name="update_profile" >Update profile</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<p>Footer here</p>
</body>
</html>
