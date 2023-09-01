<?php
if (empty($_SESSION['username'])) {
    header('Location: index.php?q='.serialize_url('home', 'login'));
}
if (isset($_POST['file_complaint'])) {
	$apartment_info = $_POST['apartment_info'];
	$complaint = $_POST['complaint'];
	$user_id = $_POST['user_id'];

	try {
		$stmt = $connect->prepare('INSERT INTO complaints (apartment_info,complaint,user_id) VALUES (:apartment_info, :complaint,:user_id)');
		$stmt->execute(array(
			':apartment_info' => $apartment_info,
			':complaint' => $complaint,
			':user_id' => $user_id
		));

		$message = 'Sent Successfully';
	} catch (PDOException $e) {
		$message = $e->getMessage();
	}
}

include 'components/dashboard/file_complaint.php';
