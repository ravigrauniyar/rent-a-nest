<?php
	if (empty($_SESSION['username']))
		header('Location: index.php?q='.serialize_url('home', 'login'));

	if ($id !== 0) {
		try {
			$stmt = $connect->prepare('SELECT * FROM rental_registrations where id = :id');
			$stmt->execute(array(
				':id' => $id
			));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	if (isset($_POST['update_rental'])) {
		$message = '';
	
		$fileName = get_uploaded_file();
		if($fileName !== '')
		{
		// Get data from form
			$address = $_POST['address'];
			$rent = $_POST['rent'];
			$deposit = $_POST['deposit'];
			$description = $_POST['description'];
			$id = $_POST['id'];
			$rooms = $_POST['rooms'];
		
			try {
				$stmt = $connect->prepare(
						'UPDATE rental_registrations 
						SET address = :address, rent = :rent, rooms = :rooms, deposit = :deposit,
							description = :description, image= :image WHERE id = :id');
		
				$stmt->execute(array(
					':address' => $address,
					':rent' => $rent,
					':rooms' => $rooms,
					':deposit' => $deposit,
					':description' => $description,
					':id' => $id,
					':image' => $fileName
				));
		
				header('Location: index.php?q='.serialize_url('dashboard', 'update_rental', $id, true));
				exit;
			} 
			catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		else{
			$message = "Couldn't update image. Try again!";
		}
	}	

	if ($result) {
		$message = 'Update successfully. Thank you!';
	}

include 'components/dashboard/update_rental.php';
