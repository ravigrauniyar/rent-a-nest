<?php
	$errMsg = '';
	try {
		if ($_SESSION['role'] === 'admin') {
			$stmt = $connect->prepare('SELECT * FROM complaints');
			$stmt->execute();
			$complaints_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$user_ids = array_column($data, 'user_id');
			$user_ids = array_unique($user_ids);

			$user_query = $connect->prepare('SELECT * FROM users WHERE id = :user_id');
			$organized_data = array();

			foreach ($complaints_data as $complaint) {
				$user_id = $complaint['user_id'];

				// Fetch user data for the user_id
				$user_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
				$user_query->execute();
				$user_data = $user_query->fetch(PDO::FETCH_ASSOC);

				$organized_data[$complaint['id']] = $user_data;
			}
		}
		if ($_SESSION['role'] == 'user') {

			$stmt = $connect->prepare('SELECT * FROM complaints WHERE :user_id = user_id ');
			$stmt->execute(array(
				':user_id' => $_SESSION['user_id']
			));
			$complaints_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
			$user_ids = array_column($complaints_data, 'user_id');
			$user_ids = array_unique($user_ids);
	
			$user_query = $connect->prepare('SELECT * FROM users WHERE id = :user_id');
			$organized_data = array();
	
			foreach ($complaints_data as $complaints) {
				$complaints_id = $complaints['id'];
				$user_id = $complaints['user_id'];
				
				// Fetch user data for the user_id
				$user_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
				$user_query->execute();
				$user_data = $user_query->fetch(PDO::FETCH_ASSOC);
				
				$organized_data[$complaints_id] = $user_data;
			}
		}
	} catch (PDOException $e) {
		$errMsg = $e->getMessage();
	}
	include 'components/dashboard/view_complaints.php';

