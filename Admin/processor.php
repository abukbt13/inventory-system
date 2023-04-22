<?php
include '../connection.php';
if(isset($_POST['accept'])){
    $id=$_POST['id'];
    $accept="update purchase set status=1 where id=$id";
    $acceptrun=mysqli_query($conn,$accept);
        if($acceptrun){
            session_start();
            $_SESSION['status'] = "You have accepted the order successfully";
            header("Location:purchase.php");
        }
}
if(isset($_POST['decline'])){
    $id=$_POST['id'];
    $accept="update purchase set status=2 where id=$id";
    $acceptrun=mysqli_query($conn,$accept);
        if($acceptrun){
            session_start();
            $_SESSION['status'] = "You have declined the order";
            header("Location:purchase.php");
        }
}
if(isset($_POST['acceptsale'])){
    $id=$_POST['id'];
    $accept="update sale set status=1 where id=$id";
    $acceptrun=mysqli_query($conn,$accept);
        if($acceptrun){
            session_start();
            $_SESSION['status'] = "You have accepted the sale order successfully";
            header("Location:sale.php");
        }
}
if(isset($_POST['declinesale'])){
    $id=$_POST['id'];
    $accept="update sale set status=2 where id=$id";
    $acceptrun=mysqli_query($conn,$accept);
        if($acceptrun){
            session_start();
            $_SESSION['status'] = "You have declined the sale order";
            header("Location:sale.php");
        }
}