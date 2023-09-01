<?php
if (empty($_SESSION['username'])) {
	header('Location: index.php?q='.serialize_url('home', 'login'));
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

include 'components/dashboard/view_complaints.php';

