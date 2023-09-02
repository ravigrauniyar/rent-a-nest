<?php
	session_destroy();
	header("Location: index.php?q=".serialize_url('home', 'login'));
	exit;
?>
