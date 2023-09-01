<?php
	if (empty($_SESSION['username']))
		header('Location: index.php?q='.serialize_url('home', 'login'));

	if ($id !== 0) {
		try {
			$stmt = $connect->prepare('DELETE FROM rental_registrations where id = :id');
			$stmt->execute(array(
				':id' => $id
			));
			header('Location: index.php?q='.serialize_url('dashboard', 'view_rentals'));
			exit;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}