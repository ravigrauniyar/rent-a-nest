<br>
<nav class="navbar navbar-expand-sm navbar-default sidebar mt-5" style="background-color:#212529; min-width: fit-content; z-index:5;" id="mainNav">
  <div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive1">
      <ul class="navbar-nav text-center" style="flex-direction: column;">
        <li class="nav-item">
          <a href="index.php?q=<?= serialize_url('dashboard') ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="index.php?q=<?= serialize_url('dashboard', 'register_rental') ?>" class="nav-link">Register</a>
        </li>
        <li class="nav-item">
          <a href="index.php?q=<?= serialize_url('dashboard', 'view_rentals') ?>" class="nav-link">View/Update</a>
        </li>
        <li class="nav-item">
          <a href="index.php?q=<?= serialize_url('dashboard', 'email') ?>" class="nav-link">Email</a>
        </li>
      </ul>
    </div>
  </div>
</nav>