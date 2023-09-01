<?php
    // Method to create Navbar component
    function generate_navbar($menuItems) 
    {
        echo '<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
                <div class="container">
                    <a class="navbar-brand js-scroll-trigger" href="/">Rent-A-Nest</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">';

        foreach ($menuItems as $menuItem) 
        {
            // Check if the condition is set and evaluate it
            $conditionMet = !isset($menuItem['condition']) || (bool) $menuItem['condition'];

            // Display the menu item only if the condition is met
            if ($conditionMet) {
                echo '<li class="nav-item">
                        <a class="nav-link" href="' . $menuItem['url'] . '">' . $menuItem['label'] . '</a>
                        </li>';
            }
        }
        echo '</ul>
                </div>
            </div>
            </nav>';
    }
    // Menu items mapping
    $menuItems = [
        [ 'url' => 'index.php?q='.serialize_url('home', 'search'), 'label' => 'Search' ],
        [ 'url' => 'index.php?q='.serialize_url('home', 'login'), 'label' => 'Login', 'condition' => empty($_SESSION['username']) ],
        [ 'url' => 'index.php?q='.serialize_url('dashboard'), 'label' => 'Dashboard', 'condition' => !empty($_SESSION['username']) ],
        [ 'url' => 'index.php?q='.serialize_url('home', 'register'), 'label' => 'Register', 'condition' => empty($_SESSION['username']) ]
    ];
    // Return Footer component
    generate_navbar($menuItems);
?>