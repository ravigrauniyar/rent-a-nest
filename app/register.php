<?php
require '../config/config.php';
if (empty($_SESSION['username']))
	header('Location: login.php');

if (isset($_POST['register_apartment'])) {
	$message = '';
	// Get data from FROM
	$address = $_POST['address'];
	$rent = $_POST['rent'];
	$deposit = $_POST['deposit'];
	$description = $_POST['description'];
	$user_id = $_SESSION['id'];
	$rooms = $_POST['rooms'];

	try {
		$stmt = $connect->prepare('INSERT INTO rental_registrations (address, rent, rooms, deposit, description, user_id) VALUES (:address, :rent, :rooms, :deposit, :description, :user_id)');

		$stmt->execute(array(
			':address' => $address,
			':rent' => $rent,
			':rooms' => $rooms,
			':deposit' => $deposit,
			':description' => $description,
			':user_id' => $user_id
		));

		header('Location: register.php?action=register');
		exit;
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}

if (isset($_GET['action']) && $_GET['action'] == 'reg') {
	$message = 'Registration successfull. Thank you';
}
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
					<a class="nav-link" href="#"><?php echo $_SESSION['fullname']; ?> <?php if ($_SESSION['role'] == 'admin') {
																							echo "(Admin)";
																						} ?></a>
				</li>
				<li class="nav-item">
					<a href="../auth/logout.php" class="nav-link">Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- end header nav -->
<?php include '../include/side-nav.php'; ?>
<section class="wrapper" style="margin-left: 16%;margin-top: -11%;">
	<div class="col-md-6 col-sm-12 mx-auto">
		<div class="alert alert-info" role="alert">
			<?php
			if(isset($errMsg)){
				echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
			}
			?>
			<h2 class="text-center mb-4">Register Apartment</h2>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" class="form-control" id="address" placeholder="Address" name="address" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="rooms">Available Rooms</label>
								<input type="text" class="form-control" id="rooms" placeholder="1BHK/2BHK/3BHK/1RK" name="rooms" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="rent">Rent</label>
								<input type="text" class="form-control" id="rent" placeholder="Rent" name="rent" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="deposit">Deposit</label>
								<input type="text" class="form-control" id="deposit" placeholder="Deposit" name="deposit" required>
							</div>
						</div>
					</div>
				</div>
				<div class="row form-group">
					<label for="description">Description</label>
					<textarea class="form-control" id="description" placeholder="Description" name="description" required> </textarea>
				</div>
				<button type="submit" class="btn btn-primary" name="register_apartment" value="register_apartment">Submit</button>
			</form>
		</div>
	</div>
</section>
<?php include '../include/footer.php'; ?>