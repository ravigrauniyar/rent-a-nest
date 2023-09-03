<?php
    $role = $_SESSION['role'];
    $user_id = $_SESSION['user_id'];

    if ($role == 'user') {
        $rental_stmt = $connect->prepare('SELECT count(*) as total_rentals FROM rental_registrations WHERE user_id = :user_id');
        $rental_stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $rental_stmt->execute();

        $complaints_stmt = $connect->prepare('SELECT count(*) as complaints FROM complaints where user_id = :user_id');
        $complaints_stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $complaints_stmt->execute();
    } 
    else if ($role == 'admin') {
        $stmt = $connect->prepare('SELECT count(*) as total_rentals FROM rental_registrations');
        $stmt->execute();
        
        $users_count = $connect->query('SELECT count(*) as register_user FROM users')->fetch(PDO::FETCH_ASSOC);
        
        $complaints_count = $connect->prepare('SELECT count(*) as complaints FROM complaints');
        $complaints_stmt->execute();
    }

    $total_rental = $rental_stmt->fetch(PDO::FETCH_ASSOC);
    $complaints_count = $complaints_stmt->fetch(PDO::FETCH_ASSOC);
    
    include 'components/dashboard/'. $action .'.php';