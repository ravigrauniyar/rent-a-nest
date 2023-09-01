<!DOCTYPE html>

<html lang="en">
    <head>
        <!-- Title of the page -->
        <title>
            <?= $page_title ?> | Rent-A-Nest
        </title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <!-- Plugins -->
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type='text/css'>
        <link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type='text/css'>
        <!-- Custom CSS -->
        <link href="../assets/css/rent.css" rel="stylesheet" type='text/css'>
        <link href="../assets/css/style.css" rel="stylesheet" type='text/css'>
    </head>

    <body id="page-top">
        <header class="masthead">
            <!-- Navbar -->
            <?php include 'components/'. $page_nav .'.php'; ?>
            <!-- Page Content -->
            <div class="container">
                <?php include 'pages/'.$page_content.'.php'; ?>
            </div>
        </header>
        <!-- Footer -->
        <?php if($page_content === 'home') include 'components/home/footer.php'; ?>
        <!-- Required scripts -->
        <script src="assets/plugins/jquery/jquery.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-easing/jquery.easing.min.js"></script>
        <script src="assets/js/jqBootstrapValidation.js"></script>
        <script src="assets/js/contact_me.js"></script>
        <script src="assets/js/rent.js"></script>
    </body>
</html>
