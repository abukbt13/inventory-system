<?php

include '../inc/config/db.php';
//require 'vendor/autoload.php';
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;


if(isset($_POST['purchase'])){
    session_start();
    $user_id=$_SESSION['user_id'];
    $type=$_POST['type'];
    $producer_name=$_POST['producer_name'];
    $description=$_POST['description'];
    $quantity=$_POST['quantity'];
    $save = "insert into purchase(type,producer_name,description,quantity,user_id) values('$type','$producer_name','$description','$quantity','$user_id')";
    $res = mysqli_query($conn, $save);
    if ($res) {
        session_start();
        $_SESSION['purchase'] = 'Your request is being processed we will send you feedback soon';
        header("location:../index.php");
    }
}
if(isset($_POST['sale'])){
    session_start();
    $user_id=$_SESSION['user_id'];
    $type=$_POST['type'];
    $quantity=$_POST['quantity'];
    $save = "insert into sale(type,quantity,user_id) values('$type','$quantity','$user_id')";
    $res = mysqli_query($conn, $save);
    if ($res) {
        session_start();
        $_SESSION['purchase'] = 'Your request is being processed we will send you feedback soon';
        header("location:../index.php");
    }
}
