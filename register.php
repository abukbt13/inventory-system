<?php
// session_start();

// // Check if user is already logged in
// if(isset($_SESSION['loggedIn'])){
// 	header('Location: index.php');
// 	exit();
// }

// require_once('inc/config/constants.php');
// require_once('inc/config/db.php');
require_once('header.php');
?>
<body>

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



<p>footer here</p>
</body>
</html>
