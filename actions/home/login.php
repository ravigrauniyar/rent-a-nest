<?php
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$email = $_POST['username'];
		$password = $_POST['password'];

		try {
			$stmt = $connect->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
			$stmt->execute([
				':username' => $username,
				':email' => $email
			]);
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

			if (!$data) {
				$errMsg = "User $username not found.";
			} 
			elseif (md5($password) == $data['password']) {
				$_SESSION['id'] = $data['id'];
				$_SESSION['user_id'] = $data['id'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['fullname'] = $data['fullname'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['role'] = $data['role'];

				header('Location: index.php?q='.serialize_url('dashboard', 'view'));
				exit;
			} else {
				$errMsg = 'Password did not match.';
			}
		} 
		catch (PDOException $e) {
			$errMsg = $e->getMessage();
		}
	}
	require_once('components/home/login_form.php');
?>
