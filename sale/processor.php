<?php
include '../connection.php';
if(isset($_POST['delete'])){
$id=$_POST['id'];
$delete="delete from sale where id = $id";
$deleterun=mysqli_query($conn,$delete);
if($delete){
session_start();
$_SESSION['status'] = "You have  cancelled the order successfully";
header("Location:index.php");
}

}