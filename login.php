<?php
// session_start();

// // Check if user is already logged in
// if(isset($_SESSION['loggedIn'])){
// 	header('Location: index.php');
// 	exit();
// }

// require_once('inc/config/constants.php')
require_once('header.php');
?>
<body>
<!-- Default Page Content (login form) -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-5 col-lg-5">
            <div class="card mb-4">
                <div class="card-header text-center">
                    Login
                </div>
                <div class="card-body">
                    <form action="processor.php" method="post">
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
                        <div class="form-group">
                            <label for="loginUsername">Email</label>
                            <input type="text" class="form-control" id="loginUsername" name="email">
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="login d-flex justify-content-between">
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
<p>footer here</p>
</body>
</html>