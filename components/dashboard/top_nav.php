<nav class="navbar navbar-expand-lg navbar-dark w-100" style="background-color:#212529; position: absolute; z-index: 5;" id="mainNav">
	<div class="container">
		<a class="navbar-brand js-scroll-trigger" href="../index.php">Rent-A-Nest</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			Menu
			<i class="fa fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav text-uppercase ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">
						<?php 
							if(isset($_SESSION['username'])){
								echo $_SESSION['fullname'];
								if ($_SESSION['role'] == 'admin') { echo "(Admin)";} 
							}
						?>
					</a>
				</li>
				<li class="nav-item">
					<a href="index.php?q=<?= serialize_url('dashboard', 'logout') ?>" class="nav-link">Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>