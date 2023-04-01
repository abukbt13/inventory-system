<?php
// session_start();

// // Check if user is already logged in
// if(isset($_SESSION['loggedIn'])){
// 	header('Location: index.php');
// 	exit();
// }

// require_once('inc/config/constants.php');
require_once('inc/config/db.php');
require_once('inc/header.html');
?>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-5 col-lg-5">
            <div class="card">
                <div class="card-header">
                    Reset Password
                </div>
                <div class="card-body">
                    <form action="">
                        <div id="resetPasswordMessage"></div>
                        <div class="form-group">
                            <label for="resetPasswordUsername">Username</label>
                            <input type="text" class="form-control" id="resetPasswordUsername" name="resetPasswordUsername">
                        </div>
                        <div class="form-group">
                            <label for="resetPasswordPassword1">New Password</label>
                            <input type="password" class="form-control" id="resetPasswordPassword1" name="resetPasswordPassword1">
                        </div>
                        <div class="form-group">
                            <label for="resetPasswordPassword2">Confirm New Password</label>
                            <input type="password" class="form-control" id="resetPasswordPassword2" name="resetPasswordPassword2">
                        </div>
                        <a href="login.php" class="btn btn-primary">Login</a>
                        <a href="login.php?action=register" class="btn btn-success">Register</a>
                        <button type="button" id="resetPasswordButton" class="btn btn-warning">Reset Password</button>
                        <button type="reset" class="btn">Clear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require 'inc/footer.php';
?>
</body>
</html>