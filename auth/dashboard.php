<?php
	require '../config/config.php';
	if (empty($_SESSION['username']))
		header('Location: login.php');

	if ($_SESSION['role'] == 'admin') {
		$stmt1 = $connect->prepare('SELECT count(*) as register_user FROM users');
		$stmt1->execute();
		$users_count = $stmt1->fetch(PDO::FETCH_ASSOC);

		$stmt2 = $connect->prepare('SELECT count(*) as total_rentals FROM rental_registrations');
		$stmt2->execute();
		$total_rental = $stmt2->fetch(PDO::FETCH_ASSOC);
	}
	if($_SESSION['role'] == 'user') {
		$stmt = $connect->prepare('SELECT count(*) as total_rentals FROM rental_registrations where user_id = :user_id');
		$stmt->execute(array(
			':user_id' => $_SESSION['id']
		));		
		$total_rental = $stmt->fetch(PDO::FETCH_ASSOC);
	}
	$stmt = $connect->prepare('SELECT count(*) as total_auth_user_rent FROM rental_registrations WHERE user_id = :user_id');
	$stmt->execute(array(
		':user_id' => $_SESSION['id']
	));
	$total_auth_user_rent = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php include '../include/header.php'; ?>
<!-- Header nav -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#212529;" id="mainNav">
	<div class="container">
		<a class="navbar-brand js-scroll-trigger" href="../index.php">Rent-A-Nest</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			Menu
			<i class="fa fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav text-uppercase ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="#"><?php echo $_SESSION['fullname']; ?> 
						<?php if ($_SESSION['role'] == 'admin') { echo "(Admin)";} ?>
					</a>
				</li>
				<li class="nav-item">
					<a href="logout.php" class="nav-link">Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- end header nav -->
<?php include '../include/side-nav.php'; ?>
<section class="wrapper" style="margin-left: 16%;margin-top: -11%;">
	<div class="col-md-12">
		<h1>Dash board</h1>
		<div class="row">
			<?php
			if ($_SESSION['role'] == 'admin') {
				echo '<div class="col-md-3">';
				echo '<a href="../app/users.php"><div class="alert alert-warning" role="alert">';
				echo '<b>Registered Users: <span class="badge badge-pill badge-success">' . $users_count['register_user'] . '</span></b>';
				echo '</div></a>';
				echo '</div>';
			}
			?>
			<?php
				echo '<div class="col-md-3">';
				echo '<a href="../app/list.php"><div class="alert alert-warning" role="alert">';
				echo '<b>Rooms for Rent: <span class="badge badge-pill badge-success">' . (intval($total_rental['total_rentals']) ) . '</span></b>';
				echo '</div></a>';
				echo '</div>';
			?>
		</div>
	</div>
</section>
<?php include '../include/footer.php'; ?>