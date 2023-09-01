<?php
    if (empty($_SESSION['username'])) {
        header('Location: index.php');
    }
    include 'components/dashboard/side_nav.php';
    include 'actions/dashboard/'.$action.'.php';
   