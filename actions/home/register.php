<?php
    if (isset($_POST['register'])) {
        $errMsg = '';
        $username = $_POST['username'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];

        try {
            $stmt = $connect->prepare(
                    'INSERT INTO users (fullname, mobile, username, email, password, address) 
                        VALUES (:fullname, :mobile, :username, :email, :password, address)'
                    );
            $stmt->execute([
                ':fullname' => $fullname,
                ':username' => $username,
                ':password' => md5($password),
                ':email' => $email,
                ':mobile' => $mobile,
                ':address' => $address
            ]);
            header('Location: index.php?q='.serialize_url('home', 'register', 0, true));
            exit;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    if ($result) {
        $errMsg = 'Registration successful. Now you can login';
    }
    require_once('components/home/registration_form.php');
?>
