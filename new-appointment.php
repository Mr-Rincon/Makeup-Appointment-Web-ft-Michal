<?php
include 'services\connection.php';
include 'template\head.php';
$page = "appointments";
include 'template\navbar.php';

if ($_SESSION['type'] != "user"){
    header('Location: login.php');
}
?>

<div class="container d-flex justify-content-center">

	<div class="mt-4 border  p-5">

        <h2 class="col-12 mb-5">Create Appointment</h2>

        <?php
            $user_id = $_SESSION['user_id'];
            $serviceFromDB = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `service`"),MYSQLI_ASSOC);
        ?>

        <form action="process.php" method="post">

            <div class="form-group row mt-4">
                <div class="col-6">
                <label for="service">Service</label>
                </div>
                
                <input type="hidden" name="user" value="<?php echo $user_id?>">

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

            <div class="d-flex justify-content-center">
                <button type="submit" name="create_appointment" class="mt-5">Create</button>
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