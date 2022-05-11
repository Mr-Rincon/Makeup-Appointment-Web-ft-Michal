<?php
include 'template\head.php';
$page = "";
include 'template\navbar.php';

if (isset($_SESSION['valid']) && $_SESSION['valid'] = true && $_SESSION['type'] == "user"){
    header('Location: index.php');
}else if(isset($_SESSION['valid']) && $_SESSION['valid'] = true && $_SESSION['type'] == "admin"){
    header('Location: admin.php');
}else{
}
?>

<div class="container">

    <main class="login-form mt-4">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header headerColor">Login</div>
                        <div class="card-body">

                            <?php
                            $msg = '';

                            if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {

                                $email = $_POST['username'];
                                $password = $_POST['password'];

                                $adminCheck = $connection ->query("SELECT * FROM `admin` WHERE email= '$email' ");

                                $counter = mysqli_num_rows($adminCheck);
                                
                                if($counter == 1){

                                    $row = $adminCheck -> fetch_assoc();

                                    if($row['password'] != $password){
                                            $msg = "Incorrect Password!";
                                    }else{
                                        $_SESSION['valid'] = true;
                                        $_SESSION['type'] = "admin";
                                        header('Location: admin.php');
                                    }

                                }else {

                                $sel = $connection->query("SELECT * FROM user WHERE email= '$email' ");

                                $counter = mysqli_num_rows($sel);

                                    if ($counter == 0) {
                                        $msg = "Email doesn't exist!";
                                    } else {

                                        $fila = $sel->fetch_assoc();

                                        if ($fila['password'] != $password) {
                                            $msg = "Incorrect Password!";
                                        } else {
                                            $_SESSION['valid'] = true;
                                            $_SESSION['type'] = "user";
                                            $_SESSION['user_id'] = $fila['user_id'];
                                            header('Location: index.php');
                                        }
                                    }
                                }

                            } else if (isset($_POST['login']) && empty($_POST['username'])) {
                                $msg = "Email field is empty!";
                            } else if (isset($_POST['login']) && empty($_POST['password'])) {
                                $msg = "Password field is empty!";
                            } else {
                            }
                            ?>

                            <h4 class="form-signin-heading"><?php echo $msg; ?></h4>

                            <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="username" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10 text-right ">
                                    <button type="submit" class="btn btn-warning" name="login">
                                        Login
                                    </button><br>

                                    <a href="#" class="btn btn-link pr-0">
                                        Forgot Your Password?
                                    </a>
                                </div>
                        </div>
                        </form>

                        <?php if (isset($_SESSION['valid']) && $_SESSION['valid'] = true) : ?>
                            <p class=""><a href="logout.php">Logout</a></p>
                        <?php else : ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
</div>

</main>

</div>

<?php
include 'template\footer_scripts.php';
?>

<?php
include 'template\footer.php';
?>