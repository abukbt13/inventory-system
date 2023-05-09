<?php
session_start();
require_once('header.php');
?>
<body>
<div style="background: blue;" class="header d-flex justify-content-around align-content-center">
    <h2 class="text-white">Cereals Inventory system </h2>
    <h2 class="text-white"><?php if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
        }?>| <a  style="font-size:22px;" href="logout.php" class="btn text-white">Logout</a></h2>
</div>
<!-- Default Page Content (login form) -->
<div class="container">
    <div class="row d-flex align-content-center justify-content-center">
        <div class="col-sm-12 col-md-5 col-lg-5">
            <div class="card mb-4 mt-4">
                <div class="card-header text-center">
                    Login
                </div>
                <div class="card-body">
                    <form action="processor.php" method="post">
                        <div>
                            <?php
//                            session_start();
                            if(isset($_SESSION['status'])){
                                ?>
                                <div>
                                    <p class="text-white bg-danger btn-danger p-2"><?php echo $_SESSION['status']; ?> ?</p>
                                </div>
                                <?php
                                unset($_SESSION['status']);
                            }
                            if(isset($_SESSION['error'])){
                                ?>
                                <div>
                                    <p class="text-white bg-danger btn-danger p-2"><?php echo $_SESSION['error']; ?> ?</p>
                                </div>
                                <?php
                                unset($_SESSION['error']);
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="loginUsername">Email</label>
                            <input type="text" class="form-control" id="loginUsername" name="email">
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="login d-flex justify-content-between my-3">
                            <button type="submit" name="login" class="btn btn-primary w-25">Login</button>
                            <button type="reset" class="btn">Clear</button>
                        </div>
                        <br>
                            <p style="font-size: 22px;">Don't have an account <a href="register.php">Register here</a></p>

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