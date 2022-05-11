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
    <div class="card-header">
      <img src="img/icons/person-fill.svg" width="18px" alt="" /> Profile.
    </div>
    <div class="card-body">
      <form role="form" id="edit_profile_form" action="process.php" method="POST">
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label"
            >First name </label
          >
          <div class="col-lg-9">
            <input
            name="name"
              class="form-control"
              type="text"
              placeholder="Name"
              value="<?php echo $value['name']; ?>"
              required
            />
          </div>
        </div>

        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label"
            >Last name</label
          >
          <div class="col-lg-9">
            <input
              name="surname"
              class="form-control"
              type="text"
              placeholder="Surname"
              value="<?php echo $value['surname']; ?>"
              required
            />
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label"
            >Birthdate</label
          >
          <div class="col-lg-9">
            <input
              name="birthdate"
              class="form-control"
              type="date"
              value="<?php echo $value['birthdate']; ?>"
              required
            />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label"
            >Phone</label
          >
          <div class="col-lg-9">
            <input
              name="phone"
              class="form-control"
              type="number"
              placeholder="+44 123456789"
              value="<?php echo $value['phone']; ?>"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label"
            >Email</label
          >
          <div class="col-lg-9">
            <input
              name="email"
              class="form-control"
              type="email"
              placeholder="example@example.com"
              value="<?php echo $value['email']; ?>"
              required
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label"
            >Password</label
          >
          <div class="col-lg-9">
            <input
              name="password"
              class="form-control"
              type="password"
              placeholder="* * * * * * * *"
              value="<?php echo $value['password']; ?>"
              required
            />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label"></label>
          <div class="col-lg-9">
            <a href="profile.php" class="btn btn-secondary">Cancel</a>
            <button
              name="edit_user_info"
              type="submit"
              form="edit_profile_form"
              class="btn btn-primary"
              onclick="return confirm('Are you sure?')"
            >
              Save Changes
            </button>
          </div>
        </div>
      </form>
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
