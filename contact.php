<?php
include 'services\connection.php';
include 'template\head.php';
$page = "contact";
include 'template\navbar.php';
?>

<div class="container">

<div class="container">
    <div class="row">
        <div class="col mt-4">
            <div class="card">
                <div class="card-header"><img src="img/icons/envelope-fill.svg" width="18px" alt=""> Contact us.
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-warning text-right">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4 mt-4">
            <div class="card bg-light mb-3">
                <div class="card-header"><img src="img/icons/geo-alt.svg" width="18px" alt=""> Address</div>
                <div class="card-body">
                    <p><img src="img/icons/house-door-fill.svg" width="18px" alt=""> 3 rue des Champs Elysées</p>
                    <p><img src="img/icons/hash.svg" width="18px" alt=""> 75008 PARIS</p>
                    <p><img src="img/icons/geo.svg" width="18px" alt=""> France</p>
                    <p><img src="img/icons/at.svg" width="18px" alt="">  : email@example.com</p>
                    <p><img src="img/icons/telephone.svg" width="18px" alt="">  +33 12 56 11 51 84</p>

                </div>

            </div>
        </div>
    </div>
</div>
	
</div>

<?php
include 'template\footer_scripts.php';
?>



<?php
include 'template\footer.php';
?>