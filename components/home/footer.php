<?php
    // Method to create Footer component
    function generateFooter($socialLinks) {
        echo '<footer style="background-color: #ccc;">
                <div class="container">
                <div class="row">
                    <div class="col-md-4">
                    <span class="copyright">Copyright &copy; 2023</span>
                    </div>
                    <div class="col-md-4">
                    <ul class="list-inline social-buttons">';
        
        foreach ($socialLinks as $link) {
            echo '<li class="list-inline-item">
                    <a href="' . $link['url'] . '">
                    <i class="fa ' . $link['icon'] . '"></i>
                    </a>
                </li>';
        }
        echo '</ul>
            </div>
            <div class="col-md-4">
            <span class="copyright">Rent-A-Nest</span>
            </div>
        </div>
        </div>
    </footer>';
    }
    // Social links mapping
    $socialLinks = [
        [ 'url' => '#', 'icon' => 'fa fa-instagram' ],
        [ 'url' => '#', 'icon' => 'fa fa-facebook' ],
        [ 'url' => '#', 'icon' => 'fa fa-linkedin' ]
    ];
    // Return footer component
    generateFooter($socialLinks);
?>