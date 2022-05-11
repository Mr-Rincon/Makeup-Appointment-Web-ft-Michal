<?php
include 'services\connection.php';
include 'template\head.php';
$page = "profile";
include 'template\navbar.php';

if (!isset($_SESSION['valid']) || $_SESSION['valid'] != true || $_SESSION['type'] !== "user"){
    header('Location: login.php');
}else{
}
?>

<?php
$id = $_SESSION['user_id'];
$userFromDB = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `user` WHERE `user_id`='$id'"),MYSQLI_ASSOC);

foreach($userFromDB as $value):
?>
<div class="container">
    <div class="card mt-4">
        <div class="card-header"><img src="img/icons/person-fill.svg" width="18px" alt=""> Profile.
        </div>
            <div class="card-body">

                <form role = 'form'>

                <div class = 'form-group row'>
                <label class = 'col-lg-3 col-form-label form-control-label'>First name</label>
                <div class = 'col-lg-9'>
                <input class = 'form-control' type = 'text' placeholder = 'Name' value="<?php echo $value['name']; ?>" disabled>
                </div>
                </div>

                <div class = 'form-group row'>
                <label class = 'col-lg-3 col-form-label form-control-label'>Last name</label>
                <div class = 'col-lg-9'>
                <input class = 'form-control' type = 'text' placeholder = 'Surname' value="<?php echo $value['surname']; ?>" disabled>
                </div>
                </div>

                <div class = 'form-group row'>
                <label class = 'col-lg-3 col-form-label form-control-label'>Birthdate</label>
                <div class = 'col-lg-9'>
                <input class = 'form-control' type = 'date' placeholder = 'Name' value="<?php echo $value['birthdate']; ?>" disabled>
                </div>
                </div>

                <div class = 'form-group row'>
                <label class = 'col-lg-3 col-form-label form-control-label'>Phone</label>
                <div class = 'col-lg-9'>
                <input class = 'form-control' type = 'number' placeholder = '+44 123456789' value="<?php echo $value['phone']; ?>" disabled>
                </div>
                </div>

                <div class = 'form-group row'>
                <label class = 'col-lg-3 col-form-label form-control-label'>Email</label>
                <div class = 'col-lg-9'>
                <input class = 'form-control' type = 'email' placeholder = 'example@example.com' value="<?php echo $value['email']; ?>" disabled>
                </div>
                </div>

                <div class = 'form-group row'>
                <label class = 'col-lg-3 col-form-label form-control-label'>Password</label>
                <div class = 'col-lg-9'>
                <input class = 'form-control' type = 'password' placeholder = '* * * * * * * *' value="<?php echo $value['password']; ?>" disabled>
                </div>
                </div>

                </div>

                <div class = 'form-group row'>
                <label class = 'col-lg-3 col-form-label form-control-label'></label>
                <div class = 'col-lg-9'>
                    <a href="profile_edit.php" class="btn btn-warning">Edit</a>
                </div>
                </div>
                </form>

            </div>

        </div>

    </div>

</div>

<?php endforeach; ?>
<?php
include 'template\footer_scripts.php';
?>



<?php
include 'template\footer.php';
?>