<?php
$message = '';
    
if (isset($_POST['register_apartment'])) 
{
    $fileName = get_uploaded_file();

    if($fileName !== '')
    {
        // Get data from the form
        $address = $_POST['address'];
        $rent = $_POST['rent'];
        $deposit = $_POST['deposit'];
        $description = $_POST['description'];
        $user_id = $_SESSION['user_id'];
        $rooms = $_POST['rooms'];

        try {
            $stmt = $connect->prepare
                    ('INSERT INTO rental_registrations 
                        (address, rent, rooms, deposit, description, image, user_id) 
                    VALUES 
                        (:address, :rent, :rooms, :deposit, :description, :image, :user_id)');

            $stmt->execute([
                ':address' => $address,
                ':rent' => $rent,
                ':rooms' => $rooms,
                ':deposit' => $deposit,
                ':description' => $description,
                ':image' => $fileName,
                ':user_id' => $user_id
            ]);
            header('Location: index.php?q='.serialize_url('dashboard', 'register_rental', 0, true));
            exit;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    else{
        $message = "Image could not be uploaded. Please try again!";
    }
}
if ($result) {
    $message = 'Registration successful. Thank you';
}

include 'components/dashboard/register_rental.php';

