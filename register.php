<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php include 'header.php';?>
<div style="background: blue;" class="header d-flex justify-content-around align-content-center">
    <h2 class="text-white">Cereals Inventory system </h2>
    <h2 class="text-white"><?php if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
        }?>| <a  style="font-size:22px;" href="logout.php" class="btn text-white">Logout</a></h2>
</div>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-5 col-lg-5">

            <div class="card mb-3">
                <div class="card-header text-center">
                    Register
                </div>
                <div class="card-body">
                    <div>
                        <?php
                        session_start();
                        if(isset($_SESSION['status'])){
                            ?>
                            <div>
                                <p class="text-white bg-danger btn-danger p-2"><?php echo $_SESSION['status']; ?> ?</p>
                            </div>
                            <?php
                            unset($_SESSION['status']);
                        }
                        ?>
                    </div>
                    <form action="processor.php" method="post">
                        <div id="registerMessage"></div>
                        <div class="form-group">
                            <label for="registerFullName">Enter Full name<span class="requiredIcon">*</span></label>
                            <input type="text" class="form-control" name="fullName">
                            <!-- <small id="emailHelp" class="form-text text-muted"></small> -->
                        </div>
                        <div class="form-group">
                            <label for="registerUsername">Email<span class="requiredIcon">*</span></label>
                            <input type="email" class="form-control" name="email" autocomplete="on">
                        </div>
                        <div class="form-group">
                            <label for="registerPassword1">Password<span class="requiredIcon">*</span></label>
                            <input type="password" class="form-control"  name="password1">
                        </div>
                        <div class="form-group">
                            <label for="registerPassword2">Re-enter password<span class="requiredIcon">*</span></label>
                            <input type="password" class="form-control"  name="password2">
                        </div>
                        <div class="login d-flex justify-content-between">
                            <button type="submit" name="register" id="login" class="btn btn-primary w-25">Register</button>
                            <button type="reset" class="btn">Clear</button>
                        </div>
                        <br>
                        <p style="font-size: 22px;">Have an account <a href="login.php">login here</a></p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="background: blue; position: fixed;bottom: 0px; width: 100%;" class="header d-flex justify-content-around align-content-center pt-3">

    <p style="color: white; font-size: 23px;">Copyrights &copf; inventory system 2023</p>
</div>
</body>
</html>



