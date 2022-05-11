<?php
include 'template\head.php';

if (!isset($_SESSION['valid']) && $_SESSION['type'] != "admin"){
    header('Location: login.php');
}
?>

<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  <div class="headerColor border-right" id="sidebar-wrapper">
    <div class="sidebar-heading"><img src="img/logo/logo_ilust_name.svg" height="45px" alt=""></div>
    <div class="list-group list-group-flush">
      <a href="#dashboard" role="tab" data-toggle="tab" aria-selected="true"
        class="list-group-item list-group-item-action headerColor" id="leftMenuLinkDashboard">Dashboard</a>
      <a href="#users" role="tab" data-toggle="tab" aria-selected="false"
        class="list-group-item list-group-item-action headerColor" id="leftMenuLinkUsers">Users</a>
      <a href="#appointments" role="tab" data-toggle="tab" aria-selected="false"
        class="list-group-item list-group-item-action headerColor" id="leftMenuLinkAppointments">Appointments</a>
      <a href="#services" role="tab" data-toggle="tab" aria-selected="false"
        class="list-group-item list-group-item-action headerColor" id="leftMenuLinkServices">Services</a>
    </div>
  </div><!-- /#sidebar-wrapper -->

  <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light headerColor border-bottom" style="height:75px;">
      <button class="btn btnS" id="menu-toggle"><img
          src="img/icons/layout-text-window-reverse.svg" height="32px" alt=""></button>

      <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a href="services/logout.php" class="nav-link" id="logoutBtnID">Log Out</a>
          </li>
        </ul>
      </div>
    </nav><!-- /#Top nav bar -->

    <div class="container-fluid adminContentContainers tab-content">

      <div role="tabpanel" class="tab-pane mb-3 active" id="dashboard">

        <h2 class="text-center my-4 text-danger">Outstanding Stats</h2>

        <div class="row d-flex justify-content-center">
          <div class="card mx-2 bg-soft-success p-3 text-center">
            <img src="img/icons/person-check-fill.svg" height="80px" alt="">
            <h1 class="my-3">
              <?php 
              $UsersQtyAsk = mysqli_query($connection, "SELECT * FROM user") or die (mysqli_connect_error());
              $UsersQty = mysqli_num_rows($UsersQtyAsk);
              echo $UsersQty;
              ?>
            </h1>
            <h3>Users Registered</h3>
          </div>

          <div class="card mx-2 bg-soft-warning p-3 text-center">
            <img src="img/icons/card-checklist.svg" height="80px" alt="">
            <h1 class="my-3">
              <?php 
              $appointmentsQtyAsk = mysqli_query($connection, "SELECT * FROM appointment") or die (mysqli_connect_error());
              $appointmentsQty = mysqli_num_rows($appointmentsQtyAsk);
              echo $appointmentsQty;
              ?>
            </h1>
            <h3>Appointments</h3>
          </div>

          <div class="card mx-2 bg-soft-primary p-3 text-center">
            <img src="img/icons/bar-chart-fill.svg" height="80px" alt="">
            <h1 class="my-3">
              <?php 
              $servicesQtyAsk = mysqli_query($connection, "SELECT * FROM `service`") or die (mysqli_connect_error());
              $servicesQty = mysqli_num_rows($servicesQtyAsk);
              echo $servicesQty;
              ?>
            </h1>
            <h3>Services offered</h3>
          </div>
        </div>

      </div><!-- /#Dashboard -->

      <div role="tabpanel" class="tab-pane" id="users">

        <div class="row d-flex justify-content-between">
          <h1 class="col-6"><img src="img/icons/person-fill.svg" height="48px" alt=""> Users</h1>
          <form action="process.php" method="post">
            <a href="register.php" target="_blank" class="btn btn-outline-warning bg-soft-warning mr-4 mt-2">Add new user +</a>
          </form>
        </div>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $usersFromDB = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `user`"),MYSQLI_ASSOC);
              ?>
                
              <?php foreach($usersFromDB as $value): ?>
                <tr>
                  <td><?php echo $value['user_id']; ?></td>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['surname']; ?></td>
                  <td><?php echo $value['email']; ?></td>
                  <td><?php echo $value['password']; ?></td>
                  <td class="row mr-0">
                    <a href="edit_user.php?user_id=<?php echo $value['user_id']; ?>"class="btn btn-primary mr-2">Edit</a>
                    <a href="process.php?deleteUser=<?php echo $value['user_id']; ?>" class="btn btn-danger mr-2" onclick="return confirm('Are you sure?')">Delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div><!-- /#Users -->

      <div role="tabpanel" class="tab-pane" id="appointments">

        <div class="row d-flex justify-content-between">
          <h1 class="col-6"><img src="img/icons/card-checklist.svg" height="48px" alt=""> Appointments</h1>
          <a href="admin-new-appointment.php" class="btn btn-outline-warning bg-soft-warning col-4 h-50 align-self-center mr-2">Add new appointment +</a>
        </div>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">User</th>
                <th scope="col">Service</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $appointmentsFromDB = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `appointment`"),MYSQLI_ASSOC);
              ?>
                
              <?php foreach($appointmentsFromDB as $value): ?>

                <tr>
                  <td><?php echo $value['appointment_id']; ?></td>
                  <td><?php
                    $id = $value['user_id'];
                  
                    $userFromDB = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `user` WHERE `user_id`='$id'"),MYSQLI_ASSOC);
                  
                    echo $userFromDB[0]['name'] ." ". $userFromDB[0]['surname'] ; ?>
                
                  </td>

                  <td><?php
                    $id = $value['service'];
                  
                    $userFromDB = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `service` WHERE `id`='$id'"),MYSQLI_ASSOC);
                  
                    echo $userFromDB[0]['name']; ?>
                
                  </td>

                  <td><?php echo $value['date']; ?></td>
                  <td><?php echo $value['time']; ?></td>
                  <td>
                  <a href="process.php?appointment_id=<?php echo $value['appointment_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                  </td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div><!-- /#Appointments -->

      <div role="tabpanel" class="tab-pane" id="services">

        <div class="row d-flex justify-content-between">
          <h1 class="col-6"><img src="img/icons/bar-chart-fill.svg" height="48px" alt=""> Services</h1>
          <a href="#addservices" role="tab" data-toggle="tab" aria-selected="false"
            class="btn btn-outline-warning bg-soft-warning col-4 h-50 align-self-center mr-2" id="addingservices">Add new service +</a>
        </div>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Price</th>
                <th scope="col" class="text-center">Available</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $appointmentsFromDB = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `service`"),MYSQLI_ASSOC);
              ?>
                
              <?php foreach($appointmentsFromDB as $value): ?>

                <tr>
                  <td class="text-center"><?php echo $value['id']; ?></td>
                  <td><?php echo $value['name']; ?>
                  <td class="text-center"><?php echo "£".$value['price']; ?></td>

                  <td class="text-center"><?php $availability = $value['availability']; 
                  
                  if($availability=="1"){
                    echo "Yes";
                  }else {
                    echo "No";
                  }
                
                  ?></td>
                  <td class="row mr-0">
                    <a href="edit_service.php?service_id=<?php echo $value['id']; ?>" class="btn btn-primary ml-3">Edit</a>
                    <a href="process.php?service_id=<?php echo $value['id']; ?>" class="btn btn-danger ml-3" onclick="return confirm('Are you sure?')">Delete</a>
                  </td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div><!-- /#Services -->

      <div role="tabpanel" class="tab-pane" id="addservices">

        <div class="container d-flex justify-content-center">
            
          <form action="process.php" method="POST" class="mt-4 border p-5">

            <h1 class="mb-4">Create new service</h1>

            <div class = 'form-group row'>
              <label class = 'col-lg-3 col-form-label form-control-label text-nowrap'>Service</label>
              <div class = 'col-lg-9'>
                <input class="form-control" type="text" name="service" placeholder="Service" value="">
              </div>
            </div>

            <div class = 'form-group row'>
              <label class = 'col-lg-3 col-form-label form-control-label text-nowrap'>Price</label>
              <div class = 'col-lg-9'>
                <input class="form-control" type="number" name="price" placeholder="£00.00" value="">
              </div>
            </div>

            <div class = 'form-group row'>
              <label class = 'col-lg-3 col-form-label form-control-label text-nowrap'>Category</label>
              <div class = 'col-lg-9'>
                <input class="form-control" type="text" name="category" placeholder="Category" value="">
              </div>
            </div>

            <div class="d-flex justify-content-around mt-4">
              <button type="submit" name="newservicetodb" onclick="return confirm('Are all the fields right?')" class="btn btn-primary">Save</button>
              <a href="admin.php" class="btn btn-secondary">Cancel</a>
            </div>

          </form>

        </div>

      </div><!-- /#ADD Services -->

    </div><!-- /#Content separator parent -->

  </div><!-- /#page-content-wrapper -->

</div><!-- /#wrapper -->

<?php
include 'template\footer_scripts.php';
?>

<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
</script>

<?php
include 'template\footer.php';
?>