<?php
include 'services\connection.php';
include 'template\head.php';

if (!isset($_SESSION['valid']) && $_SESSION['type'] != "admin"){
    header('Location: login.php');
}
?>

<div class="container d-flex justify-content-center">

	<div class="mt-5 border p-5">

        <h2 class="col-12 mb-5">Create Appointment</h2>

        <?php
            $serviceFromDB = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `service`"),MYSQLI_ASSOC);
            $usersFromDB = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `user`"),MYSQLI_ASSOC);
        ?>

        <form action="process.php" method="post">

            <div class="form-group row mt-4">
                <div class="col-6">
                <label for="user">User</label>
                </div>

                <div class="col-6">
                <select  name="user"> 
                    <?php foreach($usersFromDB as $uservalue): ?>
                        <option value="<?php echo $uservalue['user_id']; ?>"><?php echo $uservalue['name'] . " " . $uservalue['surname']; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>

            <div class="form-group row mt-4">
                <div class="col-6">
                <label for="service">Service</label>
                </div>

                <div class="col-6">
                <select  name="newService"> 
                    <?php foreach($serviceFromDB as $value): ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name'] . " - £" . $value['price']; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-6">
                <label for="service">Date</label>
                </div>

                <div class="col-6">
                <input type="date" name="newDate" placeholder="date">
                </div>

            </div>

            <div class="form-group row">

                <div class="col-6">
                <label for="service">Time</label>
                </div>

                <div class="col-6">
                <input type="time" name="newTime" placeholder="time">
                </div>
                
            </div>

            <div class="d-flex justify-content-around">
                <button type="submit" name="admin_create_appointment" class="btn btn-primary mt-5">Create</button>
                <a href="admin.php" class="btn btn-secondary mt-5 ">Cancel</a>
            </div>

        </form>

    </div>

</div>

<?php
include 'template\footer_scripts.php';
?>



<?php
include 'template\footer.php';
?>