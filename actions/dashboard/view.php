<?php
    $role = $_SESSION['role'];
    $user_id = $_SESSION['user_id'];

    if ($role == 'user') {
        $stmt = $connect->prepare('SELECT count(*) as total_rentals FROM rental_registrations WHERE user_id = :user_id');
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
    } else if ($role == 'admin') {
        $stmt = $connect->prepare('SELECT count(*) as total_rentals FROM rental_registrations');
        $stmt->execute();
        
        $users_count = $connect->query('SELECT count(*) as register_user FROM users')->fetch(PDO::FETCH_ASSOC);
        $complaints_count = $connect->query('SELECT count(*) as complaints FROM complaints')->fetch(PDO::FETCH_ASSOC);
    }

    $total_rental = $stmt->fetch(PDO::FETCH_ASSOC);

    include 'components/dashboard/'. $action .'.php';