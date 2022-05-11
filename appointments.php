<?php
include 'services\connection.php';
include 'template\head.php';
$page = "appointments";
include 'template\navbar.php';

if (!isset($_SESSION['valid']) || $_SESSION['valid'] != true || $_SESSION['type'] !== "user"){
    header('Location: login.php');
}else{
}
include 'process.php';
?>

<div class="container">

    <div class="d-flex justify-content-center">
        <a href="new-appointment.php" class="mt-4 btn btn-outline-warning">Create new appointment</a>
    </div>

    <?php
    if($editForm == true):
    ?>
    <form action="process.php" method="POST">
        <input type="hidden" name="update_id" value="<?php echo $idd; ?>">
    <div class="form-group mt-4">
        <label for="exampleInputEmail1">Service</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $service; ?>" disabled>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Date</label>
        <input type="date" name="update_date" class="form-control" id="txtDate" value="<?php echo $date; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Time</label>
        <input type="time" name="update_time" class="form-control" id="exampleInputPassword1" value="<?php echo $time; ?>">
    </div>
    <button type="submit" name="editing_appointment" class="btn btn-primary" onclick="return confirm('Are you sure?')">Save changes</button>
    <a href="appointments.php"class="btn btn-secondary mr-2">Cancel</a>
    </form>
    <?php else: ?>
    <?php endif; ?>

    <table class="table mt-4">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Service</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
        $user_id = $_SESSION['user_id'];
        $appointmentsFromDB = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `appointment` WHERE user_id='$user_id'"),MYSQLI_ASSOC);
        foreach($appointmentsFromDB as $value):
        ?>
        
            <tr>
                <th scope="row"><?php echo $value['appointment_id']; ?></th>
                <td>
                    <?php
                        $id = $value['service'];
                    
                        $serviceFromDB = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `service` WHERE `id`='$id'"),MYSQLI_ASSOC);
                    ?>
                    <input type="text" name="service_name" value="<?php echo $serviceFromDB[0]['name']; ?>" disabled>
                </td>
                <td><input type="date" name="service_name" value="<?php echo $value['date']; ?>" disabled></td>
                <td><input type="time" name="service_name" value="<?php echo $value['time']; ?>" disabled></td>
                <td>
                <a href="appointments.php?edit=<?php echo $value['appointment_id']; ?>&service=<?php echo $serviceFromDB[0]['name']; ?>"class="btn btn-outline-primary mr-2">Edit</a>
                <a href="process.php?delete=<?php echo $value['appointment_id']; ?>"class="btn btn-outline-danger mr-2" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            </form>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>

<?php
include 'template\footer_scripts.php';
?>

<script>
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#txtDate').attr('min', maxDate);
});
</script>

<?php
include 'template\footer.php';
?>