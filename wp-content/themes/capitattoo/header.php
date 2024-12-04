<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/templatemo-xtra-blog.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.25/dist/fancybox.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.25/dist/fancybox.umd.js"></script>

</head>

<body <?php body_class(); ?>>
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: rgba(0, 0, 0, 0.8);">
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Capi Tattoo" style="width: 50px; height: auto;">
                Capi Tattoo
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <!--<span class="navbar-toggler-icon"></span>-->
                <i class="fas fa-bars" style="color: white;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'menu_class' => 'navbar-nav ml-auto',
                    'container' => false,
                    'depth' => 2,
                    'walker' => new WP_Bootstrap_Navwalker() // Optional if using a custom nav walker
                ));
                echo "<ul class='navbar-nav ml-auto'>";
                // Check if the user is NOT logged in, display the "Login" link
                if ( !is_user_logged_in() ) {
                    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url( home_url( '/login/' ) ) . '">Login</a></li>';

                }

                // Check if the user IS logged in, display the "Logout" link
                if ( is_user_logged_in() ) {
                    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url( home_url( '/dash/' ) ) . '">Dashboard</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="' . wp_logout_url(home_url()) . '">Logout</a></li>';
                }
                echo "</ul>";
                ?>
            </div>
        </nav>
    </header>