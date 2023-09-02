<?php
    session_start();
    require_once 'database/db_config.php';
    require_once 'services/url_handling/url_handler.php';
    require_once 'services/image_handling/image_handler.php';

    // $serialized_initial_url = initialize_url();

    // Get the parameters from the URL
    $request = isset($_GET['q']) ? $_GET['q'] : '';
    
    // Decrypt the serialized url
    $data = deserialize_url($request);

    // Retrieve the parameters
    $page = $data['page'];
    $action = $data['action'];
    $id = $data['id'];
    $result = $data['result'];

    // Initialize the page variables
    $page_title = strtoupper($page);
    $page_content = $page;
    $page_nav = ($page === 'dashboard')? 'dashboard/top_nav' : 'home/navbar';

    // Include the template
    include 'template.php';
?>
