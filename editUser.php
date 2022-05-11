<?php
include '.\template\head.php';

if ($_SESSION['type'] != "user"){
    header('Location: login.php');
}
?>

<div class="container">

    <div class="text-center pt-3">
        <a href="admin.php" class=""><button class="btn btn-outline-primary">Back to admin page</button></a><br>
    </div>

    <form>

        <?php
            $id = $_POST['idOfUser'];
            
            $userFromDB = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `user` WHERE `user_id`='$id'"),MYSQLI_ASSOC);
        ?>

        <div class="form-group">
            <label for="formGroupExampleInput">ID</label>
            <input type="text" class="form-control" id="editID" placeholder="User id" disabled value="<?php echo $userFromDB[0]['user_id']?>">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Name</label>
            <input type="text" class="form-control" id="editName" placeholder="User id" value="<?php echo $userFromDB[0]['name']?>">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Surname</label>
            <input type="text" class="form-control" id="editSurname" placeholder="User id" value="<?php echo $userFromDB[0]['surname']?>">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Birthdate</label>
            <input class="form-control" type="date" value="<?php echo $userFromDB[0]['birthdate']?>" id="editAlbumRelease">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Phone</label>
            <input type="text" class="form-control" id="editPhone" placeholder="User id" value="<?php echo $userFromDB[0]['phone']?>">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Email</label>
            <input type="email" class="form-control" id="editEmail" placeholder="User id" value="<?php echo $userFromDB[0]['email']?>">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Password</label>
            <input type="password" class="form-control" id="editPassword" placeholder="User id" value="<?php echo $userFromDB[0]['password']?>">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Street</label>
            <input type="text" class="form-control" id="editStreet" placeholder="User id" value="<?php echo $userFromDB[0]['street']?>">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">City</label>
            <input type="text" class="form-control" id="editCity" placeholder="User id" value="<?php echo $userFromDB[0]['city']?>">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Postcode</label>
            <input type="text" class="form-control" id="editPostcode" placeholder="User id" value="<?php echo $userFromDB[0]['postcode']?>">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Country</label>
            <input type="text" class="form-control" id="editCountry" placeholder="User id" value="<?php echo $userFromDB[0]['country']?>">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Joined date</label>
            <input type="text" class="form-control" id="editRegDate" placeholder="User id" disabled value="<?php echo $userFromDB[0]['reg_date']?>">
        </div>

        <div class="text-center">
            <button class="btn btn-primary" type="submit"> Save changes</button>
        </div>

    </form>

        <div class="text-center">
            <br><a href="admin.php"><button class="btn btn-danger">Cancel</button></a>
        </div>

</div>

<?php
include '.\template\footer_scripts.php';
?>