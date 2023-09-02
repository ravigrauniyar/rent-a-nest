<?php
	try {
		if ($_SESSION['role'] == 'admin') {

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
			':user_id' => $_SESSION['user_id']
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

include 'components/dashboard/view_rentals.php';
