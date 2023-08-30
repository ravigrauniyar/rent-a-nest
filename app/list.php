<?php
require '../config/config.php';
if (empty($_SESSION['username']))
	header('Location: login.php');

	try {
		if ($_SESSION['role'] == 'admin') {

			// Assuming you have already established a PDO connection in $connect

		// Fetch rental data
		$stmt = $connect->prepare('SELECT * FROM rental_registrations');
		$stmt->execute();
		$rental_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$user_ids = array_column($rental_data, 'user_id');
		$user_ids = array_unique($user_ids);

		$user_query = $connect->prepare('SELECT * FROM users WHERE id = :user_id');
		$organized_data = array();

		foreach ($rental_data as $rental) {
			$rental_id = $rental['id'];
			$user_id = $rental['user_id'];
			
			// Fetch user data for the user_id
			$user_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$user_query->execute();
			$user_data = $user_query->fetch(PDO::FETCH_ASSOC);
			
			$organized_data[$rental_id] = $user_data;
		}
	}

	if ($_SESSION['role'] == 'user') {

		$stmt = $connect->prepare('SELECT * FROM rental_registrations WHERE :user_id = user_id ');
		$stmt->execute(array(
			':user_id' => $_SESSION['id']
		));
		$rental_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$user_ids = array_column($rental_data, 'user_id');
		$user_ids = array_unique($user_ids);

		$user_query = $connect->prepare('SELECT * FROM users WHERE id = :user_id');
		$organized_data = array();

		foreach ($rental_data as $rental) {
			$rental_id = $rental['id'];
			$user_id = $rental['user_id'];
			
			// Fetch user data for the user_id
			$user_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$user_query->execute();
			$user_data = $user_query->fetch(PDO::FETCH_ASSOC);
			
			$organized_data[$rental_id] = $user_data;
		}
	}
} catch (PDOException $e) {
	$errMsg = $e->getMessage();
}
// print_r($data1);	
// echo "<br><br><br>";
// print_r($data2);
// echo "<br><br><br>";	
// print_r($data);	
?>
<?php include '../include/header.php'; ?>

<!-- Header nav -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#212529;" id="mainNav">
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
<section style="padding-left:0px;">
	<?php include '../include/side-nav.php'; ?>
</section>

<section class="wrapper" style="margin-left: 16%;margin-top: -23%;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
				if (isset($errMsg)) {
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">' . $errMsg . '</div>';
				}
				?>
				<h2>List of Apartment Details</h2>
				<?php
				foreach ($rental_data as $key => $rental) {
					echo '<div class="card card-inverse card-info mb-3" style="padding:1%;">					
							  <div class="card-block">';

					// Fetch user data for the current rental's user_id
					$user_data = $organized_data[$rental['id']];
					echo  '<div class="row">
							  <div class="col-4">
								<h4 class="text-center mb-3">Owner Details</h4>';
								
					echo '<p><b>Owner Name: </b>' . $user_data['fullname'] . '</p>';
					echo '<p><b>Mobile Number: </b>' . $user_data['mobile'] . '</p>';
					echo '<p><b>Email: </b>' . $user_data['email'] . '</p>';

					echo '</div>
						  <div class="col-5">
							<h4 class="text-center mb-3">Room Details</h4>';
							
					echo '<p><b>Address: </b>' . $rental['address'] . '</p>';
					echo '<p><b>Available Rooms: </b>' . $rental['rooms'] . '</p>';
					echo '<p><b>Rent (Rs.): </b>' . $rental['rent'] . '</p>';
					echo '<p><b>Deposit (Rs.): </b>' . $rental['deposit'] . '</p>';
					
					echo '</div>
						  <div class="col-3">
							<h4 class="mb-3">Other Details</h4>';
							
					echo '<p><b>Description: </b>' . $rental['description'] . '</p>';
					echo '<a class="btn btn-warning float-right" href="update.php?id=' . $rental['id'] . '">Edit</a>';
					echo '<a class="btn btn-warning float-right mx-lg-4 mt-sm-3 mt-lg-0" href="../app/file_complaint.php">Complaint</a><br><br>';
					echo '</div>
						</div>				      
					</div>
				</div>';	  
				}
				?>
			</div>
		</div>
	</div>
</section>
<?php include '../include/footer.php'; ?>