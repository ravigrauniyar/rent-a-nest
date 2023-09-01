<?php
    $rental_data = [];

    if (isset($_POST['search'])) {
        // Get data from FORM
        $keywords = $_POST['keywords'];
        $location = $_POST['location'];

        // Prepare search arrays
        $keywordArray = explode(',', $keywords);
        $keywordsIn = "(" . implode(',', array_map(function($k) { return "'$k'"; }, $keywordArray)) . ")";
        
        $locationArray = explode(',', $location);
        $locationIn = "(" . implode(',', array_map(function($l) { return "'$l'"; }, $locationArray)) . ")";

        try {
            $stmt = $connect->prepare("SELECT * FROM rental_registrations WHERE rooms IN $keywordsIn OR address IN $keywordsIn OR address IN $locationIn OR rent IN $keywordsIn OR deposit IN $keywordsIn");
            $stmt->execute();
            $rental_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $user_ids = array_unique(array_column($rental_data, 'user_id'));

            $user_query = $connect->prepare('SELECT * FROM users WHERE id = :user_id');
            $organized_data = [];

            foreach ($rental_data as $rental) {
                $user_id = $rental['user_id'];

                // Fetch user data for the user_id
                $user_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $user_query->execute();
                $user_data = $user_query->fetch(PDO::FETCH_ASSOC);

                $organized_data[$rental['id']] = $user_data;
            }
        } catch (PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
    require_once('components/home/search_form.php');
?>
