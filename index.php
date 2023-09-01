<?php
    session_start();
    require_once 'database/db_config.php';
    require_once 'services/json_encryption.php';

    $serialized_initial_url = initialize_url();

    // Get the parameters from the URL
    $request = isset($_GET['q']) ? $_GET['q'] : $serialized_initial_url;
    
    $data = deserialize_url($request);
    // Redirect to home for exceptions url

    $page = isset($data['page']) ? $data['page'] : 'home';
    $action = isset($data['action']) && !empty($data['action']) ? $data['action'] : 'view';
    $id = isset($data['id']) && $data['id'] !== 0 ? $data['id'] : 0;
    $result = isset($data['result']) &&!empty($data['result'])? $data['result'] : false;

    // Initialize the page title and content
    $page_title = strtoupper($page);
    $page_content = $page;

    $page_nav = ($page === 'dashboard')? 'dashboard/top_nav' : 'home/navbar';

    // Include the template
    include 'template.php';
?>
