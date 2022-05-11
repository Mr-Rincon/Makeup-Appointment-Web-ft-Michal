<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">

	<div class="container">

		<a class="navbar-brand" href="#">
			<img src="img/logo/logo_ilust_logo.svg" alt="logo" style="height: 60px;">
			<img src="img/logo/logo_ilust_name.svg" alt="logo" style="height: 40px;">
		</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item <?php if($page=="index") { echo "active"; } ?>">
					<a class="nav-link " href="index.php">Home</a>
				</li>
				<li class="nav-item <?php if($page=="offers") { echo "active"; } ?>">
					<a class="nav-link" href="offers.php">Services</a>
				</li>
				<li class="nav-item <?php if($page=="gallery") { echo "active"; } ?>">
					<a class="nav-link" href="gallery.php">Gallery</a>
				</li>

				<li class="nav-item <?php if($page=="about") { echo "active"; } ?>">
					<a class="nav-link" href="about.php">About me</a>
				</li>
				<li class="nav-item <?php if($page=="contact") { echo "active"; } ?>">
					<a class="nav-link" href="contact.php">Contact</a>
				</li>

				<?php if (isset($_SESSION['valid']) && $_SESSION['valid'] = true && $_SESSION['type'] == "user") : ?>

					<li class="nav-item">
						<a class="nav-link <?php if($page=="appointments") { echo "active"; } ?>" href="appointments.php">Appointments</a>
					</li>
					
					<li class="nav-item <?php if($page=="profile") { echo "active"; } ?>">
						<a class="nav-link" href="profile.php" id="profile_navbar">Profile</a>
					</li>

				<?php else : ?>
				<?php endif; ?>

			</ul>

			<ul class="navbar-nav">

				<?php if (isset($_SESSION['valid']) && $_SESSION['valid'] = true && $_SESSION['type'] == "user") : ?>
					
					<li>
					<a href="services/logout.php"><button type="button" class="btn btn-outline-warning">Logout</button></a>
					</li>

				<?php else : ?>							
				
					<li class="pb-1">
					<a href="login.php"><button type="button" class="btn btn-outline-warning mr-2">Login</button></a>
					</li>

					<li>
						<a href="register.php"><button type="button" class="btn btn-outline-warning">Sign up</button></a>
					</li>

				<?php endif; ?>

			</ul>

		</div>

	</div>

</nav>