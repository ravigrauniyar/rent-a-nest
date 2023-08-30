<?php
require '../config/config.php';
if (empty($_SESSION['username'])) {
	header('Location: login.php');
	exit; // Always exit after a redirect
}

try {
	if ($_SESSION['role'] == 'admin') {
		$stmt = $connect->prepare('SELECT * FROM complaints');
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$user_ids = array_column($data, 'user_id');
		$user_ids = array_unique($user_ids);

		$user_query = $connect->prepare('SELECT * FROM users WHERE id = :user_id');
		$organized_data = array();

		foreach ($data as $complaint) {
			$user_id = $complaint['user_id'];

			// Fetch user data for the user_id
			$user_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$user_query->execute();
			$user_data = $user_query->fetch(PDO::FETCH_ASSOC);

			$organized_data[$complaint['id']] = $user_data;
		}
	}
} catch (PDOException $e) {
	$errMsg = $e->getMessage();
}
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
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Apartment/Room</th>
							<th>Complaints</th>
							<th>Full Name</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($data as $key => $value) {
							echo '<tr>';
							echo '<td>' . $value['apartment_info'] . '</td>';
							echo '<td>' . $value['complaint'] . '</td>';

							// Fetch user data for the current complaint's user_id
							$user_data = $organized_data[$value['id']];
							echo '<td>' . $user_data['fullname'] . '</td>';

							echo '</tr>';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
