
<?php
session_start();
//include('connection.php');
if(!isset($_SESSION['loggedIn'])) {
    session_start();
    $_SESSION['login'] = 'Login to view this page';
    header("location:login.php");
}

//$uid=$_SESSION['uid'];

if(isset($_SESSION['loggedIn'])){
    session_destroy();
    session_start();
    $_SESSION['login'] = 'You have logout of the system';
    header("location:login.php");
}
else{
    session_destroy();
    session_start();
    $_SESSION['login'] = 'You have logged out of the system succcessfully';
    header("location:login.php");
}


?>
