<?php
require 'config/config.php';
$rental_data = [];

if (isset($_POST['search'])) {
  // Get data from FORM
  $keywords = $_POST['keywords'];
  $location = $_POST['location'];

  //keywords based search
  $keyword = explode(',', $keywords);
  $concats = "(";
  $numItems = count($keyword);
  $i = 0;
  foreach ($keyword as $key => $value) {
    # code...
    if (++$i === $numItems) {
      $concats .= "'" . $value . "'";
    } else {
      $concats .= "'" . $value . "',";
    }
  }
  $concats .= ")";
  //end of keywords based search

  //location based search
  $locations = explode(',', $location);
  $loc = "(";
  $numItems = count($locations);
  $i = 0;
  foreach ($locations as $key => $value) {
    # code...
    if (++$i === $numItems) {
      $loc .= "'" . $value . "'";
    } else {
      $loc .= "'" . $value . "',";
    }
  }
  $loc .= ")";

  //end of location based search

  try {

    $stmt = $connect->prepare("SELECT * FROM rental_registrations WHERE rooms IN $concats OR address IN $concats OR address IN $loc OR rent IN $concats OR deposit IN $concats");
    $stmt->execute();
    $rental_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $user_ids = array_column($rental_data, 'user_id');
		$user_ids = array_unique($user_ids);

		$user_query = $connect->prepare('SELECT * FROM users WHERE id = :user_id');
		$organized_data = array();

		foreach ($rental_data as $rental) {
			$rental_id = $rental['id'];
			$user_id = $rental['user_id'];
			
			// Fetch user data for the user_id
			$user_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$user_query->execute();
			$user_data = $user_query->fetch(PDO::FETCH_ASSOC);
			
			$organized_data[$rental_id] = $user_data;
		}
  } catch (PDOException $e) {
    $errMsg = $e->getMessage();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Home | Rent-A-Nest</title>
  <!-- Bootstrap core CSS -->
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts -->
  <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles -->
  <link href="assets/css/rent.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Rent-A-Nest</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#search">Search</a>
          </li>

          <?php
          if (empty($_SESSION['username'])) {
            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="./auth/login.php">Login</a>';
            echo '</li>';
          } else {
            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="./auth/dashboard.php">Home</a>';
            echo '</li>';
          }
          ?>

          <li class="nav-item">
            <a class="nav-link" href="./auth/register.php">Register</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-heading">Welcome To Rent-A-Nest!</div>
        <div class="intro-lead-in">Find Your Haven Of Comfort...<br></div>
      </div>
    </div>
  </header>

  <!-- Search -->
  <section id="search">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Search</h2>
          <h3 class="section-subheading text-muted">Search rooms or houses to rent.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form action="" method="POST" class="center" novalidate>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="keywords" name="keywords" type="text" placeholder="Key words(Ex: 1bhk,rent..)" required data-validation-required-message="Please enter keywords">
                  <p class="help-block text-danger"></p>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <input class="form-control" id="location" type="text" name="location" placeholder="Location" required data-validation-required-message="Please enter location.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <button id="name" class="btn btn-success btn-md text-uppercase" name="search" value="search" type="submit">Search</button>
                </div>
              </div>
            </div>
          </form>

          <?php
            if (isset($errMsg)) {
              echo '<div style="color:#FF0000;text-align:center;font-size:17px;">' . $errMsg . '</div>';
            }
            if (count($rental_data) !== 0) {
              echo "<h2 class='text-center'>List of Apartment Details</h2>";
            } else if(isset($_POST['search'])){
              echo "<h2 class='text-center' style='color:red;'>Try Some other keywords</h2>";
            }
          ?>
          <?php
            foreach ($rental_data as $key => $rental) {
              echo '<div class="card card-inverse card-info mb-3" style="padding:1%;">					
                    <div class="card-block">';
    
              // Fetch user data for the current rental's user_id
              $user_data = $organized_data[$rental['id']];
              echo  '<div class="row">
                    <div class="col-4">
                    <h4 class="text-center mb-3">Owner Details</h4>';
                    
              echo '<p><b>Owner Name: </b>' . $user_data['fullname'] . '</p>';
              echo '<p><b>Mobile Number: </b>' . $user_data['mobile'] . '</p>';
              echo '<p><b>Email: </b>' . $user_data['email'] . '</p>';
    
              echo '</div>
                  <div class="col-5">
                  <h4 class="text-center mb-3">Room Details</h4>';
                  
              echo '<p><b>Address: </b>' . $rental['address'] . '</p>';
              echo '<p><b>Available Rooms: </b>' . $rental['rooms'] . '</p>';
              echo '<p><b>Rent (Rs.): </b>' . $rental['rent'] . '</p>';
              echo '<p><b>Deposit (Rs.): </b>' . $rental['deposit'] . '</p>';
              
              echo '</div>
                  <div class="col-3">
                  <h4 class="mb-3">Other Details</h4>';
                  
              echo '<p><b>Description: </b>' . $rental['description'] . '</p>';
              echo '<a class="btn btn-warning float-right" href="update.php?id=' . $rental['id'] . '">Edit</a>';
              echo '<a class="btn btn-warning float-right mx-lg-4 mt-sm-3 mt-lg-0" href="../app/file_complaint.php">Complaint</a><br><br>';
              echo '</div>
                </div>				      
              </div>
            </div>';	  
            }
          ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer style="background-color: #ccc;">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; 2023</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-instagram"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <span class="copyright">Rent-A-Nest</span>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="assets/plugins/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="assets/js/jqBootstrapValidation.js"></script>
  <script src="assets/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="assets/js/rent.js"></script>
</body>

</html>