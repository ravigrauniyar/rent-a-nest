<?php
    if (empty($_SESSION['username'])) {
        header("Location: index.php?q=".serialize_url('home', 'login'));
    }
    include 'components/dashboard/side_nav.php';
    include 'actions/dashboard/'.$action.'.php';
   