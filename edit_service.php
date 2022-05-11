<?php
include 'services\connection.php';
include 'template\head.php';
$page = "";

if (!isset($_SESSION['valid']) || $_SESSION['type'] !== "admin"){
    header('Location: login.php');
}else{
}
?>

<?php
$id = $_GET['service_id'];
$serviceFromDB = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `service` WHERE `id`='$id'"),MYSQLI_ASSOC);

foreach($serviceFromDB as $value):
?>

<div class="container pt-5">
  <div class="card">
    <div class="card-header">
      <img src="img/icons/person-fill.svg" width="18px" alt="" /> Service.
    </div>
    <div class="card-body">
      <form role="form" action="process.php" method="POST">
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label"
            >Service </label
          >
          <div class="col-lg-9">
            <input
            name="service"
              class="form-control"
              type="text"
              placeholder="Name"
              value="<?php echo $value['name']; ?>"
              required
            />
          </div>
        </div>

        <input type="hidden" name="service_id" value="<?php echo $value['id']; ?>">
        
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label"
            >Price</label
          >
          <div class="col-lg-9">
            <input
              name="price"
              class="form-control"
              type="number"
              placeholder="£00.00"
              value="<?php echo $value['price']; ?>"
              required
            />
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label"
            >Categoria</label
          >
          <div class="col-lg-9">
            <input
              name="category"
              class="form-control"
              type="text"
              value="<?php echo $value['category']; ?>"
              required
            />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label"></label>
          <div class="col-lg-9">
            <a href="admin.php" class="btn btn-secondary">Cancel</a>
            <button
              name="admin_edit_service"
              type="submit"
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