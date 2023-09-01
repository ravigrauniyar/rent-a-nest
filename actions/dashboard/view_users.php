<?php
	if (empty($_SESSION['username']))
	header('Location: index.php?q='.serialize_url('home', 'login'));

	try {
		$stmt = $connect->prepare('SELECT * FROM users');
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		$errMsg = $e->getMessage();
	}

	include 'components/dashboard/view_users.php';
