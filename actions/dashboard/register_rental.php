<?php
if (empty($_SESSION['username'])) {
    header('Location: index.php?q='.serialize_url('home', 'login'));
}
$message = '';

if (isset($_POST['register_apartment'])) {
    // Get data from the form
    $address = $_POST['address'];
    $rent = $_POST['rent'];
    $deposit = $_POST['deposit'];
    $description = $_POST['description'];
    $id = $_SESSION['id'];
    $rooms = $_POST['rooms'];

    try {
        $stmt = $connect->prepare('INSERT INTO rental_registrations (address, rent, rooms, deposit, description, id) VALUES (:address, :rent, :rooms, :deposit, :description, :id)');
        $stmt->execute([
            ':address' => $address,
            ':rent' => $rent,
            ':rooms' => $rooms,
            ':deposit' => $deposit,
            ':description' => $description,
            ':id' => $id
        ]);
        header('Location: index.php?q='.serialize_url('dashboard', 'register', $id, true));
        exit;
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}
if ($result) {
    $message = 'Registration successful. Thank you';
}

include 'components/dashboard/register_rental.php';

