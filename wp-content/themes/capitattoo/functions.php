<?php

// Fixes the error for the navbar on top
require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';


// Enqueue Bootstrap, Fullpage.js, and other styles/scripts
function capi_tattoo_enqueue_assets() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    
    // Enqueue Theme CSS
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Enqueue jQuery (comes with WordPress)
    wp_enqueue_script('jquery');

    // Enqueue Scrollify
    wp_enqueue_script('scrollify', 'https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.20/jquery.scrollify.min.js', array('jquery'), null, true);

    // Add inline script for Scrollify initialization
    wp_add_inline_script('scrollify', '
    jQuery(function($) {
        $.scrollify({
            section : ".section",
        });
    });
');



    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js', array('jquery'), '', true);
    

}
add_action('wp_enqueue_scripts', 'capi_tattoo_enqueue_assets');

//bootstrap for admin panels
function capi_tattoo_enqueue_admin_assets() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-admin-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    
    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-admin-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'capi_tattoo_enqueue_admin_assets');




// Register Menus
function capi_tattoo_register_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'capi-tattoo'),
    ));
}
add_action('init', 'capi_tattoo_register_menus');



// Admin menu for booking appointments
// Add custom admin menu for booking submissions
function capi_tattoo_add_admin_menu() {
    add_menu_page(
        'Booking Submissions',      // Page title
        'Booking Submissions',      // Menu title
        'manage_options',           // Capability
        'booking_submissions',      // Menu slug
        'capi_tattoo_booking_page', // Callback function
        'dashicons-calendar-alt',   // Icon
        6                           // Position
    );
}
add_action('admin_menu', 'capi_tattoo_add_admin_menu');

// Callback function to display the booking submissions page
function capi_tattoo_booking_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'appointments';
    $submissions = $wpdb->get_results("SELECT * FROM $table_name");
    
    // Code for setting booked to 1
    // Handle form submission for booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mark_booked'])) {
   
        // Sanitize the submission ID
        $submission_id = intval($_POST['submission_id']);
        
        // Update the booked status in the database
        $wpdb->update(
            $table_name,
            array('booked' => 1), // Update booked to 1
            array('id' => $submission_id), // Where id matches the submission ID
            array('%d'), // Data format
            array('%d')  // Where format
        );

  
        echo "<script type='text/javascript'>window.location.href=window.location.href;</script>";
    }


    



    echo '<div class="wrap">';
    echo '<h1>Booking Submissions</h1>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Design Description</th><th>Comments</th><th>Image</th><th>Actions</th></tr></thead>';
    echo '<tbody>';
    foreach ($submissions as $submission) {
        if ($submission->booked == 0){
        echo '<tr>';
        echo '<td>' . esc_html($submission->name) . '</td>';
        echo '<td>' . esc_html($submission->email) . '</td>';
        echo '<td>' . esc_html($submission->phone) . '</td>';
        echo '<td>' . esc_html($submission->design_description) . '</td>';
        echo '<td>' . esc_html($submission->comments) . '</td>';
        echo '<td><img src="' . esc_url($submission->image) . '" width="100"></td>';
        echo '<td><a href="#" data-toggle="modal" data-target="#imageModal" data-image="' . esc_url($submission->image) . '">View</a></td>';
        echo "<td>
                <form action='' method='post' style='display:inline;'>
                    <input type='hidden' name='submission_id' value='" . esc_attr($submission->ID) . "'>";
        echo '<button type="submit" name="mark_booked" class="button button-primary">Mark as Booked</button>';
        echo "        </form>
            </td>";
        
        
        echo '</tr>';
        }
    }

    echo '</tbody></table>';
    echo '</div>';
    

}


//submit the form code
add_action('admin_post_nopriv_submit_booking_form', 'handle_booking_form'); // For non-logged-in users
add_action('admin_post_submit_booking_form', 'handle_booking_form'); // For logged-in users

function handle_booking_form() {
    // Check if the action is correct
    if (isset($_POST['action']) && $_POST['action'] === 'submit_booking_form') {

        // Check nonce for security
        if (!isset($_POST['book_appointment_nonce']) || !wp_verify_nonce($_POST['book_appointment_nonce'], 'book_appointment_action')) {
            wp_die('Security check failed');
        }

        // Sanitize form data
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $description = sanitize_text_field($_POST['description']);
        $comments = sanitize_text_field($_POST['comments']);

        // Handle image upload
        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $allowed_file_types = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
            if (!in_array($_FILES['image']['type'], $allowed_file_types)) {
                wp_die('Invalid file type.');
            }

            $uploaded_file = $_FILES['image'];

            // Use wp_handle_upload to safely handle the uploaded file
            $upload_overrides = array('test_form' => false);
            $movefile = wp_handle_upload($uploaded_file, $upload_overrides);

            if ($movefile && !isset($movefile['error'])) {
                $image_url = $movefile['url']; // URL to the uploaded file
            } else {
                wp_die($movefile['error']); // Stop and show error
            }
        }

        // Insert booking submission into the database
        global $wpdb;
        $table_name = $wpdb->prefix . 'appointments';

        $wpdb->insert(
            $table_name,
            array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'design_description' => $description,
                'image' => isset($image_url) ? $image_url : '',
                'comments' => $comments,
                'booked' => 0
            ),
            array('%s', '%s', '%s', '%s', '%s', '%s')
        );

        // Redirect to thank you page
        wp_redirect(home_url('/'));
        exit;
    } else {
        // If action doesn't match, show an error or redirect
        wp_die('Invalid action specified.');
    }
}

// Hook to add a new menu item to the admin dashboard
add_action('admin_menu', 'capi_tattoo_add_booked_appointments_menu');

// Function to create the menu item for appointments that are old and booked already
function capi_tattoo_add_booked_appointments_menu() {
    add_menu_page(
        'Booked Appointments',      // Page title
        'Booked Appointments',      // Menu title
        'manage_options',           // Capability required to access the page
        'booked-appointments',      // Menu slug (unique identifier)
        'capi_tattoo_show_booked_appointments', // Function that displays the content
        'dashicons-clipboard',      // Icon for the menu item
        7                           // Position in the admin menu
    );
}

// Callback function to display the booked appointments page
function capi_tattoo_show_booked_appointments() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'appointments';

    // Fetch all booked appointments
    $booked_appointments = $wpdb->get_results("SELECT * FROM $table_name WHERE booked = 1");

    // Check if there are any booked appointments
    if (count($booked_appointments) > 0) {
        echo '<div class="wrap">';
        echo '<h1>Booked Appointments</h1>';
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Design Description</th><th>Comments</th><th>Image</th></tr></thead>';
        echo '<tbody>';

        foreach ($booked_appointments as $appointment) {
            echo '<tr>';
            echo '<td>' . esc_html($appointment->name) . '</td>';
            echo '<td>' . esc_html($appointment->email) . '</td>';
            echo '<td>' . esc_html($appointment->phone) . '</td>';
            echo '<td>' . esc_html($appointment->design_description) . '</td>';
            echo '<td>' . esc_html($appointment->comments) . '</td>';
            echo '<td><img src="' . esc_url($appointment->image) . '" width="100"></td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
        echo '</div>';
    } else {
        // Display a message if there are no booked appointments
        echo '<div class="wrap"><h1>Booked Appointments</h1><p>No appointments have been booked yet.</p></div>';
    }
    
    
    
}



//redirect user after registering 
function custom_registration_redirect() {
    // Check if the user is registering
    if (isset($_POST['custom_registration_nonce']) && wp_verify_nonce($_POST['custom_registration_nonce'], 'custom_user_registration')) {
        // Redirect to your desired member page
        wp_redirect(home_url('/')); // Change '/members-page/' to your desired URL
        exit;
    }
}
add_action('user_register', 'custom_registration_redirect');



// add custom item to menu
/*
function add_custom_item_to_menu( $items, $args ) {
    if ( is_user_logged_in() && $args->theme_location == 'primary-menu' ) {
        $items .= '<li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>'; // Change the link as needed
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_custom_item_to_menu', 10, 2 );
*/


// Custom Login Logo
function custom_login_logo() { 
    echo "
    <style type='text/css'>
        #login h1 a, .login h1 a {
            background-image: url('".get_stylesheet_directory_uri()."/assets/images/logo.png'); // Replace with your logo URL
            height: 65px; // Adjust height to fit your logo
            width: 320px; // Adjust width to fit your logo
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>";
    
}
add_action( 'login_enqueue_scripts', 'custom_login_logo' );


// Remove Login Page Links
function custom_login_remove_links() {
    ?>
    <style type="text/css">
        .login #nav, .login #backtoblog {
            display: none;
        }
    </style>
    <?php
}
add_action( 'login_enqueue_scripts', 'custom_login_remove_links' );

//send users to home page when they click on the logo in forget password
// Change the login logo URL
function custom_login_logo_url() {
    return home_url();  // Sends the user to the homepage
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

// Change the login logo title
function custom_login_logo_url_title() {
    return 'Go to Home'; // This will show when you hover over the logo
}
add_filter( 'login_headertext', 'custom_login_logo_url_title' );


// Take off admin bar for non admin users.
// Hide admin bar for non-admin users
add_action('after_setup_theme', 'remove_admin_bar_for_non_admins');

function remove_admin_bar_for_non_admins() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}


//Make posts available to subscribers.
/*
function restrict_content_to_logged_in_subscribers() {
    // Check if user is not logged in or does not have 'read' capability (subscribers have 'read')
    if ( ! is_user_logged_in() || ! current_user_can( 'read' ) ) {

        // Exclude the wp-login.php page and admin pages to avoid redirect loop
        if ( ! is_page('login') && ! is_admin() && is_single() ) {
            wp_redirect( wp_login_url() );
            exit;
        }
    }
}
add_action( 'template_redirect', 'restrict_content_to_logged_in_subscribers' );
*/

// this is suppose to keep the post public but redirect if not subscriber
function restrict_private_posts_to_subscribers( $query ) {
    // Check if we're on the front-end, looking at a post, and not an admin page
    if ( ! is_admin() && $query->is_main_query() && is_single() ) {
        
        // If the user is not logged in or does not have the 'read' capability
        if ( ! is_user_logged_in() || ! current_user_can( 'read' ) ) {
            wp_redirect( site_url( '/login/' ) ); // Redirect to login page
            exit;
        }
    }
}
add_action( 'pre_get_posts', 'restrict_private_posts_to_subscribers' );


?>