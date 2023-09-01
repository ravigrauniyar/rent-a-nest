<?php
if (empty($_SESSION['role']))
  header('Location: index.php?page=login');
?>
<br>
<nav class="navbar navbar-expand-sm navbar-default sidebar" style="background-color:#212529; margin-top: 5vh;" id="mainNav">
  <div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive1">
      <ul class="navbar-nav text-center" style="flex-direction: column;">
        <li class="nav-item">
          <a class="nav-link" href="index.php?q=<?= serialize_url('dashboard') ?>">Home</a>
        </li>
        <li class="nav-item">
          <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'user') {
            echo '<a href="index.php?q='.serialize_url('dashboard', 'register_rental').'" class="nav-link">Register</a>';
          } ?>
        </li>
        <li class="nav-item">
          <a href="index.php?q=<?= serialize_url('dashboard', 'view_rentals') ?>" class="nav-link">Details/Update</a>
        </li>
        <li class="nav-item">
          <?php if ($_SESSION['role'] == 'admin') {
            echo '<a href="index.php?q='.serialize_url('dashboard', 'view_complaints').'" class="nav-link">Complaint List</a>';
          } ?>
        </li>
      </ul>
    </div>
  </div>
</nav>